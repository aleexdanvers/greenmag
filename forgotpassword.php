<?php
    session_start();
    include 'includes/dbConnection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Greenmag</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://www.w3schools.com/lib/w3-theme-blue.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/form-elements.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
      body { 
        background-color:#222;
      }
    </style>
</head>
<body>
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Welcome to <strong>Greenmag</strong></h1>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-sm-3">
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-box">
                            <div class="form-top">
                                    <h3 style="text-align: center;color: white;">Forgotten Password</h3>
                                    <p style="text-align: center;color: white;">Enter email address:</p>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form action="forgottenPassword.php" class="login-form" method="post" role="form">
                                    <div class="form-group">
                                        <input class="form-email form-control" id="forgot-email" name="forgot-email" placeholder="Email Address..." required="" type="text">
                                    </div>
                                    <button class="btn" type="submit">Reset Password</button>
                                </form>
                                <h4 id="ForgottenPasswordFailed" style="display:none;padding-top:5px !important;color:#ff3333;font-size: 14px;"><i aria-hidden="true" class="fa fa-times"></i> Username was not found!</h4>
                                <h4 id="successfullPasswordChange" style="display:none;padding-top:5px !important;color:#2eb82e;font-size: 13px;"><i aria-hidden="true" class="fa fa-check"></i> Congratulations, you successfully reset your password!</h4>
                                <br><a style="color:white;" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-1.11.1.min.js">
    </script>
    <script type="text/javascript">
    
    if ($(window).width() <= 600) {
      $('#footer').css('position','relative');
    }
    
    $(window).resize(function() {
      if ($(window).width() <= 600) {
        $('#footer').css('position','relative');
      } else {
        $('#footer').css('position','fixed');
      }
    });

    var ForgottenPasswordFailed = <?php echo json_encode($_SESSION["ForgottenPasswordFailed"]); ?>;
    var ForgottenPasswordComplete = <?php echo json_encode($_SESSION["ForgottenPasswordComplete"]); ?>;

    if(ForgottenPasswordFailed == true){
        document.getElementById("ForgottenPasswordFailed").style.display  = "block";
    }
    else if(ForgottenPasswordComplete == true
        ){
        document.getElementById("successfullPasswordChange").style.display  = "block";
    }


    </script>
</body>
</html>