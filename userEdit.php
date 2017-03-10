<?php 
  session_start();

  include 'includes/dbConnection.php';
  if($_SESSION["user_logged_in"] == false){
    header('Location: logout.php');
    die();
  }
	
	if ($_SESSION["Role"] == 'Marketing Manager') {
		header('Location: marketingmanager.php');
    die();
	} else if ($_SESSION["Role"] == 'Marketing Co-ordinator') {
		header('Location: marketingcoordinator.php');
    die();
	} else if ($_SESSION["Role"] == 'Student') {
		header('Location: home.php');
    die();
	} else if ($_SESSION["Role"] == 'Guest') {
		header('Location: guest.php');
    die();
	}

  $pageviewquery  = "SELECT * FROM PagesViewed WHERE PageName = 'Student Page';";
  $resultpageview = mysqli_query($con, $pageviewquery);
  $rowpageview = mysqli_fetch_array($resultpageview, MYSQLI_ASSOC);
  $NewPageViews = $rowpageview['Views'] + 1;
  $updatePageViewQuery = "UPDATE PagesViewed SET Views = " . $NewPageViews . " WHERE PageName = 'Student Page';";
  $updatePageView = mysqli_query($con, $updatePageViewQuery);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Greenmag</title>
  <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="styles/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>
<body class="w3-theme-l5">
  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-medium">
      <a class="w3-bar-item w3-button w3-hide-medium  w3-hide-medium-small w3-hide-large w3-opennav w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a> 
      <a class="w3-bar-item w3-logo-button w3-theme-d4" href="home.php"><i class="fa fa-glide-g" style="font-size: 55px;vertical-align: middle;line-height: 30px;"></i></a> 
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="statsNav" href="statistics.php" title="Statistics"><i class="fa fa-bar-chart"></i><p class="navbarText" id="statsText">Statistics</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="articlesNav" href="viewarticles.php" title="Account Settings"><i class="fa fa-file-text-o"></i><p class="navbarText" id="articlesText">All Articles</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="guestNav" href="guest.php" title="Guest"><i class="fa fa-user"></i><p class="navbarText" id="guestText">Guest</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="marketingManagerNav" href="marketingmanager.php" title="Marketing Manager"><i class="fa fa-briefcase"></i><p class="navbarText" id="marketingManagerText">Marketing Manager</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="marketingCoordinatorNav" href="marketingcoordinator.php" title="Marketing Co-ordinator"><i class="fa fa-briefcase"></i><p class="navbarText" id="marketingCoordinatorText">Marketing Co-ordinator</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="adminNav" href="admin.php" title="Admin"><i class="fa fa-cog"></i><p class="navbarText" id="adminText">Admin</p></a>
      <a class="w3-bar-item w3-logout-button w3-hide-small w3-right w3-padding-large w3-theme-d4" href="logout.php" title="Logout"><i aria-hidden="true" class="fa fa-sign-out"></i> Logout</a>
    </div>
  </div><!-- Navbar on small screens -->
  <div class="w3-navblock w3-theme-d2 w3-large w3-hide w3-hide-large w3-hide-medium w3-top" id="navDemo" style="margin-top:51px">
    <a class="w3-padding-large mobileNav" id="profileNavMobile" href="/">Home</a>
    <a class="w3-padding-large mobileNav" id="statsNavMobile" href="statistics.php">Statistics</a> 
    <a class="w3-padding-large mobileNav" id="articlesNavMobile" href="viewarticles.php">All Articles</a> 
    <a class="w3-padding-large mobileNav" id="guestNavMobile" href="guest.php">Guest</a> 
    <a class="w3-padding-large mobileNav" id="marketingManagerNavMobile" href="marketingmanager.php">Marketing Manager</a> 
    <a class="w3-padding-large mobileNav" id="marketingCoordinatorNavMobile" href="marketingcoordinator.php">Marketing Coordinator</a> 
    <a class="w3-padding-large mobileNav" id="adminNavMobile" href="admin.php">Admin</a> 
    <a class="w3-padding-large" href="logout.php">Logout</a>
  </div><!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;min-height:860px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      </div><!-- Middle Column -->
      <div class="w3-col m12">
        <div id="uploadArticlesBox" class="w3-row-padding">
        <div class="w3-col m2"><br></div>
          <div class="w3-col m8">
            <div class="w3-card-2 w3-round w3-333">
              <div class="w3-container w3-padding">
                <h4 class="">Edit Record</h4><br>
                <?php
                  $id = $_REQUEST['id'];

                  $result = mysqli_query($con, "SELECT User.*, Faculty.FacultyName, Role.RoleName FROM User INNER JOIN Faculty ON User.FacultyID=Faculty.FacultyID INNER JOIN Role ON User.RoleID=Role.RoleID WHERE UserID=" . $id . ";");
                  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                          $facultyID= $user['FacultyID'];
                          $facultyName= $user['FacultyName'];
                          $roleID= $user['RoleID'] ;
                          $roleName= $user['RoleName'] ;

                  if(isset($_POST['save']))
                  { 
                    $newFaculty = $_POST['newFaculty'] ;
                    $newRole = $_POST['newRole'] ;

                    mysqli_query($con,"UPDATE User SET FacultyID = $newFaculty, RoleID = $newRole WHERE UserID = $id");
                    
                    echo "<script>window.location.replace('admin.php');</script>";
                  }
                  mysqli_close($con);
                ?>
                <form method="post">
                <table class="w3-table">
                  <tr>
                    <th>User</th>
                    <th>Faculty</th>
                    <th>Role</th>
                  </tr>
                  <tr>
                    <td><font color='white'><?php echo explode('@greenwich.ac.uk',$user['Username'])[0]; ?></font></td>
                    <td>
                      <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="newFaculty">
                        <option value='1' <?php if($facultyID == 1){echo "selected";}?> >Architecture, Computing & Humanities</option>
                        <option value='2' <?php if($facultyID == 2){echo "selected";}?> >Business School</option>
                        <option value='3' <?php if($facultyID == 3){echo "selected";}?> >Education & Health</option>
                        <option value='4' <?php if($facultyID == 4){echo "selected";}?> >Engineering & Science</option>
                        <option value='5' <?php if($facultyID == 5){echo "selected";}?> >All</option>
                      </select>
                    </td>
                    <td>
                      <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="newRole">
                        <option value='1' <?php if($roleID == 1){echo "selected";}?>>Admin</option>
                        <option value='2' <?php if($roleID == 2){echo "selected";}?>>Marketing Manager</option>
                        <option value='3' <?php if($roleID == 3){echo "selected";}?>>Marketing Co-ordinator</option>
                        <option value='4' <?php if($roleID == 4){echo "selected";}?>>Student</option>
                        <option value='5' <?php if($roleID == 5){echo "selected";}?>>Guest</option>
                      </select>
                    </td>
                  </tr>
                </table>
                <input type="submit" name="save" value="save" class="w3-btn w3-theme w3-margin-top"/>
              </form><br>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Middle Column -->

  <script>
	var role = <?php echo json_encode($_SESSION['Role']); ?>;
	
  if (role == 'Student') {
    $("#statsNav").show();
    $("#guestNavMobile").hide();
    $("#marketingManagerNavMobile").hide();
    $("#articlesNav").show();
    $("#marketingCoordinatorNavMobile").hide();
    $("#adminNavMobile").hide();
    $("#profileNav").show();
  } else if (role == 'Guest') {
    $("#statsNav").show();
    $("#guestNav").show();
    $("#marketingManagerNavMobile").hide();
    $("#articlesNavMobile").hide();
    $("#marketingCoordinatorNavMobile").hide();
    $("#adminNavMobile").hide();
    $("#profileNavMobile").hide();
  } else if (role == 'Marketing Co-ordinator') {
    $("#statsNav").show();
    $("#guestNavMobile").hide();
    $("#marketingManagerNavMobile").hide();
    $("#articlesNavMobile").hide();
    $("#marketingCoordinatorNav").show();
    $("#adminNavMobile").hide();
    $("#profileNavMobile").hide();
  } else if (role == 'Marketing Manager') {
    $("#statsNav").show();
    $("#guestNavMobile").hide();
    $("#marketingManagerNav").show();
    $("#articlesNavMobile").hide();
    $("#marketingCoordinatorNavMobile").hide();
    $("#adminNavMobile").hide();
    $("#profileNavMobile").hide();
  } else if (role == 'Admin') {
    $("#statsNav").show();
    $("#guestNavMobile").hide();
    $("#marketingManagerNavMobile").hide();
    $("#articlesNavMobile").hide();
    $("#marketingCoordinatorNavMobile").hide();
    $("#adminNav").show();
    $("#profileNavMobile").hide();
  }
  // START Navbar Animations START //
  $("#statsText").hide();
  $("#statsNav").mouseenter(function(){
      $("#statsText").show('slow');
  });
  $("#statsNav").mouseleave(function(){
      $("#statsText").hide('slow');
  });
  
  $("#guestText").hide();
  $("#guestNav").mouseenter(function(){
      $("#guestText").show('slow');
  });
  $("#guestNav").mouseleave(function(){
      $("#guestText").hide('slow');
  });

	$("#marketingManagerText").hide();
  $("#marketingManagerNav").mouseenter(function(){
      $("#marketingManagerText").show('slow');
  });
  $("#marketingManagerNav").mouseleave(function(){
      $("#marketingManagerText").hide('slow');
  });
  
  $("#articlesText").hide();
  $("#articlesNav").mouseenter(function(){
      $("#articlesText").show('slow');
  });
  $("#articlesNav").mouseleave(function(){
      $("#articlesText").hide('slow');
  });
  
  $("#marketingCoordinatorText").hide();
  $("#marketingCoordinatorNav").mouseenter(function(){
      $("#marketingCoordinatorText").show('slow');
  });
  $("#marketingCoordinatorNav").mouseleave(function(){
      $("#marketingCoordinatorText").hide('slow');
  });
  
  $("#adminText").hide();
  $("#adminNav").mouseenter(function(){
      $("#adminText").show('slow');
  });
  $("#adminNav").mouseleave(function(){
      $("#adminText").hide('slow');
  });
  // END Navbar Animations END //

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
     var x = document.getElementById("navDemo");
     if (x.className.indexOf("w3-show") == -1) {
         x.className += " w3-show";
     } else { 
         x.className = x.className.replace(" w3-show", "");
     }
  }
  function redirect() {
    window.location.replace("admin.php");
  }
  </script>
</body>
</html>