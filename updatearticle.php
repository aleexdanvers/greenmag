<?php 
  session_start();

  include 'includes/dbConnection.php';
  if($_SESSION["user_logged_in"] == false){
    header('Location: logout.php');
  }
	
	if ($_SESSION["Role"] == 'Admin') {
    header('Location: admin.php');
  } else if ($_SESSION["Role"] == 'Marketing Manager') {
    header('Location: marketingmanager.php');
  } else if ($_SESSION["Role"] == 'Marketing Co-ordinator') {
    header('Location: marketingcoordinator.php');
  } else if ($_SESSION["Role"] == 'Guest') {
    header('Location: guest.php');
  }

  $pageviewquery  = "SELECT * FROM PagesViewed WHERE PageName = 'Student Page';";
  $resultpageview = mysqli_query($con, $pageviewquery);
  $rowpageview = mysqli_fetch_array($resultpageview, MYSQLI_ASSOC);
  $NewPageViews = $rowpageview['Views'] + 1;
  $updatePageViewQuery = "UPDATE PagesViewed SET Views = " . $NewPageViews . " WHERE PageName = 'Student Page';";
  $updatePageView = mysqli_query($con, $updatePageViewQuery);
  
  if (isset($_GET['id']) == false) {
    header('Location: home.php');
    die();
  } else {
    $articleID = $_GET['id'];
  }
  
  $userIDQuery = "SELECT UserID FROM Article WHERE ArticleID = " . $articleID . ";";
  $userIDresult = mysqli_query($con, $userIDQuery);
  $rowUserID = mysqli_fetch_array($userIDresult, MYSQLI_ASSOC);
  
  if ($_SESSION['UserID'] != $rowUserID['UserID']) {
    header('Location: home.php');
    die();
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
			<div class="w3-col m3">
				<!-- Profile -->
				<br>
			</div><!-- Middle Column -->
			<div class="w3-col m6">
				<div class="w3-row-padding">
					<div class="w3-col m12">
						<div class="w3-card-2 w3-round w3-333">
							<div class="w3-container">
								<h4 class="w3-center">Update Article</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="w3-col m3">
				<!-- Profile -->
				<br>
			</div>
				<!-- Generate Content -->
				<form method='post' action='edit.php' enctype="multipart/form-data">
				<?php
						$articleQuery  = "SELECT Article.* FROM Article WHERE ArticleID = " . $articleID . ";";
						$result = mysqli_query($con, $articleQuery);
						
						while($row = mysqli_fetch_array($result)){

							echo "<div class='w3-container w3-card-2 w3-333 w3-round w3-margin'><br>";
							echo "<a href='/article_docs/" . $row['DocPath'] . "' class='w3-btn w3-theme' style='margin-right:10px;' download><i class='fa fa-download'></i> &nbsp;Download Doc</button></a>";
							echo "<h4 style='margin-bottom:0 !important;'>Title: </h4>";
							echo "<input class='w3-input w3-border w3-margin-bottom2 w3-half' type='text' value='" . $row['ArticleName'] . "' name='articleName' id='articleName' required>";
							echo "<br><br>";
							echo "<h4 style='margin-bottom:0 !important;'>Description: </h4>";
							echo "<textarea required rows='4' class='w3-input w3-border w3-margin-bottom2 w3-twothird' type='text' name='articleDescription' id='articleDescription'>" . $row['ArticleDescription'] . "</textarea>";
							echo "<div class='w3-row-padding'>";
							echo "</div>";
					    echo "<h4 style='margin-bottom:0 !important;'>Select file to upload: </h4>";
						  echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
							echo "<br><br>";
              if (isset($_SESSION['errorUpdate'])) {
                echo "<p style='color:#ff3333;margin-top:0!important;margin-bottom:16px;'>" . $_SESSION['errorUpdate'] . "</p>";
              }
							echo "<input type='submit' class='w3-btn w3-theme w3-margin-bottom' value='Update Details' name='submit'>";
							// echo "<button type='submit' class='w3-btn w3-theme w3-margin-bottom' id='updateChanges'>Update Details</button>";
							echo "</div>";
						}
						// if (mysqli_num_rows($result) === 0){
						// 	echo "<div class='w3-container w3-card-2 w3-333 w3-round w3-margin generatedContent'><br>";
						// 	echo "<h4 style='margin-bottom:0 !important;text-align:center;'>No Articles</h4>";
						// 	echo "<p style='text-align:center;'>There are currently no approved articles in your faculty!</p>";
						// 	echo "<div class='w3-row-padding' style='margin:0 -16px'>";
						// 	echo "<div class='w3-full'><img class='w3-margin-bottom' src='images/sademoji.png' style='height:150px;display:block;margin:0 auto;'></div></div>";
						// 	echo "</div>";
						// 
						// }
						$_SESSION['articleID'] = $articleID;
						mysqli_close($con);
				?>
				</form>
				<!-- End Middle Column -->
			</div><!-- Right Column -->
			</div><!-- End Grid -->
		</div><!-- End Page Container -->
	</div><br>
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