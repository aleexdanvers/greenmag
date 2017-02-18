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
	<link rel="icon" href="../images/1487474779_Google.png">
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
				<a class="w3-hover-red" id="loginButton" onclick="openModal()"><i class="fa fa-user w3-margin-right-small"></i> <span class="loginClass" id="loginButtonID">Sign In</span></a>
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
					<a class="mobileSignIn" id="loginButton_mobile" onclick="openModal()"><span class="loginClass" id="loginButtonID_mobile">Sign In</span></a>
				</li>
			</ul>
		</div>
	</div><!-- First Parallax Image with Logo Text -->
	<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
		<div class="w3-display-middle w3-display-middle2" style="white-space:nowrap;">
			<span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity homepage-text">GREENMAG</span>
		</div>
	</div><!-- Container (About Section) -->
	<div style="text-align:justify !important;" class="w3-content w3-container w3-padding-64" id="about">
		<h3 class="w3-center">ABOUT</h3>
		<p class="w3-center"><em>Welcome to Greenmag at the University of Greenwich!</em></p>
		<p class="w3-padding-8">This is a secure web-based system for collecting student contributions for the annual “Greenmag” university magazine. This system is dedicated for the four faculties of the university: Faculty of Architecture, Computing and Humanities, Business School, Faculty of Education and Health, Faculty of Engineering and Science. All students across these faculties are encouraged to write and upload articles for our annual university magazine.</p>

		<p class="w3-padding-8">If you are a student, you should first register with your credentials so that you can login into the system. Once you register and login, you can submit one or more articles and accompanying images. Before any submission, you must agree to our <span style="font-style: italic;">Terms and Conditions</span>. You may update your submissions at any point up until the closure date. As a student, you will also have a faculty based Marketing Coordinator who will manage your faculties submissions. The Marketing Coordinator will read, edit and publish your articles to the system. There is also a general Marketing Manager who will oversee the whole process and choose the articles that will be published in the magazine.</p>

		<p class="w3-padding-8">If you are a guest, you can login within each Faculty to see the articles and the statistics about the annual submissions.</p><br><br>
 

		<div class="w3-center"><img src="../images/1487474772_Google.png" width="150px"></div>
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
					<form action="register.php" target="_blank">
						<div class="w3-row-padding-top">
							<h3>New Account</h3><input class="w3-input w3-border w3-register-input" name="RegisterUsername" placeholder="Email Address" required="" type="Email">
							<input class="w3-input w3-border w3-register-input" id="password" maxlength="20" name="RegisterPassword" placeholder="Password" required="" type="password">
							<input class="w3-input w3-border w3-register-input" id="confirm_password" maxlength="20" name="ConfirmPassword" placeholder="Confirm Password" required="" type="password">
							<select class="styled-select w3-select w3-border w3-register-input" name="option">
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
							<input class="w3-input w3-border w3-register-input" name="LoginUsername" id="LoginUsername" placeholder="Email Address" required="" type="Email">
							<input class="w3-input w3-border w3-register-input" maxlength="20" id="LoginPassword" name="LoginPassword" placeholder="Password" required="" type="password">
						</div>
						<button class="w3-btn w3-padding w3-section" id="login" onclick="loginError()" type="submit"><i class="fa fa-check w3-margin-right-small"></i>Login</button>
						<a id="forgottenpassword" style="padding-left:10px !important;">Forgotten Password?</a>
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
				<form action="forgottenPassword.php" class="w3-padding-xlarge" method="post"><br>
					<input id="forgottenPasswordInput" class="w3-input w3-border w3-register-input" name="ForgotUsername" placeholder="Email Address" required="" type="Email">
					<button class="w3-btn w3-padding w3-section" id="forgotButton" onclick="forgottenPasswordError()">Send New Password</button>
					<h4 id="validEmail" style="display:none;padding-top:0px !important;color:#2eb82e;font-size: 16px;"><i class="fa fa-check" aria-hidden="true"></i> A new password was sent to </h4>
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
		var FailedPasswordAttempt = <?php echo json_encode($_SESSION["old_password_attempt"]); ?>;;
		var FailedUsernameAttempt = <?php echo json_encode($_SESSION["old_username_attempt"]); ?>;;
		var ForgottenPasswordComplete = <?php echo json_encode($_SESSION["ForgottenPasswordComplete"]); ?>;;
		var ForgottenPasswordFailed = <?php echo json_encode($_SESSION["ForgottenPasswordFailed"]); ?>;;
		var ForgottenPasswordEmail = <?php echo json_encode($_SESSION["ForgottenPasswordEmail"]); ?>;;

		//modals + HTML elements
		var modalLoggedIn = document.getElementById('modal-logged-in');
		var modalLoggedOut = document.getElementById('modal-logged-out');
		var modalForgottenPassword = document.getElementById('modal-forgotten-password');
		var avatar = document.getElementById("avatar");
		var validEmail = document.getElementById("validEmail");
		var forgottenPasswordInput = document.getElementById("forgottenPasswordInput");
		var password = document.getElementById("password")
		var confirm_password = document.getElementById("confirm_password");
		var loginPassword = document.getElementById("LoginPassword");
		var loginUsername = document.getElementById("LoginUsername");
		var loginButton = document.getElementById("login");
		var forgotUsername = document.getElementById("forgottenPasswordInput");
		var forgotButton = document.getElementById("forgotButton");



     function jsSuccesfulLogin() {
       if (UserLoggedIn == 1) { // 1 evaluates to true
				 var Username = FullUsername.replace('@greenwich.ac.uk', '');
				 document.getElementById("loginButtonID").textContent = Username;
				 document.getElementById("loginButtonID_mobile").textContent = Username;

         $("#loginButton").bind("click", function() {
           modalLoggedOut.style.display='none';
           modalLoggedIn.style.display='block';
         });
         $("#loginButton_mobile").bind("click", function() {
           modalLoggedOut.style.display='none';
           modalLoggedIn.style.display='block';
         });

				 jsUserArea(Username);
				 jsAvatar();
       }
     }

		function jsLoginLogic() {
			if (FailedPassword == 1) {
				modalLoggedOut.style.display='block';
				loginPassword.value = FailedPasswordAttempt;
				loginUsername.value = FailedUsernameAttempt;
				loginButton.click();
			}
			else if (ForgottenPasswordComplete == 1){
				validEmail.style.display='block';
				forgotUsername.value = ForgottenPasswordEmail;
				validEmail.innerHTML += ForgottenPasswordEmail;
				modalForgottenPassword.style.display='block';
			}
			else if (ForgottenPasswordFailed == 1){
				modalForgottenPassword.style.display='block';
				forgotUsername.value = ForgottenPasswordEmail;
				document.getElementById("forgotButton").click();
			}
			else {
				jsSuccesfulLogin();
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
	          closeModals();
	      }
	   });

		 function openModal() {
			 document.getElementById('modal-logged-out').style.display='block';
		 }

	function closeModals() {
		if(modalLoggedIn.style.display == 'block'){
			 modalLoggedIn.style.display = 'none';
		}
		else if(modalLoggedOut.style.display == 'block'){
			 modalLoggedOut.style.display = 'none';
		}
		else if(modalForgottenPassword.style.display == 'block'){
			 modalForgottenPassword.style.display = 'none';
			 validEmail.style.display='none';

		}
	}

	function validatePassword(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Passwords Don't Match");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}

	function loginError(){
		if(loginPassword.value == FailedPasswordAttempt){
			loginPassword.setCustomValidity("Invalid Password");
		}
		else{
			loginPassword.setCustomValidity('');
		}
	}

	function forgottenPasswordError(){
		if(forgotUsername.value == ForgottenPasswordEmail){
			forgotUsername.setCustomValidity("Username not found");
		}
		else{
			forgotUsername.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;

     $( "#forgottenpassword" ).click(function() {
        modalForgottenPassword.style.display = "block";
        modalLoggedOut.style.display='none';
	   });
		 
		 jsLoginLogic();
	</script>
</body>
</html>