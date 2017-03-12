<?php 
	session_start();
	include 'includes/dbConnection.php';

	$articleID = $_GET['id'];
	$currentYearQuery = "SELECT * FROM AcademicYear WHERE currentYear = 1;";
	$currentYear = mysqli_fetch_array(mysqli_query($con, $currentYearQuery), MYSQLI_ASSOC);
	
	$pageviewquery  = "SELECT TimesVisited FROM Article WHERE ArticleID = " . $articleID . ";";
	$resultpageview = mysqli_fetch_array(mysqli_query($con, $pageviewquery), MYSQLI_ASSOC);
	$newArticleView = $resultpageview['TimesVisited'] + 1;
	$updateArticleViewQuery = "UPDATE Article SET TimesVisited = " . $newArticleView . " WHERE ArticleID = " . $articleID . ";";
	$updatePageView = mysqli_query($con, $updateArticleViewQuery);
?>
<!DOCTYPE html>
<html lang="en-GB">
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
      <div class="w3-col m3">
				<br>
      </div><!-- Middle Column -->
      <div class="w3-col m7">
        <!-- Generate Content -->
        <?php
						$selectQuery = "SELECT Article.*, Status.*, User.*, AcademicYear.* FROM Article INNER JOIN Status ON Article.StatusID = Status.StatusID INNER JOIN User ON Article.UserID = User.UserID INNER JOIN AcademicYear ON Article.AcademicYearID = AcademicYear.AcademicYearID WHERE ArticleID = " . $articleID . ";";
						$selectArticle = mysqli_query($con, $selectQuery);
						$row = mysqli_fetch_array($selectArticle, MYSQLI_ASSOC);

						$closeDatesQuery = "SELECT * FROM CloseDates WHERE AcademicYearID = " . $currentYear['AcademicYearID'] . " AND FacultyID = " . $_SESSION['FacultyID'] . ";";
						$closeDates = mysqli_fetch_array(mysqli_query($con, $closeDatesQuery), MYSQLI_ASSOC);
						
            $closeDate = date_create($closeDates['SubmissionDate']);
            $_SESSION["CloseDate"] = date_format($closeDate, 'd/m/Y');
            $_SESSION["CloseDateFull"] = date_format($closeDate, 'M j, Y G:i:s');
            $_SESSION["CloseDateUnix"] = date_format($closeDate, 'U');
            $finalCloseDate = date_create($closeDates['FinalSubmissionDate']);
            $_SESSION["FinalCloseDate"] = date_format($finalCloseDate, 'd/m/Y');
            $_SESSION["FinalCloseDateUnix"] = date_format($finalCloseDate, 'U');

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

            echo "<div class='w3-container w3-card-2 w3-333 w3-round w3-margin generatedContent statusAll status" . $row['Status'] . "'><br>";
            echo "<img alt='Avatar' class='w3-left w3-circle w3-margin-right' src='images/avatars/" . $_SESSION['avatarChosen'] . ".png' style='width:60px'>";
            echo "<span class='w3-right w3-opacity'>" . $timeAgo . "</span>";
            echo "<h4 style='margin-bottom:0 !important;'>" . $row['ArticleName'] . "</h4>";
            echo "<p class='w3-opacity' style='margin:0 !important;'>Status: " . $row['Status'] . "</p>";
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
						
						if ($_SESSION['Role'] == 'Student' || $_SESSION['Role'] == 'Marketing Co-ordinator') {
							if ($row['Comment'] != ""){
	              echo "<div id='commentBlock' style='margin-bottom:32px!important;display:none;'>";
	                echo "<hr class='no-margin-top'>";
	                echo "<img style='float:left;margin-right:5px;' src='images/guestAvatar.png' height='50px'>";
	                echo "<span style='font-size:15px;font-weight:bold;'>Marketing Co-Ordinator:</span>";
	                echo "<p class='commentText' style='margin-top:0 !important'>";
	                  echo $row['Comment'];
	                echo "</p>";
									echo "<div class='clearfix'></div>";
	              echo "</div>";
							}
							else{
								echo "<div id='commentBlock' class='w3-margin-bottom' style='display:none;'><p>No Comments</p></div>";
							}
            }
						
						echo "<a href='redirects.php'><button class='w3-btn w3-theme w3-margin-bottom' style='margin-right:10px;' type='button'><i class='fa fa-arrow-left'></i> Back</button></a>";
						
            echo "<a href='/article_docs/" . $row['DocPath'] . "' download><button class='w3-btn w3-theme w3-margin-bottom' style='margin-right:10px;' type='button'><i class='fa fa-download'></i> &nbsp;Download Doc</button></a>";

            echo "<a href='updatearticle.php?id=" . $row['ArticleID'] . "' style='display:none;' id='updateArticleBtnHref'><button id='updateArticleBtn' class='updateArticleBtn w3-btn w3-theme w3-margin-bottom' type='button'><i class='fa fa-pencil'></i> &nbsp;Update</button></a>";
						
						echo "<button class='w3-btn w3-theme w3-margin-bottom' style='margin-right:10px;display:none;' onclick='openComment(" . $row['ArticleID'] . ")' id='commentBtn' type='button'><i class='fa fa-pencil'></i> &nbsp;Edit</button>";
            
						echo "<script>$(document).ready(function() { $('#statusID" . $row['ArticleID'] . "').val(" . $row['StatusID'] . ") });</script>";
						
						include 'includes/openComment.php';
						echo "<button class='w3-btn w3-theme w3-margin-top' type='submit'><i class='fa fa-check-square-o'></i> &nbsp;Submit</button></a>";
						echo "</form>";
						echo "</div>";
						echo "</div>";
						

              echo "</div>";
            mysqli_close($con);
        ?>
      </div><!-- End Grid -->
    </div><!-- End Page Container -->
  </div>
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
		$("#updateArticleBtnHref").show();
		$("#commentBlock").show();
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
		$("#commentBtn").show();
		$("#commentBlock").show();
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
		$("#commentBlock").show();
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
  
  if ($(window).width() <= 600) {
    // $('#logo').css('height','34px');
  } else if ($(window).width() <= 830) {
    $('#uploadArticlesBox').addClass('w3-row-padding-bottom');
    $('#uploadArticlesBox').removeClass('w3-row-padding');
    $('.generatedContent').addClass('w3-margin-bottom');
    $('.generatedContent').removeClass('w3-margin');
    $('.modal-content').css('width', '90%');
    $('#acceptButton').removeClass('w3-section');
    $('#acceptButton').addClass('w3-margin-top');
    $('#rejectButton').removeClass('w3-section');
    $('#rejectButton').addClass('w3-margin-bottom');
  }

  $(window).resize(function() {
    if ($(window).width() <= 600) {
      // $('#logo').css('height','34px');
    } else if ($(window).width() <= 830) {
      $('#uploadArticlesBox').addClass('w3-row-padding-bottom');
      $('#uploadArticlesBox').removeClass('w3-row-padding');
      $('.generatedContent').addClass('w3-margin-bottom');
      $('.generatedContent').removeClass('w3-margin');
      $('.modal-content').css('width', '90%');
      $('#acceptButton').removeClass('w3-section');
      $('#acceptButton').addClass('w3-margin-top');
      $('#rejectButton').removeClass('w3-section');
      $('#rejectButton').addClass('w3-margin-bottom');
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

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
     var x = document.getElementById("navDemo");
     if (x.className.indexOf("w3-show") == -1) {
         x.className += " w3-show";
     } else { 
         x.className = x.className.replace(" w3-show", "");
     }
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

  function showComment(id){
    var commentId = "hiddenComments" + id;
   if(document.getElementsByClassName(commentId)[0].style.display == "block"){
    document.getElementsByClassName(commentId)[0].style.display = "none";
   }
   else{
     document.getElementsByClassName(commentId)[0].style.display = "block";
   }
  }

  var dateNow = <?php echo date_format($dateNow, "U"); ?>;
  var closingDate = <?php echo json_encode($_SESSION['CloseDateUnix']); ?>;
  var finalClosingDate = <?php echo json_encode($_SESSION['FinalCloseDateUnix']); ?>;

  if (dateNow > finalClosingDate) {
    $('.updateArticleBtn').prop('disabled', true);
    $('.updateArticleBtn').attr('title', 'Updating articles disabled');
    $('#commentBtn').prop('disabled', true);
    $('#commentBtn').attr('title', 'Commenting disabled');
  }
	
	function openComment(commentID) {
		var id = 'openCommentMarketing' + commentID;
		var comment = $('#'+id);
		if (comment.css('display') != 'block') {
			$('#'+id).show('fast');
		} else {
			$('#'+id).hide('fast');
		}
	}
  </script>
</body>
</html>