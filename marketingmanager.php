<?php 
  session_start();

  include 'includes/dbConnection.php';
  if($_SESSION["user_logged_in"] == false){
    header('Location: logout.php');
  }
  
  if ($_SESSION["Role"] == 'Admin') {
    header('Location: admin.php');
  } else if ($_SESSION["Role"] == 'Marketing Co-ordinator') {
    header('Location: marketingcoordinator.php');
  } else if ($_SESSION["Role"] == 'Student') {
    header('Location: home.php');
  } else if ($_SESSION["Role"] == 'Guest') {
    header('Location: guest.php');
  }
  
  $pageviewquery  = "SELECT * FROM PagesViewed WHERE PageName = 'Marketing Manager Page';";
  $resultpageview = mysqli_query($con, $pageviewquery);
  $rowpageview = mysqli_fetch_array($resultpageview, MYSQLI_ASSOC);
  $NewPageViews = $rowpageview['Views'] + 1;
  $updatePageViewQuery = "UPDATE PagesViewed SET Views = " . $NewPageViews . " WHERE PageName = 'Marketing Manager Page';";
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
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-opennav w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a> 
      <a class="w3-bar-item w3-logo-button w3-theme-d4" href="home.php"><i class="fa fa-glide-g" style="font-size: 55px;vertical-align: middle;line-height: 30px;"></i></a> 
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="statsNav" href="statistics.php" title="Statistics"><i class="fa fa-bar-chart"></i><p class="navbarText" id="statsText">Statistics</p></a>
      <!-- <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" href="#" title="Account Settings"><i class="fa fa-cog"></i><p class="navbarText">Statistics</p></a> -->
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="guestNav" href="guest.php" title="Guest"><i class="fa fa-user"></i><p class="navbarText" id="guestText">Guest</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="marketingManagerNav" href="marketingmanager.php" title="Marketing Manager"><i class="fa fa-briefcase"></i><p class="navbarText" id="marketingManagerText">Marketing Manager</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="marketingCoordinatorNav" href="marketingcoordinator.php" title="Marketing Co-ordinator"><i class="fa fa-briefcase"></i><p class="navbarText" id="marketingCoordinatorText">Marketing Co-ordinator</p></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="adminNav" href="admin.php" title="Admin"><i class="fa fa-briefcase"></i><p class="navbarText" id="adminText">Admin</p></a>
      <a class="w3-bar-item w3-logout-button w3-hide-small w3-right w3-padding-large w3-theme-d4" href="logout.php" title="My Account"><i aria-hidden="true" class="fa fa-sign-out"></i> Logout</a>
    </div>
  </div><!-- Navbar on small screens -->
  <div class="w3-navblock w3-theme-d2 w3-large w3-hide w3-hide-large w3-hide-medium w3-top" id="navDemo" style="margin-top:51px">
    <a class="w3-padding-large" href="#">Home</a> 
    <a class="w3-padding-large" href="#">News</a> 
    <a class="w3-padding-large" href="#">Account Settings</a> 
    <a class="w3-padding-large w3-theme-d4" href="logout.php">Logout</a>
  </div><!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;min-height:860px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <!-- Profile -->
        <br>
      </div><!-- Middle Column -->
      <div class="w3-col m6">
        <div class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card-2 w3-round w3-333">
              <div class="w3-container">
                <h4 class="w3-center">Marketing Manager</h4>
                <p class="w3-center"><img alt="Avatar" class="w3-circle" src="images/guestAvatar.png" style="height:106px;width:106px"></p>
                <p style="text-align: center;">All Faculties</p>
                <p id="showingp" style="text-align: center;"></p>
                <button style="display:block; margin:0 auto;" class="w3-btn w3-theme" onclick="location.href='zip.php'" type="button"><i class="fa fa-download"></i> &nbsp;Download ZIP</button><br>
              </div>
            </div>
          </div>
        </div><br>
            <div class="w3-container">
            <button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo5')"><i class="fa fa-globe fa-fw w3-margin-right"></i> All Approved Articles</button>
            <div class="w3-hide w3-container lightbackground" id="Demo5">
              <p class="articlecounttext"></p><button onclick="sortingFunction(5)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button>
              <br>
              <br>
            </div>
            <button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo1')"><i class="fa fa-home fa-fw w3-margin-right"></i> Architecture, Computing & Humanities Articles</button>
            <div class="w3-hide w3-container lightbackground" id="Demo1">
              <p class="articlecounttext"></p><button onclick="sortingFunction(1)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button><br>
              <br>
            </div><button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo2')"><i class="fa fa-home fa-fw w3-margin-right"></i> Business School Articles</button>
            <div class="w3-hide w3-container lightbackground" id="Demo2">
              <p class="articlecounttext"></p><button onclick="sortingFunction(2)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button>
              <br>
              <br>
            </div><button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo3')"><i class="fa fa-home fa-fw w3-margin-right"></i> Education & Health Articles</button>
            <div class="w3-hide w3-container lightbackground" id="Demo3">
              <p class="articlecounttext"></p><button onclick="sortingFunction(3)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button><br>
              <br>
            </div>
            <button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo4')"><i class="fa fa-home fa-fw w3-margin-right"></i> Engineering & Science Articles</button>
            <div class="w3-hide w3-container lightbackground" id="Demo4">
              <p class="articlecounttext"></p><button onclick="sortingFunction(4)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button><br>
              <br>
            </div>
          </div>
        <!-- Generate Content -->
        <?php
            $articleQuery  = "SELECT Article.*, Faculty.*, User.UserID, User.FacultyID, User.AvatarID, User.Username FROM Article INNER JOIN User ON Article.UserID=User.UserID INNER JOIN Faculty ON User.FacultyID=Faculty.FacultyID WHERE Article.StatusID = 1 ORDER BY Faculty.FacultyName ASC;";
            $result = mysqli_query($con, $articleQuery);
            while($row = mysqli_fetch_array($result)){

              $dateAgo = date_create($row['DateSubmitted']);
              $dateNow = date_create(gmdate("Y-m-d H:i:s"));
              $dateAgoUnix = date_format($dateAgo, "U");
              $dateNowUnix = date_format($dateNow, "U");

              $seconds = $dateNowUnix - $dateAgoUnix;

              if ($seconds < 60) {
                $stringAgo = ($seconds == 1) ? " second ago" : " seconds ago";
                $timeAgo = ltrim(gmdate("s", $seconds), '0') . $stringAgo;
              } else if ($seconds < 3600 && $seconds >= 60) {
                $stringAgo = ($seconds >= 60 && $seconds < 120) ? " minute ago" : " minutes ago";
                $timeAgo = ltrim(gmdate("i", $seconds), '0') . $stringAgo;
              } else if ($seconds < 86400 && $seconds >= 3600) {
                $stringAgo = ($seconds >= 3600 && $seconds < 7200) ? " hour ago" : " hours ago";
                $timeAgo = ltrim(gmdate("H", $seconds), '0') . $stringAgo;
              } else if ($seconds >= 86400) {
                $days = floor($seconds / 86400);
                $stringAgo = ($days == 1) ? " day ago" : " days ago";
                $timeAgo = $days . " " . $stringAgo;
              }

              echo "<div class='w3-container w3-card-2 w3-333 w3-round w3-margin generatedContent statusAll status" . $row['FacultyID'] . "'><br>";
              echo "<img alt='Avatar' class='w3-left w3-circle w3-margin-right' src='images/avatars/" . $row['AvatarID'] . ".png' style='width:60px'>";
              echo "<span class='w3-right w3-opacity'>" . $timeAgo . "</span>";
              echo "<h4 style='margin-bottom:0 !important;'>" . $row['ArticleName'] . "</h4>";
              echo "<p style='margin:0 !important;color:#999 !important;font-style: italic;'>" . $row['Username'] . "</p><br>";
              echo "<p>" . $row['FacultyName'] . ":</p>";
              echo "<p>" . $row['ArticleDescription'] . "</p>";
              echo "<div class='w3-row-padding' style='margin:0 -16px'>";
              $db_images = $row['ImagePath'];
              $imagesArray = explode(";", $db_images);
              $noOfImages = sizeof($imagesArray);

              if ($noOfImages == 3) {
                $imageClass = 'w3-third';
              } else if ($noOfImages == 2) {
                $imageClass = 'w3-half';
              } else {
                $imageClass = 'w3-full';
              }

              for ($i = 0; $i < $noOfImages; $i++) {
                echo "<div class='" . $imageClass . "'><img class='w3-margin-bottom' src='article_images/" . $imagesArray[$i] . "' style='width:100%'></div>";
              }

              echo "</div>";
              echo "<a href='/article_docs/" . $row['DocPath'] . "' download><button class='w3-btn w3-theme w3-margin-bottom' style='margin-right:10px;' type='button'><i class='fa fa-download'></i> &nbsp;Download Doc</button></a>";
                echo "</div>";
            }
            if (mysqli_num_rows($result) === 0){
              echo "<div class='w3-container w3-card-2 w3-333 w3-round w3-margin generatedContent'><br>";
              echo "<h4 style='margin-bottom:0 !important;text-align:center;'>No Articles</h4>";
              echo "<p style='text-align:center;'>There are currently no approved articles in your faculty!</p>";
              echo "<div class='w3-row-padding' style='margin:0 -16px'>";
              echo "<div class='w3-full'><img class='w3-margin-bottom' src='images/sademoji.png' style='height:150px;display:block;margin:0 auto;'></div></div>";
              echo "</div>";

            }
            mysqli_close($con);
        ?>

        <!-- End Middle Column -->
      </div><!-- Right Column -->
      </div><!-- End Grid -->
    </div><!-- End Page Container -->
  </div><br>
  <script>
  var role = <?php echo json_encode($_SESSION['Role']); ?>;
  
  if (role == 'Student') {
    // $("#statsNav").hide();
    $("#guestNav").hide();
    $("#marketingManagerNav").hide();
    // $("#articlesNav").hide();
    $("#marketingCoordinatorNav").hide();
    $("#adminNav").hide();
  } else if (role == 'Guest') {
    // $("#statsNav").hide();
    // $("#guestNav").hide();
    $("#marketingManagerNav").hide();
    $("#articlesNav").hide();
    $("#marketingCoordinatorNav").hide();
    $("#adminNav").hide();
  } else if (role == 'Marketing Co-ordinator') {
    // $("#statsNav").hide();
    $("#guestNav").hide();
    $("#marketingManagerNav").hide();
    $("#articlesNav").hide();
    // $("#marketingCoordinatorNav").hide();
    $("#adminNav").hide();
  } else if (role == 'Marketing Manager') {
    // $("#statsNav").hide();
    $("#guestNav").hide();
    // $("#marketingManagerNav").hide();
    $("#articlesNav").hide();
    $("#marketingCoordinatorNav").hide();
    $("#adminNav").hide();
  } else if (role == 'Admin') {
    // $("#statsNav").hide();
    $("#guestNav").hide();
    $("#marketingManagerNav").hide();
    $("#articlesNav").hide();
    $("#marketingCoordinatorNav").hide();
    // $("#adminNav").hide();
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

  // Accordion
  function myFunction(id) {
     var x = document.getElementById(id);
     if (x.className.indexOf("w3-show") == -1) {
         x.className += " w3-show";
         x.previousElementSibling.className += " w3-theme-d1";
     } else { 
         x.className = x.className.replace("w3-show", "");
         x.previousElementSibling.className = 
         x.previousElementSibling.className.replace(" w3-theme-d1", "");
     }
  }


  function sortingFunction(number){
    var counter;
    var faculty;
    if(number == 1){
    var elements = document.getElementsByClassName('status1');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('status2');
    var elements3 = document.getElementsByClassName('status3');
    var elements4 = document.getElementsByClassName('status4');
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "none";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "none";
    }
    for (var i = 0; i < elements4.length; i++){
        elements4[i].style.display = "none";
    }
    counter = elements.length;
    faculty = "The Architecture, Computing & Humanities Faculty";
    }
    else if(number == 2){
    //All
    var elements = document.getElementsByClassName('status2');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('status1');
    var elements3 = document.getElementsByClassName('status3');
    var elements4 = document.getElementsByClassName('status4');
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "none";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "none";
    }
    for (var i = 0; i < elements4.length; i++){
        elements4[i].style.display = "none";
    }
    counter = elements.length;
    faculty = "The Business School Faculty";
    }
    else if(number == 3){
    //All
    var elements = document.getElementsByClassName('status3');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('status1');
    var elements3 = document.getElementsByClassName('status2');
    var elements4 = document.getElementsByClassName('status4');
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "none";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "none";
    }
    for (var i = 0; i < elements4.length; i++){
        elements4[i].style.display = "none";
    }
    counter = elements.length;
    faculty = "The Education & Health Faculty";
    }
    else if(number == 4){
    //All
    var elements = document.getElementsByClassName('status4');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('status1');
    var elements3 = document.getElementsByClassName('status2');
    var elements4 = document.getElementsByClassName('status3');
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "none";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "none";
    }
    for (var i = 0; i < elements4.length; i++){
        elements4[i].style.display = "none";
    }
    counter = elements.length;
    faculty = "The Engineering & Science Faculty";
    }
    else if(number == 5){
    //All
    var elements = document.getElementsByClassName('status1');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('status2');
    var elements3 = document.getElementsByClassName('status3');
    var elements4 = document.getElementsByClassName('status4');
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "block";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "block";
    }
    for (var i = 0; i < elements4.length; i++){
        elements4[i].style.display = "block";
    }
    counter = elements.length + elements2.length + elements3.length + elements4.length;
    faculty = "All Faculties";
    }
    document.getElementById("showingp").innerHTML = "Showing " + counter + " Approved Articles<br>From " + faculty;    
  }

  sortingFunction(5);

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