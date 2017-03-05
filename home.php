<?php 
  session_start();

  include 'includes/dbConnection.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Greenmag</title>
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
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="statistics.php" title="Statistics"><i class="fa fa-bar-chart"></i></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="#" title="Account Settings"><i class="fa fa-cog"></i></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="guest.php" title="Guest"><i class="fa fa-user"></i></a>
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="marketingmanager.php" title="Marketing Manager"><i class="fa fa-briefcase"></i></a>
      <a class="w3-bar-item w3-logout-button w3-hide-small w3-right w3-padding-large w3-theme-d4" href="logout.php" title="My Account"><i aria-hidden="true" class="fa fa-sign-out"></i> Logout</a>
    </div>
  </div><!-- Navbar on small screens -->
  <div class="w3-navblock w3-theme-d2 w3-large w3-hide w3-hide-large w3-hide-medium w3-top" id="navDemo" style="margin-top:51px">
    <a class="w3-padding-large" href="#">Home</a> 
    <a class="w3-padding-large" href="#">News</a> 
    <a class="w3-padding-large" href="#">Account Settings</a> 
    <a class="w3-padding-large w3-theme-d4 w3-logout-button" href="logout.php">Logout</a>
  </div><!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;min-height:860px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <!-- Profile -->
        <div class="w3-card-2 w3-round w3-333">
          <div class="w3-container">
            <h4 class="w3-center">My Profile</h4>
            <p class="w3-center" style="margin-bottom:35px;"><img alt="Avatar" class="w3-circle" src="https://www.w3schools.com/w3images/avatar<?php echo $_SESSION['avatarChosen']; ?>.png" style="height:106px;width:106px"></p>
            <p id="userName"><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['Username']; ?></p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['Faculty']; ?></p>
            <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['Role']; ?></p>
            <p><i class="fa fa-clock-o fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION["LastLoggedIn"]; ?></p> 
          </div>
        </div><br>
        <!-- Accordion -->
        <div class="w3-card-2 w3-round">
          <div class="w3-333">
            <button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo1')"><i class="fa fa-globe fa-fw w3-margin-right"></i> My Articles</button>
            <div class="w3-hide w3-container" id="Demo1">
              <p class="articlecounttext"></p><button onclick="sortingFunction(1)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button><br>
              <br>
            </div><button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo2')"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Pending Articles</button>
            <div class="w3-hide w3-container" id="Demo2">
              <p class="articlecounttext"></p><button onclick="sortingFunction(2)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button>
              <br>
              <br>
            </div><button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo3')"><i class="fa fa-check fa-fw w3-margin-right"></i> My Approved Articles</button>
            <div class="w3-hide w3-container" id="Demo3">
              <p class="articlecounttext"></p><button onclick="sortingFunction(3)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button><br>
              <br>
            </div>
            <button class="w3-btn-block w3-theme-d2 w3-left-align" onclick="myFunction('Demo4')"><i class="fa fa-times fa-fw w3-margin-right"></i> My Rejected Articles</button>
            <div class="w3-hide w3-container" id="Demo4">
              <p class="articlecounttext"></p><button onclick="sortingFunction(4)" class="w3-btn w3-theme smallbtnfont" type="button"><i class="fa fa-filter"></i> &nbsp;Filter</button><br>
              <br>
            </div>
          </div>
        </div><br>
        <!-- Alert Box -->
        <div class="w3-container w3-round w3-theme-l4 w3-theme-border w3-margin-bottom w3-hide-small">
          <span class="w3-hover-text-grey w3-closebtn" onclick="this.parentElement.style.display='none'"><i class="fa fa-remove"></i></span>
          <p><i aria-hidden="true" class="fa fa-exclamation-circle"></i> <strong>Did you know?</strong></p>
          <p>You can sort the articles you see using the above buttons?</p>
        </div><!-- Interests -->
        <div class="w3-card-2 w3-round w3-333">
          <div class="w3-container">
            <h4 class="">Change Password</h4>
            <form action="changePassword.php" method="post">
              <input class="w3-input w3-border w3-margin-bottom2" id="previousPassword" maxlength="20" name="previousPassword" placeholder="Previous Password" required="" type="password">
              <input class="w3-input w3-border w3-margin-bottom2" id="newPassword" maxlength="20" name="newPassword" placeholder="New Password" required="" type="password"> <button class="w3-btn w3-theme smallbtnfont" id="updatePassword" onclick="validatePassword()">Update Password</button><p style="display:none;" id="updatePassworddiv"></p>
              <h4 id="successfullPasswordChange" style="display:none;padding-top:5px !important;color:#2eb82e;font-size: 13px;"><i aria-hidden="true" class="fa fa-check"></i> Congratulations, you successfully changed your password!</h4>
              <h4 id="unsuccessfullPasswordChange" style="display:none;padding-top:5px !important;color:#ff3333;font-size: 14px;"><i aria-hidden="true" class="fa fa-times"></i> Invalid Password!</h4>
            </form>
          </div>
        </div><br>
        <!-- End Left Column -->
      </div><!-- Middle Column -->
      <div class="w3-col m7">
        <div id="uploadArticlesBox" class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card-2 w3-round w3-333">
              <div class="w3-container w3-padding">
                <h4 class="">Upload Articles</h4>
                <p class="w3-border w3-padding" contenteditable="true">Give your article a name!</p><button class="w3-btn w3-theme" type="button"><i class="fa fa-pencil"></i> &nbsp;Post</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Generate Content -->
        <?php
            $articleQuery  = "SELECT * FROM Article WHERE UserID = '" . $_SESSION['UserID'] . "' ORDER BY DateSubmitted DESC;";
            $result = mysqli_query($con, $articleQuery);
            $datesQuery  = "SELECT * FROM CloseDates WHERE FacultyID = '" . $_SESSION['FacultyID'] . "';";
            $result5 = mysqli_query($con, $datesQuery);
            $row5 = mysqli_fetch_array($result5);
            $closeDate = date_create($row5['SubmissionDate']);
            $_SESSION["CloseDate"] = date_format($closeDate, 'd/m/Y');
            $finalCloseDate = date_create($row5['FinalSubmissionDate']);
            $_SESSION["FinalCloseDate"] = date_format($finalCloseDate, 'd/m/Y');

            while($row = mysqli_fetch_array($result)){
            $statusquery  = "SELECT * FROM Status WHERE StatusID = '" . $row['StatusID'] . "';";
            $result2 = mysqli_query($con, $statusquery);
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

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

              echo "<div class='w3-container w3-card-2 w3-333 w3-round w3-margin generatedContent statusAll status" . $row2['Status'] . "'><br>";
              echo "<img alt='Avatar' class='w3-left w3-circle w3-margin-right' src='https://www.w3schools.com/w3images/avatar" . $_SESSION['avatarChosen'] . ".png' style='width:60px'>";
              echo "<span class='w3-right w3-opacity'>" . $timeAgo . "</span>";
              echo "<h4 style='margin-bottom:0 !important;'>" . $row['ArticleName'] . "</h4>";
              echo "<p class='w3-opacity' style='margin:0 !important;'>Status: " . $row2['Status'] . "</p>";
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

              echo "<button class='w3-btn w3-theme w3-margin-bottom' onclick='showComment(" . $row['ArticleID'] . ")'' type='button'><i class='fa fa-comment'></i> &nbsp;View Comments</button>";

              if ($row['Comment'] != ""){
                echo "<div class='hiddenComments" . $row['ArticleID'] . "' style='display:none;'><img style='float:left;margin-right:5px;' src='images/guestAvatar.png' height='20px'><p><span style='font-size:15px;font-weight:bold;'>Marketing Co-Ordinator </span><br>" . $row['Comment'] . "</p></div>";
              }
              else{
                echo "<div class='hiddenComments" . $row['ArticleID'] . "' style='display:none;'><p>No Comments</p></div>";
              }
                echo "</div>";
            }
            if (mysqli_num_rows($result) === 0){
              echo "<div class='w3-container w3-card-2 w3-333 w3-round w3-margin generatedContent'><br>";
              echo "<h4 style='margin-bottom:0 !important;text-align:center;'>No Articles</h4>";
              echo "<p style='text-align:center;'>You have not submitted anything!</p>";
              echo "<div class='w3-row-padding' style='margin:0 -16px'>";
              echo "<div class='w3-full'><img class='w3-margin-bottom' src='images/sademoji.png' style='height:150px;display:block;margin:0 auto;'></div></div>";
              echo "</div>";

            }
            mysqli_close($con);
        ?>

        <!-- End Middle Column -->
      </div><!-- Right Column -->
      <div class="w3-col m2">
        <div class="w3-card-2 w3-round w3-333">
          <div class="w3-container">
            <h4 class="">Faculty Deadlines</h4>
            <p style="font-size: 12px;"><i aria-hidden="true" style="margin-right:5px;" class="fa fa-calendar-check-o fa-fw w3-text-theme"></i>Submissions: <?php echo $_SESSION["CloseDate"]; ?></p>
            <p style="font-size: 12px;"><i aria-hidden="true" style="margin-right:5px;" class="fa fa-calendar-check-o fa-fw w3-text-theme"></i>Close Date: <?php echo $_SESSION["FinalCloseDate"]; ?></p>
          </div>
        </div><br>
        <div class="w3-card-2 w3-round w3-333 w3-center">
          <div class="w3-container">
            <h4 class="w3-center">Change Avatar</h4>
            <div class="w3-content w3-display-container">
              <img class="mySlides" src="https://www.w3schools.com/w3images/avatar3.png" id="avatar3" style="width:100%"> 
              <img class="mySlides" src="https://www.w3schools.com/w3images/avatar4.png" id="avatar4" style="width:100%"> 
              <img class="mySlides" src="https://www.w3schools.com/w3images/avatar2.png" id="avatar2" style="width:100%"> 
              <img class="mySlides" src="https://www.w3schools.com/w3images/avatar5.png" id="avatar5" style="width:100%">
            </div>
            <div class="w3-row">
              <form method="post" action="changeAvatar.php">
                <div class="w3-half" style="padding-right:5px;">
                  <button id="acceptButton" class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
                  <input id="selectedAvatar" name="selectedAvatar" style="display: none"/>
                </div>
              </form>
              <div class="w3-half" style="padding-left:5px;">
                <button id="rejectButton" class="w3-btn w3-ff4d4d w3-btn-block w3-section" onclick="nextImage()" title="Decline"><i class="fa fa-remove"></i></button>
              </div>
            </div>
          </div>
        </div><br>
        <div class="w3-card-2 w3-round w3-333 w3-padding-16 w3-center">
          <p><i class="fa fa-bug w3-xxlarge"></i></p>
          <div style="margin-left:10%;margin-right: 10%;">
            <button class="w3-btn w3-btn-block w3-theme" id="myBtn">Info</button>
          </div>
        </div><!-- End Right Column -->
      </div><!-- End Grid -->
    </div><!-- End Page Container -->
  </div><br>
  <div class="modal" id="myModal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>About</h2>
      </div>
      <div class="modal-body">
        <p>Welcome to Greenmag at the University of Greenwich!</p>
        <p class="w3-padding-8">This is a secure web-based system for collecting student contributions for the annual “Greenmag” university magazine. This system is dedicated for the four faculties of the university: Faculty of Architecture, Computing and Humanities, Business School, Faculty of Education and Health, Faculty of Engineering and Science. All students across these faculties are encouraged to write and upload articles for our annual university magazine.</p>
        <p class="w3-padding-8">If you are a student, you should first register with your credentials so that you can login into the system. Once you register and login, you can submit one or more articles and accompanying images. Before any submission, you must agree to our <span style="font-style: italic;">Terms and Conditions</span>. You may update your submissions at any point up until the closure date. As a student, you will also have a faculty based Marketing Coordinator who will manage your faculties submissions. The Marketing Coordinator will read, edit and publish your articles to the system. There is also a general Marketing Manager who will oversee the whole process and choose the articles that will be published in the magazine.</p>
        <p class="w3-padding-8">If you are a guest, you can login within each Faculty to see the articles and the statistics about the annual submissions.</p>
      </div>
    </div>
  </div>
  <script>
  if ($(window).width() <= 600) {
    $('#uploadArticlesBox').addClass('w3-row-padding-bottom');
    $('#uploadArticlesBox').removeClass('w3-row-padding');
    $('.generatedContent').addClass('w3-margin-bottom');
    $('.generatedContent').removeClass('w3-margin');
    $('#acceptButton').removeClass('w3-section');
    $('#acceptButton').addClass('w3-margin-top');
    $('#rejectButton').removeClass('w3-section');
    $('#rejectButton').addClass('w3-margin-bottom');
    $('.modal-content').css('width', '90%');
    $('#logo').css('height','34px');
  }

  $(window).resize(function() {
    if ($(window).width() <= 600) {
      $('#uploadArticlesBox').addClass('w3-row-padding-bottom');
      $('#uploadArticlesBox').removeClass('w3-row-padding');
      $('.generatedContent').addClass('w3-margin-bottom');
      $('.generatedContent').removeClass('w3-margin');
      $('#acceptButton').removeClass('w3-section');
      $('#acceptButton').addClass('w3-margin-top');
      $('#rejectButton').removeClass('w3-section');
      $('#rejectButton').addClass('w3-margin-bottom');
      $('.modal-content').css('width', '90%');
      $('#logo').css('height','34px');
    } else {
      $('#uploadArticlesBox').removeClass('w3-row-padding-bottom');
      $('#uploadArticlesBox').addClass('w3-row-padding');
      $('.generatedContent').removeClass('w3-margin-bottom');
      $('.generatedContent').addClass('w3-margin');
      $('#acceptButton').addClass('w3-section');
      $('#acceptButton').removeClass('w3-margin-top');
      $('#rejectButton').addClass('w3-section');
      $('#rejectButton').removeClass('w3-margin-bottom');
      $('.modal-content').css('width', '40%');
      $('#logo').css('height','29px');
    }
  });
  
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

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
     var x = document.getElementById("navDemo");
     if (x.className.indexOf("w3-show") == -1) {
         x.className += " w3-show";
     } else { 
         x.className = x.className.replace(" w3-show", "");
     }
  }

  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
   showDivs(slideIndex += n);
  }

  function showDivs(n) {
   var i;
   var x = document.getElementsByClassName("mySlides");
   if (n > x.length) {slideIndex = 1}    
   if (n < 1) {slideIndex = x.length}
   for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
   }
   x[slideIndex-1].style.display = "block";  
  }

  function getAvatarImage() {
    var avatar = document.getElementsByClassName("mySlides");
    
    if (document.getElementById("avatar2").style.display == "block") {
      document.getElementById("selectedAvatar").value = "2";
    } else if (document.getElementById("avatar3").style.display == "block") {
      document.getElementById("selectedAvatar").value = "3";
    } else if (document.getElementById("avatar4").style.display == "block") {
      document.getElementById("selectedAvatar").value = "4";
    } else if (document.getElementById("avatar5").style.display == "block") {
      document.getElementById("selectedAvatar").value = "5";
    }
  }

  getAvatarImage();
  
  function nextImage() {
    plusDivs(1);
    getAvatarImage();
  }
  
  var modal = document.getElementById('myModal');
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("close")[0];
  // console.log(updateSuccessfulPHP);
  var updateSuccessfulPHP = <?php echo json_encode($_SESSION['updateSuccessful']); ?>;
  var unsuccessfullPasswordChange = document.getElementById("unsuccessfullPasswordChange");
  var successfullPasswordChange = document.getElementById("successfullPasswordChange");
  var newPassword = document.getElementById("newPassword");
  var previousPassword = document.getElementById("previousPassword");
  var updatePassworddiv = document.getElementById("updatePassworddiv");
  var LastLoggedIn = <?php echo json_encode($_SESSION['LastLoggedIn']); ?>;

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
     modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
     modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
  }

  function showComment(id){
    var commentId = "hiddenComments" + id;
   if(document.getElementsByClassName(commentId)[0].style.display == "block"){
    document.getElementsByClassName(commentId)[0].style.display = "none";
   }
   else{
     document.getElementsByClassName(commentId)[0].style.display = "block";
   }
  }

  function changePassword(){
   if(updateSuccessfulPHP == 'true'){
    successfullPasswordChange.style.display = "block";
   }
   if (updateSuccessfulPHP == 'false'){
     unsuccessfullPasswordChange.style.display = "block";
   }
   if (updateSuccessfulPHP == 'unset') {
    updatePassworddiv.innerHTML == "<br><br>";
    updatePassworddiv.style.display = "block";
   }
  }

  function validatePassword() {
    if (previousPassword.value == newPassword.value) {
      newPassword.setCustomValidity("Passwords Can't Match!");
    } else {
      newPassword.setCustomValidity('');
    }
  }

  function sortingFunction(number){
    if(number == 1){
    //All
    var elements = document.getElementsByClassName('statusAll');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    }
    else if(number == 2){
    //Published
    var elements = document.getElementsByClassName('statusPending');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('statusApproved');
    var elements3 = document.getElementsByClassName('statusRejected');
    
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "none";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "none";
    }
    }
    else if(number == 3){
    //Approved
    var elements = document.getElementsByClassName('statusApproved');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('statusPending');
    var elements3 = document.getElementsByClassName('statusRejected');
    
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "none";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "none";
    }
    }
    else if(number == 4){
    //Rejected
    var elements = document.getElementsByClassName('statusRejected');
    
    for (var i = 0; i < elements.length; i++){
        elements[i].style.display = "block";
    }
    var elements2 = document.getElementsByClassName('statusApproved');
    var elements3 = document.getElementsByClassName('statusPending');
    
    for (var i = 0; i < elements2.length; i++){
        elements2[i].style.display = "none";
    }
    for (var i = 0; i < elements3.length; i++){
        elements3[i].style.display = "none";
    }
    }
  }

  function countArticles(){
    var element = document.getElementsByClassName('statusAll').length;
    var element1 = document.getElementsByClassName('statusPending').length;
    var element2 = document.getElementsByClassName('statusApproved').length;
    var element3 = document.getElementsByClassName('statusRejected').length;
    document.getElementsByClassName("articlecounttext")[0].innerHTML = "You have " + element + " total article(s).";
    document.getElementsByClassName("articlecounttext")[1].innerHTML = "You have " + element1 + " pending article(s).";
    document.getElementsByClassName("articlecounttext")[2].innerHTML = "You have " + element2 + " approved article(s).";
    document.getElementsByClassName("articlecounttext")[3].innerHTML = "You have " + element3+ " rejected article(s).";
  }

  changePassword();
  countArticles();
  </script>
</body>
</html>