<?php 
  session_start();

  include 'includes/dbConnection.php';
  if($_SESSION["user_logged_in"] == false){
    header('Location: logout.php');
  }
	
	if ($_SESSION["Role"] == 'Marketing Manager') {
		header('Location: marketingmanager.php');
	} else if ($_SESSION["Role"] == 'Marketing Co-ordinator') {
		header('Location: marketingcoordinator.php');
	} else if ($_SESSION["Role"] == 'Student') {
		header('Location: home.php');
	} else if ($_SESSION["Role"] == 'Guest') {
		header('Location: guest.php');
	}
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
                  $id =$_REQUEST['CloseDatesID'];

                  $result = mysqli_query($con, "SELECT * FROM CloseDates WHERE CloseDatesID  = '$id'");
                  $test = mysqli_fetch_array($result, MYSQLI_ASSOC);

                          $title= $test['CloseDatesID'] ;
                          $author= $test['FacultyID'] ;
                          $title2= $test['SubmissionDate'] ;
                          $author2= $test['FinalSubmissionDate'] ;
                          $title3= $test['AcademicYearID'] ;

                  if(isset($_POST['save']))
                  { 
                          $author_save= isset($_POST['FacultyID']) ? $_POST['FacultyID'] : $_POST['FacultyIDMobile'] ;
                          $title2_save= isset($_POST['SubmissionDate']) ? $_POST['SubmissionDate'] : $_POST['SubmissionDateMobile'];
                          $author2_save= isset($_POST['FinalSubmissionDate']) ? $_POST['FinalSubmissionDate'] : $_POST['FinalSubmissionDateMobile'] ;
                          $title3_save= isset($_POST['AcademicYearID']) ? $_POST['AcademicYearID'] : $_POST['AcademicYearIDMobile'] ;

                    mysqli_query($con,"UPDATE CloseDates SET FacultyID ='$author_save', SubmissionDate ='$title2_save', FinalSubmissionDate ='$author2_save', AcademicYearID ='$title3_save' WHERE CloseDatesID = '$id'");
                    
                    echo "<script>window.location.replace('admin.php');</script>";     
                  }
                ?>
                <form method="post">
                  <table class="w3-table w3-hide-small w3-hide-medium w3-hide-medium-small">
                  <tr>
                    <th>Close Dates ID</th>
                    <th>Faculty ID</th>
                    <th>Submission Date</th>
                    <th>Final Submission Date</th>
                    <th>Academic Year ID</th>
                    <th></th>
                  </tr>
                  <tr>
                    <td><?php echo $title ?></td>
                    <td>
                      <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="FacultyID">
                        <option value="1" <?php if($author == 1){echo "selected";}?>>1</option>
                        <option value="2" <?php if($author == 2){echo "selected";}?>>2</option>
                        <option value="3" <?php if($author == 3){echo "selected";}?>>3</option>
                        <option value="4" <?php if($author == 4){echo "selected";}?>>4</option>
                      </select>
                    </td>
                    <td>
                      <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" type="date" value="<?php echo $title2; ?>" name="SubmissionDate" class="form-control"/>
                    </td>
                    <td>
                      <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" type="date" value="<?php echo $author2; ?>" name="FinalSubmissionDate" class="form-control"/>
                    </td>
                    <td>
                      <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="AcademicYearID">
                      <?php
                        $result3=mysqli_query($con, "SELECT * FROM AcademicYear ORDER BY AcademicYearID");
                        while($test3 = mysqli_fetch_array($result3))
                        {
                          if($title3 == $test3['AcademicYearID']){
                            echo "<option value='" . $test3['AcademicYearID'] . "' selected>" . $test3['AcademicYearID'] . "</option>";
                          }
                          else{
                          echo "<option value='" . $test3['AcademicYearID'] . "'>" . $test3['AcademicYearID'] . "</option>";
                          }
                        }
                      ?>
                      </select>
                    </td>
                    <td>
                      <center><input type="submit" name="save" value="save" class="w3-btn w3-theme"/></center>
                    </td>
                  </tr>
                  </table>

                  <table class="w3-table w3-hide-large">
                  <tr>
                    <th>Close Dates ID</th>
                    <td><?php echo $title ?></td>
                  </tr>
                  <tr>
                    <th>Faculty ID</th>
                    <td>
                      <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="FacultyID">
                        <option value="1Mobile" <?php if($author == 1){echo "selected";}?>>1</option>
                        <option value="2Mobile" <?php if($author == 2){echo "selected";}?>>2</option>
                        <option value="3Mobile" <?php if($author == 3){echo "selected";}?>>3</option>
                        <option value="4Mobile" <?php if($author == 4){echo "selected";}?>>4</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th>Submission Date</th>
                    <td>
                      <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" type="date" value="<?php echo $title2; ?>" name="SubmissionDateMobile" class="form-control"/>
                    </td>
                  </tr>
                  <tr>
                    <th>Final Submission Date</th>
                    <td>
                      <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" type="date" value="<?php echo $author2; ?>" name="FinalSubmissionDateMobile" class="form-control"/>
                    </td>
                  </tr>
                  <tr>
                    <th>Academic Year ID</th>
                    <td>
                      <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="AcademicYearIDMobile">
                        <?php
                        $result3=mysqli_query($con, "SELECT * FROM AcademicYear ORDER BY AcademicYearID");
                        while($test3 = mysqli_fetch_array($result3))
                        {
                          if($title3 == $test3['AcademicYearID']){
                            echo "<option value='" . $test3['AcademicYearID'] . "' selected>" . $test3['AcademicYearID'] . "</option>";
                          }
                          else{
                            echo "<option value='" . $test3['AcademicYearID'] . "'>" . $test3['AcademicYearID'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  </table>
                  <table class='w3-table w3-hide-large'>
                    <tr>
                      <td>
                        <center><input type="submit" name="save" value="save" class="w3-btn w3-theme"/></center>
                      </td>
                    </tr>
                  </table>
                </form>
                <br>
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
  </script>
</body>
</html>