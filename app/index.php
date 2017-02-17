<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Greenmag</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="styles/styles.css" rel="stylesheet">
</head>
<body>
	<!-- Navbar (sit on top) -->
	<div class="w3-top">
		<ul class="w3-navbar w3-white w3-card-2" id="myNavbar">
			<li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
				<a class="w3-hover-black" id="toggle-menu" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			</li>
			<li class="w3-left-align w3-hide-small">
				<a href="#home">HOME</a>
			</li>
			<li class="w3-hide-small">
				<a href="#about">ABOUT</a>
			</li>
			<li class="w3-hide-small">
				<a href="#articles">ARTICLES</a>
			</li>
			<li class="w3-hide-small">
				<a href="#statistics">STATISTICS</a>
			</li>
			<li class="w3-hide-small w3-right">
				<a class="w3-hover-red" id="loginButton" onclick="document.getElementById('modal-logged-out').style.display='block'"><i class="fa fa-user w3-margin-right-small"></i> <span class="loginClass" id="loginButtonID">Sign In</span></a>
			</li>
		</ul><!-- Navbar on small screens -->
		<div class="w3-hide w3-hide-large w3-hide-medium" id="navDemo">
			<ul class="w3-navbar w3-left-align w3-white">
				<li>
					<a href="#home" onclick="toggleFunction()">HOME</a>
				</li>
				<li>
					<a href="#about" onclick="toggleFunction()">ABOUT</a>
				</li>
				<li>
					<a href="#articles" onclick="toggleFunction()">ARTICLES</a>
				</li>
				<li>
					<a href="#statistics" onclick="toggleFunction()">STATISTICS</a>
				</li>
				<li>
					<a onclick="document.getElementById('modal-logged-out').style.display='block'">SIGN IN</a>
				</li>
			</ul>
		</div>
	</div><!-- First Parallax Image with Logo Text -->
	<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
		<div class="w3-display-middle w3-display-middle2" style="white-space:nowrap;">
			<span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity homepage-text">GREENMAG</span>
		</div>
	</div><!-- Container (About Section) -->
	<div class="w3-content w3-container w3-padding-64" id="about">
		<h3 class="w3-center">ABOUT</h3>
		<p class="w3-center"><em>Lorem Ipsum</em></p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<div class="w3-center"><img src="../images/logo_light.png" width="150px"></div>
	</div>
	<!-- Second Parallax Image with Portfolio Text -->
	<div class="bgimg-2 w3-display-container w3-opacity-min">
		<div class="w3-display-middle">
			<span class="w3-xxlarge w3-text-light-grey w3-wide w3-text-shadow-parallax">ARTICLES</span>
		</div>
	</div><!-- Container (Portfolio Section) -->
	<div class="w3-content w3-container w3-padding-64" id="articles">
		<h3 class="w3-center">SUBMITTED WORK</h3>
		<p class="w3-center"><em>Here are some examples of work submitted by our students.</em></p><br>
		<!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
		<div class="w3-row-padding w3-center">
			<div class="w3-col m3"><img alt="The mist over the mountains" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div>
			<div class="w3-col m3"><img alt="Coffee beans" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div>
			<div class="w3-col m3"><img alt="Bear closeup" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div>
			<div class="w3-col m3"><img alt="Quiet ocean" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div>
		</div>
		<div class="w3-row-padding w3-center w3-section">
			<div class="w3-col m3"><img alt="The mist" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div>
			<div class="w3-col m3"><img alt="My beloved typewriter" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div>
			<div class="w3-col m3"><img alt="Empty ghost train" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div>
			<div class="w3-col m3"><img alt="Sailing" class="w3-hover-opacity" onclick="onClick(this)" src="../images/logo_dark.png" style="width:100%"></div><button class="w3-btn w3-light-grey w3-padding-xlarge" style="margin-top:64px">LOAD MORE</button>
		</div>
	</div><!-- Modal for full size images on click-->
	<div class="w3-modal w3-black" id="modal01" onclick="this.style.display='none'">
		<span class="w3-closebtn w3-text-white w3-opacity w3-hover-opacity-off w3-xxlarge w3-container w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
		<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
			<img class="w3-image" id="img01">
			<p class="w3-opacity w3-large" id="caption"></p>
		</div>
	</div><!-- Third Parallax Image with Portfolio Text -->
	<div class="bgimg-3 w3-display-container w3-opacity-min">
		<div class="w3-display-middle">
			<span class="w3-xxlarge w3-text-light-grey w3-wide w3-text-shadow-parallax">STATISTICS</span>
		</div>
	</div>
	<div class="w3-row w3-center w3-dark-grey w3-padding-16">
		<div class="w3-quarter w3-section">
			<span class="w3-xlarge">40,000+</span><br>
			Submissions
		</div>
		<div class="w3-quarter w3-section">
			<span class="w3-xlarge">21,000+</span><br>
			Students
		</div>
		<div class="w3-quarter w3-section">
			<span class="w3-xlarge">5</span><br>
			Faculties
		</div>
		<div class="w3-quarter w3-section">
			<span class="w3-xlarge">1</span><br>
			Greenwich
		</div>
	</div>
	<!-- Container (Contact Section) -->
	<div class="w3-content w3-container w3-padding-64" id="statistics">
		<h3 class="w3-center">STATS:</h3>
		<p class="w3-large w3-center w3-padding-16">Some statistics about our submissions:</p>
		<p class="w3-wide"><i class="fa fa-camera"></i>Photography submissions</p>
		<div class="w3-progress-container">
			<div class="w3-progressbar" style="width:58%"></div>
		</div>
		<p class="w3-wide"><i class="fa fa-laptop"></i>Articles</p>
		<div class="w3-progress-container">
			<div class="w3-progressbar" style="width:22%"></div>
		</div>
		<p class="w3-wide"><i class="fa fa-photo"></i>Designs</p>
		<div class="w3-progress-container">
			<div class="w3-progressbar" style="width:20%"></div>
		</div>
	</div>
	<div class="w3-modal" id="modal-logged-out">
		<div class="w3-modal-content w3-animate-top w3-card-8">
			<header class="w3-container w3-blackgrey">
				<h2 class="lefty">User Accounts</h2>
				<h2><span class="w3-closebtn2 righty" onclick="closeModals()"><i class="fa fa-close"></i></span></h2>
			</header>
			<div class="w3-container">
				<div class="w3-half w3-padding-right-small">
					<form action="form.asp" target="_blank">
						<div class="w3-row-padding-top">
							<h3>New Account</h3><input class="w3-input w3-border w3-register-input" name="Username" placeholder="Email Address" required="" type="Email"> <input class="w3-input w3-border w3-register-input" maxlength="20" name="Password" placeholder="Password" required="" type="password"> <input class="w3-input w3-border w3-register-input" maxlength="20" name="ConfirmPassword" placeholder="Confirm Password" required="" type="password"> <select class="styled-select w3-select w3-border w3-register-input" name="option">
								<option disabled selected value="">
									Choose your faculty
								</option>
								<option value="1">
									Faculty of Architecture, Computing & Humanities
								</option>
								<option value="2">
									Business School
								</option>
								<option value="3">
									Faculty of Education & Health
								</option>
								<option value="4">
									Faculty of Engineering & Science
								</option>
							</select>
						</div><button class="w3-btn w3-padding w3-section" id="register" type="submit"><i class="fa fa-check w3-margin-right-small"></i>Register</button>
					</form>
				</div>
				<div class="w3-half w3-padding-left-small">
					<form action="login.php" method="post">
						<div class="w3-row-padding-top">
							<h3>Existing Account</h3>
							<input class="w3-input w3-border w3-register-input" name="LoginUsername" placeholder="Email Address" required="" type="Email">
							<input class="w3-input w3-border w3-register-input" maxlength="20" name="LoginPassword" placeholder="Password" required="" type="password">
						</div>
						<button class="w3-btn w3-padding w3-section" id="register" type="submit"><i class="fa fa-check w3-margin-right-small"></i>Login</button>
						<a id="forgottenpassword" style="padding-left:10px !important;">Forgotten Password?</a>
						<h4 id="invalidid" style="display:none;padding-top:0px !important;color:red;font-size: 14px;">Invalid Email Address or Password</h4>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-modal" id="modal-logged-in">
		<div class="w3-modal-content w3-animate-top w3-card-8">
			<header class="w3-container w3-blackgrey">
				<h2 class="lefty" id="UserArea">User Area</h2>
				<h2><span class="w3-closebtn2 righty" onclick="closeModals()"><i class="fa fa-close"></i></span></h2>
			</header>
			<div class="w3-container">
				<div class="w3-half w3-row-padding-top-x">
					<div id="avatar" class="w3-center">
						<img src="../images/1.png" width="250px">
					</div>
				</div>
				<div class="w3-half w3-row-padding-bottom">
					<form action="logout.php" class="w3-center w3-padding-xlarge" method="post">
						<label class="w3-label">Username:</label>
						<h5 class="userInfo" id="username"></h3>
						<label class="w3-label">Faculty:</label>
						<h5 class="userInfo" id="faculty"></h3>
						<label class="w3-label">Role:</label>
						<h5 class="userInfo" id="role"></h3>
						<button class="w3-btn w3-padding w3-section" id="changePassword" onclick="">Change Password</button>
						<button class="w3-btn w3-padding w3-section" id="logOut" onclick="">Log Out</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-modal" id="modal-forgotten-password">
		<div class="w3-modal-content w3-animate-top w3-card-8">
			<header class="w3-container w3-blackgrey">
				<h2 class="lefty">Forgotten Password</h2>
				<h2><span class="w3-closebtn2 righty" onclick="closeModals()"><i class="fa fa-close"></i></span></h2>
			</header>
			<div class="w3-container">
				<form action="" class="w3-center w3-padding-xlarge" method="post">
					<input class="w3-input w3-border w3-register-input" name="ForgotUsername" placeholder="Email Address" required="" type="text"> <button class="w3-btn w3-padding w3-section" id="forgotPassword" onclick="">Send New Password</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="w3-center w3-blackgrey w3-padding-16 w3-hover-opacity-off">
		<div class="w3-xlarge w3-section">
			<i class="fa fa-facebook-official w3-hover-text-indigo"></i> <i class="fa fa-instagram w3-hover-text-purple"></i> <i class="fa fa-snapchat w3-hover-text-yellow"></i> <i class="fa fa-pinterest-p w3-hover-text-red"></i> <i class="fa fa-twitter w3-hover-text-light-blue"></i> <i class="fa fa-linkedin w3-hover-text-indigo"></i>
		</div>
		<p>Created by Kung Fu Pandas</p>
	</footer>
	<script src="main.js"></script> 
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script> 
	<script type="text/javascript">
		//database variables
		var FullUsername = <?php echo json_encode($_SESSION["Username"]); ?>;
		var FacultyName = <?php echo json_encode($_SESSION["Faculty"]); ?>;;
		var RoleName = <?php echo json_encode($_SESSION["Role"]); ?>;;
		var UserLoggedIn = <?php echo json_encode($_SESSION["user_logged_in"]); ?>;;
		var FailedPassword = <?php echo json_encode($_SESSION["failed_login"]); ?>;;
		//modals + HTML elements
		var modalLoggedIn = document.getElementById('modal-logged-in');
		var modalLoggedOut = document.getElementById('modal-logged-out');
		var modalForgottenPassword = document.getElementById('modal-forgotten-password');
		var invalidId = document.getElementById('invalidid');
		var avatar = document.getElementById("avatar");

     function jsSuccesfulLogin() {
       if (UserLoggedIn == 1) { // 1 evaluates to true
				 var Username = FullUsername.replace('@greenwich.ac.uk', '');
				 document.getElementById("loginButtonID").textContent = Username;

         $("#loginButton").bind("click", function() {
           modalLoggedOut.style.display='none';
           modalLoggedIn.style.display='block';
         });

				 jsUserArea(Username);
				 jsAvatar();
       }
     }

		function jsLoginLogic() {
			if (FailedPassword == 1) {
				invalidId.style.display='block';
				modalLoggedOut.style.display='block';
			} else {
				jsSuccesfulLogin();
				invalidId.style.display='none';
			}
		}

		function jsUserArea(Username) {
			document.getElementById("UserArea").innerHTML = "Welcome back " + Username.toUpperCase() + "!";
			document.getElementById("username").innerHTML = FullUsername;
			document.getElementById("faculty").innerHTML = FacultyName;
			document.getElementById("role").innerHTML = RoleName;
		}
		
		function jsAvatar() {
			var avatarNo = Math.floor((Math.random() * 10) + 1);
			avatar.innerHTML = "<img src='../images/" + avatarNo + ".png' width='250px'>";
		}
		
     $(document).keyup(function(e) {
	       if (e.keyCode == 27) {
	          console.log("escape pressed");
	          if(modalLoggedIn.style.display == 'block'){
	              modalLoggedIn.style.display = 'none';
	          }
	          else if(modalLoggedOut.style.display == 'block'){
	              modalLoggedOut.style.display = 'none';
								invalidId.style.display = 'none';
	          }
	          else if(modalForgottenPassword.style.display == 'block'){
	              modalForgottenPassword.style.display = 'none';
	          }
	      }
	   });

		 function closeModals() {
			 if(modalLoggedIn.style.display == 'block'){
					 modalLoggedIn.style.display = 'none';
			 }
			 else if(modalLoggedOut.style.display == 'block'){
					 modalLoggedOut.style.display = 'none';
					 invalidId.style.display = 'none';
			 }
			 else if(modalForgottenPassword.style.display == 'block'){
					 modalForgottenPassword.style.display = 'none';
			 }
		 }
		 
     $( "#forgottenpassword" ).click(function() {
        modalForgottenPassword.style.display = "block";
        modalLoggedOut.style.display='none';
	   });
		 
		 jsLoginLogic();
	</script>
</body>
</html>