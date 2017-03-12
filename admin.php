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
  
  $currentYearQuery = "SELECT * FROM AcademicYear WHERE currentYear = 1;";
  $currentYear = mysqli_fetch_array(mysqli_query($con, $currentYearQuery), MYSQLI_ASSOC);
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
              <div class="w3-center">
                <h4>Admin</h4>
                <p><img alt="Avatar" class="w3-circle" src="images/guestAvatar.png" style="height:106px;width:106px"></p>
                <h4>Current Academic Year: <br class='w3-hide-large w3-hide-medium w3-hide-medium-small'> <?php echo $currentYear['AcademicYear'] ?></h4>
                <form method='post' action='academicyear.php'>
                  <select name="currentYear" id="currentYear">
                    <?php 
                      $sql = mysqli_query($con, "SELECT * FROM AcademicYear");
                      while ($row = mysqli_fetch_array($sql)){
                        echo "<option value=" . $row['AcademicYearID'] . ">" . $row['AcademicYear'] . "</option>";
                      }
                    ?>
                  </select>
                  <br><br>
                  <button type='submit' class='w3-btn w3-theme'>Save</button>
                </form>
                <div class="w3-margin">
                  <h4>Show:</h4>
                  <button class='w3-btn w3-theme w3-hide-small' id='userTableBtn' type="button">User Table</button>
                  <button class='w3-btn w3-theme w3-hide-small' id='academicYearBtn' type="button">Academic Year Table</button>
                  <button class='w3-btn w3-theme w3-hide-small' id='closeDatesBtn' type="button">Close Dates Table</button>
                  <div class="w3-hide-large w3-hide-medium w3-hide-medium-small">
                    <button class='w3-btn w3-theme' id='userTableBtnMobile' type="button">User Table</button>
                    <br><br>
                    <button class='w3-btn w3-theme' id='academicYearBtnMobile' type="button">Academic Year Table</button>
                    <br><br>
                    <button class='w3-btn w3-theme' id='closeDatesBtnMobile' type="button">Close Dates Table</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
            <div class="w3-card-2 w3-round w3-333"  id="userTable" style='display:none;'>
              <div class="w3-container w3-padding">
                <h4>User Table</h4>
                <table class="w3-table w3-hide-small w3-hide-medium-small" style="overflow-x:auto;">
                  <tr>
                    <th>User</th>
                    <th>Faculty</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                  </tr>
                  <?php
                    $result=mysqli_query($con, "SELECT User.*, Faculty.FacultyName, Role.RoleName FROM User INNER JOIN Faculty ON User.FacultyID=Faculty.FacultyID INNER JOIN Role ON User.RoleID=Role.RoleID ORDER BY UserID");
                    
                    while($user = mysqli_fetch_array($result))
                    {
                      $id = $user['UserID'];  
                      echo "<tr align='center'>"; 
                      echo "<td><font color='white'>" .explode('@greenwich.ac.uk',$user['Username'])[0]."</font></td>";
                      echo "<td><font color='white'>" .$user['FacultyName']."</font></td>";
                      echo "<td><font color='white'>" .$user['RoleName']."</font></td>";
                      echo "<td> <a href ='userEdit.php?id=$id'><center>Edit</center></a>";
                      echo "<td> <a href ='userDelete.php?id=$id'><center>Delete</center></a>";
                                
                      echo "</tr>";
                    }
                  ?>
                </table>
                  <?php
                    $result2=mysqli_query($con, "SELECT User.*, Faculty.FacultyName, Role.RoleName FROM User INNER JOIN Faculty ON User.FacultyID=Faculty.FacultyID INNER JOIN Role ON User.RoleID=Role.RoleID ORDER BY UserID");
                    
                    while($user2 = mysqli_fetch_array($result2))
                    {
                      echo "<table class='w3-table w3-hide-large w3-hide-medium w3-margin-bottom' style='overflow-x:auto;'>";
                      echo "<tr>";
                      echo "<th style='width:50%'>User</th>";
                      echo "<td style='width:50%'><font color='white'>" .explode('@greenwich.ac.uk',$user2['Username'])[0]."</font></td>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<th style='width:50%'>Faculty</th>";
                      echo "<td style='width:50%'><font color='white'>" .$user2['FacultyName']."</font></td>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<th style='width:50%'>Role</th>";
                      echo "<td style='width:50%'><font color='white'>" .$user2['RoleName']."</font></td>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<td style='width:50%'> <a href ='userEdit.php?id=$id'><center>Edit</center></a>";
                      echo "<td style='width:50%'> <a href ='userDelete.php?id=$id'><center>Delete</center></a>";
                      echo "</tr>";
                    }
                  ?>
              </table>
            </div>
          </div>
            <div class="w3-card-2 w3-round w3-333" id="academicYearTable"  style='display:none;'>
              <div class="w3-container w3-padding">
                <h4>Academic Year Table</h4>
                <table class="w3-table w3-hide-small w3-hide-medium-small" id="table1" style="overflow-x:auto;">
                  <tr>
                    <th>Academic Year ID</th>
                    <th>Academic Year</th>
                    <th></th>
                    <th></th>
                  </tr>
                  <?php
                    $result=mysqli_query($con, "SELECT * FROM AcademicYear ORDER BY AcademicYearID");
                    
                    while($test = mysqli_fetch_array($result))
                    {
                      $id = $test['AcademicYearID'];  
                      echo "<tr align='center'>"; 
                      echo"<td><font color='white'>" .$test['AcademicYearID']."</font></td>";
                      echo"<td><font color='white'>" .$test['AcademicYear']."</font></td>";
                      echo"<td> <a href ='adminedit1.php?AcademicYearID=$id'><center>Edit</center></a>";
                      echo"<td> <a href ='admindel1.php?AcademicYearID=$id'><center>Delete</center></a>";
                                
                      echo "</tr>";
                    }
                  ?>
                </table>
                  <?php
                    $result=mysqli_query($con, "SELECT * FROM AcademicYear ORDER BY AcademicYearID");
                    
                    while($test = mysqli_fetch_array($result))
                    {
                      echo "<table class='w3-table w3-hide-large w3-hide-medium w3-margin-bottom' id='table1Mobile' style='overflow-x:auto;'>";
                      $id = $test['AcademicYearID'];  
                      echo "<tr class='firstRow'>";
                      echo "<th>Academic Year ID</th>";
                      echo "<td><font color='white'>" .$test['AcademicYearID']."</font></td>";
                      echo "</tr>";
                      echo "<tr class='secondRow'>"; 
                      echo "<th>Academic Year</th>";
                      echo "<td><font color='white'>" .$test['AcademicYear']."</font></td>";
                      echo "</tr>";
                      echo "<tr class='thirdRow'>";
                      echo "<td><a href ='adminedit1.php?AcademicYearID=$id'><center>Edit</center></a>";
                      echo "<td><a href ='admindel1.php?AcademicYearID=$id'><center>Delete</center></a>";
                      echo "</tr>";
                      echo "</table>";
                    }
                  ?>
              
              <form action="adminadd1.php" method="post">
              <table class="w3-table" id="table2">
                <tr>
                  <th>Academic Year ID</th>
                  <th>Academic Year</th>
                  <th></th>
                </tr>
                  <tr>
                    <td><input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" placeholder="Insert Content Here" type="number" name="AcademicYearID" class="form-control"/></td>
                    <td><input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" type="text" placeholder="Insert Content Here" name="AcademicYear" class="form-control"/></td>
                    <td><center><input type="submit" name="submit" value="add" class="w3-btn w3-theme"/></center></td>
                  </tr>
                </table>
                </form><br>
                </div>
          </div>
            <div class="w3-card-2 w3-round w3-333" id="closeDatesTable"  style='display:none;'>
              <div class="w3-container w3-padding w3-margin-bottom">
                <h4>Close Dates Table</h5>
                <table class="w3-table w3-hide-small w3-hide-medium-small" id="table3">
                  <tr>
                    <th>Close Dates ID</th>
                    <th>Faculty ID</th>
                    <th>Submission Date</th>
                    <th>Final Submission Date</th>
                    <th>Academic Year ID</th>
                    <th></th>
                    <th></th>
                  </tr>
                  <?php   
                    $result2=mysqli_query($con, "SELECT * FROM CloseDates INNER JOIN Faculty ON CloseDates.FacultyID=Faculty.FacultyID ORDER BY CloseDatesID");
                      
                    while($test2 = mysqli_fetch_array($result2))
                    {
                      $id2 = $test2['CloseDatesID'];  
                      echo "<tr align='center'>"; 
                      echo"<td><font color='white'>" .$test2['CloseDatesID']."</font></td>";
                      echo"<td><font color='white'>" .$test2['FacultyName']."</font></td>";
                      echo"<td><font color='white'>" .$test2['SubmissionDate']."</font></td>";
                      echo"<td><font color='white'>" .$test2['FinalSubmissionDate']."</font></td>";
                      echo"<td><font color='white'>" .$test2['AcademicYearID']."</font></td>";
                      echo"<td> <a href ='adminedit2.php?CloseDatesID=$id2'><center>Edit</center></a>";
                      echo"<td> <a href ='admindel2.php?CloseDatesID=$id2'><center>Delete</center></a>";
                                
                      echo "</tr>";
                    }
                  ?>
                </table>

                  <?php   
                    $result2=mysqli_query($con, "SELECT * FROM CloseDates INNER JOIN Faculty ON CloseDates.FacultyID=Faculty.FacultyID ORDER BY CloseDatesID");
                      
                    while($test2 = mysqli_fetch_array($result2))
                    {
                      $id2 = $test2['CloseDatesID'];  
                      echo "<table class='w3-table w3-hide-large w3-hide-medium w3-margin-bottom' id='table3'>";
                      echo "<tr class='firstRow'>";
                      echo "<th>Close Dates ID</th>";
                      echo "<td><font color='white'>" .$test2['CloseDatesID']."</font></td>";
                      echo "</tr>";
                      echo "<tr class='secondRow'>";
                      echo "<th>Faculty ID</th>";
                      echo "<td><font color='white'>" .$test2['FacultyName']."</font></td>";
                      echo "</tr>";
                      echo "<tr class='thirdRow'>";
                      echo "<th>Submission Date</th>";
                      echo "<td><font color='white'>" .$test2['SubmissionDate']."</font></td>";
                      echo "</tr>";
                      echo "<tr class='fourthRow'>";
                      echo "<th>Final Submission Date</th>";
                      echo "<td><font color='white'>" .$test2['FinalSubmissionDate']."</font></td>";
                      echo "</tr>";
                      echo "<tr class='fifthRow'>";
                      echo "<th>Academic Year ID</th>";
                      echo "<td><font color='white'>" .$test2['AcademicYearID']."</font></td>";
                      echo "</tr>";
                      echo "<tr class='sixthRow'>";
                      echo "<td> <a href ='adminedit2.php?CloseDatesID=$id2'><center>Edit</center></a>";
                      echo "<td> <a href ='admindel2.php?CloseDatesID=$id2'><center>Delete</center></a>";
                      echo "</tr>";
                      echo "</table>";
                    }
                  ?>
              <form action="adminadd2.php" method="post">
              <table class="w3-table w3-hide-small w3-hide-medium-small" id="table4">
                <tr>
                  <th>Faculty ID</th>
                  <th>Submission Date</th>
                  <th>Final Submission Date</th>
                  <th>Academic Year ID</th>
                  <th></th>
                </tr>
                <tr>
                  <td>
                    <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="FacultyID">
                      <option value="1" selected>FACH</option>
                      <option value="2">Business School</option>
                      <option value="3">Education & Health</option>
                      <option value="4">Engineering & Science</option>
                    </select>
                  </td>
                  <td>
                    <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" placeholder="Insert Content Here" type="date" name="SubmissionDate" class="form-control"/>
                  </td>
                  <td>
                    <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" type="date" placeholder="Insert Content Here" name="FinalSubmissionDate" class="form-control"/>
                  </td>
                  <td>
                    <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="AcademicYearID">
                    <?php
                      $result3=mysqli_query($con, "SELECT * FROM AcademicYear ORDER BY AcademicYearID");
                      while($test3 = mysqli_fetch_array($result3))
                      {
                        echo "<option value='" . $test3['AcademicYearID'] . "'>" . $test3['AcademicYearID'] . "</option>";
                      }
                    ?>
                    </select>
                  </td>
                  <td>
                    <center><input type="submit" name="submit" value="add" class="w3-btn w3-theme"/></center>
                  </td>
                </tr>
              </table>

              <table class="w3-table w3-hide-large w3-hide-medium" id="table4">
                <tr class='firstRow'>
                  <th>Faculty ID</th>
                  <td>
                    <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="FacultyID">
                      <option value="1" selected>FACH</option>
                      <option value="2">Business School</option>
                      <option value="3">Education & Health</option>
                      <option value="4">Engineering & Science</option>
                    </select>
                  </td>
                </tr>
                <tr class='secondRow'>
                  <th>Submission Date</th>
                  <td>
                    <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" placeholder="Insert Content Here" type="date" name="SubmissionDate" class="form-control"/>
                  </td>
                </tr>
                <tr class='thirdRow'>
                  <th>Final Submission Date</th>
                  <td>
                    <input style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" type="date" placeholder="Insert Content Here" name="FinalSubmissionDate" class="form-control"/>
                  </td>
                </tr>
                <tr class='fourthRow'>
                  <th>Academic Year ID</th>
                  <td>
                    <select style="color:white;width:100%;background-color: #444; margin: 0px !important; border: 0px !important;" name="AcademicYearID">
                    <?php
                      $result3=mysqli_query($con, "SELECT * FROM AcademicYear ORDER BY AcademicYearID");
                      while($test3 = mysqli_fetch_array($result3))
                      {
                        echo "<option value='" . $test3['AcademicYearID'] . "'>" . $test3['AcademicYearID'] . "</option>";
                      }
                    ?>
                    </select>
                  </td>
                </tr>
              </table>
              <table class="w3-table w3-hide-large w3-hide-medium">
                <tr class='fifthRow'>
                  <td style='border-top: 0 !important'>
                    <center><input type="submit" name="submit" value="add" class="w3-btn w3-theme"/></center>
                  </td>
                </tr>
              <table>
              </form><br>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Middle Column -->

  <script>
	var role = <?php echo json_encode($_SESSION['Role']); ?>;
	
  $('#userTable').fadeIn('slow');
  
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

  // if ($(window).width() <= 600) {
  //   $('#table1').removeClass('w3-table');
  //   $('#table2').removeClass('w3-table');
  //   $('#table3').removeClass('w3-table');
  //   $('#table4').removeClass('w3-table');
  // }

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
     var x = document.getElementById("navDemo");
     if (x.className.indexOf("w3-show") == -1) {
         x.className += " w3-show";
     } else { 
         x.className = x.className.replace(" w3-show", "");
     }
  }
  
  var currentYear = <?php echo $currentYear['AcademicYearID']; ?>;
  
  $(document).ready(
    function() { 
      $('#currentYear').val(currentYear) 
    }
  );
  
  $('#userTableBtn').click(function() {
    $('#userTable').fadeIn('slow');
    $('#academicYearTable').hide();
    $('#closeDatesTable').hide();
  });
  $('#academicYearBtn').click(function() {
    $('#academicYearTable').fadeIn('slow');
    $('#userTable').hide();
    $('#closeDatesTable').hide();
  });
  $('#closeDatesBtn').click(function() {
    $('#closeDatesTable').fadeIn('slow');
    $('#academicYearTable').hide();
    $('#userTable').hide();
  });
  $('#userTableBtnMobile').click(function() {
    $('#userTable').fadeIn('slow');
    $('#academicYearTable').hide();
    $('#closeDatesTable').hide();
  });
  $('#academicYearBtnMobile').click(function() {
    $('#academicYearTable').fadeIn('slow');
    $('#userTable').hide();
    $('#closeDatesTable').hide();
  });
  $('#closeDatesBtnMobile').click(function() {
    $('#closeDatesTable').fadeIn('slow');
    $('#academicYearTable').hide();
    $('#userTable').hide();
  });
  </script>
</body>
</html>