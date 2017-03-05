<?php 
  session_start();

  include 'includes/dbConnection.php';
  if($_SESSION["user_logged_in"] == false){
    header('Location: logout.php');
  }
  $pageviewquery  = "SELECT * FROM PagesViewed WHERE PageName = 'Statistics Page';";
  $resultpageview = mysqli_query($con, $pageviewquery);
  $rowpageview = mysqli_fetch_array($resultpageview, MYSQLI_ASSOC);
  $NewPageViews = $rowpageview['Views'] + 1;
  $updatePageViewQuery = "UPDATE PagesViewed SET Views = " . $NewPageViews . " WHERE PageName = 'Statistics Page';";
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
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
      <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white navHover" id="marketingNav" href="marketingmanager.php" title="Marketing Manager"><i class="fa fa-briefcase"></i><p class="navbarText" id="marketingText">Marketing Manager</p></a>
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
      </div><!-- Middle Column -->
      <div class="w3-col m8">
        <div id="uploadArticlesBox" class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card-2 w3-round w3-333">
              <div class="w3-container w3-padding">
                <h4 class="">Statistics</h4>
                <table class="w3-table">
                  <tr valign="middle">
                    <th>Faculty</th>
                    <th style="text-align: center;">2015 Uploads</th>
                    <th style="text-align: center;">2015 Approvals</th>
                    <th style="text-align: center;">2016 Uploads</th>
                    <th style="text-align: center;">2016 Approvals</th>
                  </tr>
                  <tr valign="middle">
                    <td>Architecture, Computing & Humanities</td>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: center;">2</td>
                    <td style="text-align: center;">4</td>
                    <td style="text-align: center;">1</td>
                  </tr>
                  <tr valign="middle">
                    <td>Business School</td>
                    <td style="text-align: center;">7</td>
                    <td style="text-align: center;">4</td>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: center;">2</td>
                  </tr>
                  <tr valign="middle">
                    <td>Education & Health</td>
                    <td style="text-align: center;">8</td>
                    <td style="text-align: center;">3</td>
                    <td style="text-align: center;">7</td>
                    <td style="text-align: center;">3</td>
                  </tr>
                  <tr valign="middle">
                    <td>Engineering & Science</td>
                    <td style="text-align: center;">9</td>
                    <td style="text-align: center;">3</td>
                    <td style="text-align: center;">6</td>
                    <td style="text-align: center;">4</td>
                  </tr>
                </table>
                <p><i class="fa fa-question-circle" aria-hidden="true" style="padding-right: 4px;padding-left: 2px;"></i> Number of contributions within each Faculty for each academic year</p><br>

                <p><i class="fa fa-question-circle" aria-hidden="true" style="padding-right: 4px;padding-left: 2px;"></i> Percentage of contributions by each Faculty for any academic year</p><br>
                <div id="piechart" style="width: 50%; height: 300px;"></div>
                <div id="piechart2" style="width: 50%; height: 300px;"></div>
                <script type="text/javascript">
                     google.charts.load('current', {'packages':['corechart']});
                     google.charts.setOnLoadCallback(drawChart);

                     function drawChart() {

                       var data = google.visualization.arrayToDataTable([
                         ['Task', 'Hours per Day'],
                         ['FACH',     11],
                         ['Business',      4],
                         ['Engineering',      4],
                         ['Education',  7]
                       ]);

                       var data2 = google.visualization.arrayToDataTable([
                         ['Task', 'Hours per Day'],
                         ['FACH',     11],
                         ['Business',      4],
                         ['Engineering',      4],
                         ['Education',  7]
                       ]);

                        var options = {
                           slices: [{color: '#444444'}, {color: '#ff4d4d'}, {color: '#444444'}, {color: '#ff4d4d'}],
                           legend: {position: 'none'},
                           backgroundColor: 'transparent',};

                       var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                       var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

                       chart.draw(data, options);
                       chart2.draw(data2, options);
                     }
                </script>
                <table class="w3-table">
                  <tr valign="middle">
                    <th>Faculty</th>
                    <th style="text-align: center;">2015 Contributors</th>
                    <th style="text-align: center;">2016 Contributors</th>
                  </tr>
                  <tr valign="middle">
                    <td>Architecture, Computing & Humanities</td>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: center;">2</td>
                  </tr>
                  <tr valign="middle">
                    <td>Business School</td>
                    <td style="text-align: center;">7</td>
                    <td style="text-align: center;">4</td>
                  </tr>
                  <tr valign="middle">
                    <td>Education & Health</td>
                    <td style="text-align: center;">8</td>
                    <td style="text-align: center;">3</td>
                  </tr>
                  <tr valign="middle">
                    <td>Engineering & Science</td>
                    <td style="text-align: center;">9</td>
                    <td style="text-align: center;">3</td>
                  </tr>
                </table>
                <p><i class="fa fa-question-circle" aria-hidden="true" style="padding-right: 4px;padding-left: 2px;"></i> Number of contributors within each Faculty for each academic year</p><br>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Middle Column -->
      <!-- Right Column -->
      <div class="w3-col m4">
        <div id="uploadArticlesBox" class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card-2 w3-round w3-333">
              <div class="w3-container w3-padding">
              <h4 class="">Most Active Users</h4>
                <ul class="skill-list">
                <?php
                 $mostactiveuser  = "SELECT User.Username, User.LogInQuantity FROM User ORDER BY LogInQuantity DESC LIMIT 4;";
                 $result = mysqli_query($con, $mostactiveuser);
                 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                 $highest = $row['LogInQuantity'];

                $mostactiveusers  = "SELECT User.Username, User.LogInQuantity FROM User ORDER BY LogInQuantity DESC LIMIT 4;";
                 $results = mysqli_query($con, $mostactiveusers); 

                 while($row2 = mysqli_fetch_array($results)){
                  $percentage = round((($row2['LogInQuantity']/$highest)*100),2);
                  echo "<li class='skill'><h3>" . trim($row2['Username'],"@greenwich.ac.uk") . " - " . $row2['LogInQuantity'] . "</h3>";
                  echo "<progress class='skill-3' max='100' value='" . $percentage . "'></progress></li>";
                 }


                ?>
                </ul>
                <p><i class="fa fa-question-circle" aria-hidden="true" style="padding-right: 4px;padding-left: 2px;"></i> Number of successful logins to the system by a single user</p>
              </div>
            </div><br>
            <div class="w3-card-2 w3-round w3-333">
              <div class="w3-container w3-padding">
              <h4 class="">Browsers Used</h4>
              <ul class="list">
              <?php
                $browserquery = "SELECT * FROM Browsers ORDER BY Used DESC, BrowserName ASC;";
                $result3 = mysqli_query($con, $browserquery);

                while($row3 = mysqli_fetch_array($result3)){
                if($row3['Used'] == 1){
                echo "<li class='list-item is-checked'>";
                }
                else{
                echo "<li class='list-item'>";
                }
                echo "<div class='list-item-check'><i class='icon ion-checkmark-round'></i></div><div class='list-item-title'><span class='list-item-title-strikethrough'></span><b style='font-weight:normal !important;' id='Browser" . $row3['BrowserName'] . "'>" . $row3['BrowserName'] . "</b></div></li>";
                }

                 ?>
                
              </ul>
              <p><i class="fa fa-question-circle" aria-hidden="true" style="padding-right: 4px;padding-left: 2px;"></i> Shows the various browsers that have been used by users</p>
              </div>
            </div><br>
            <div class="w3-card-2 w3-round w3-333">
              <div class="w3-container w3-padding">
              <h4 class="">Most Visited Pages</h4>
                <ul class="skill-list">
                <?php
                 $pageviewsquery  = "SELECT * FROM PagesViewed ORDER BY Views DESC LIMIT 4;";
                 $result6 = mysqli_query($con, $pageviewsquery);
                 $row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC);
                 $highest2 = $row6['Views'];

                $pageviewsquerys  = "SELECT * FROM PagesViewed ORDER BY Views DESC LIMIT 4;";
                 $result7 = mysqli_query($con, $pageviewsquerys); 

                 while($row7 = mysqli_fetch_array($result7)){
                  $percentage2 = round((($row7['Views']/$highest2)*100),2);
                  echo "<li class='skill'><h3>" . $row7['PageName'] . " - " . $row7['Views'] . "</h3>";
                  echo "<progress class='skill-3' max='100' value='" . $percentage2 . "'></progress></li>";
                 }


                ?>
                </ul>
                <p><i class="fa fa-question-circle" aria-hidden="true" style="padding-right: 4px;padding-left: 2px;"></i> Number of views on a specific page by users</p>
              </div>
            </div>
          </div>
        </div><!-- End Right Column -->
      </div><!-- End Grid -->
    </div><!-- End Page Container -->
  </div><br>
  <script>
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

  $("#marketingText").hide();
  $("#marketingNav").mouseenter(function(){
      $("#marketingText").show('slow');
  });
  $("#marketingNav").mouseleave(function(){
      $("#marketingText").hide('slow');
  });
  // END Navbar Animations END //

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
    $('#piechart').removeClass('floatDaPies-left');
    $('#piechart2').removeClass('floatDaPies-right');
    $('#piechart').addClass('marginDaPies');
    $('#piechart2').addClass('marginDaPies');
  } else {
    $('#piechart').addClass('floatDaPies-left');
    $('#piechart2').addClass('floatDaPies-right');
    $('#piechart').removeClass('marginDaPies');
    $('#piechart2').removeClass('marginDaPies');
  }

  $(window).resize(function() {
    location.reload();
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
      $('#piechart').removeClass('floatDaPies-left');
      $('#piechart2').removeClass('floatDaPies-right');
      $('#piechart').addClass('marginDaPies');
      $('#piechart2').addClass('marginDaPies');
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
      $('#piechart').addClass('floatDaPies-left');
      $('#piechart2').addClass('floatDaPies-right');
      $('#piechart').removeClass('marginDaPies');
      $('#piechart2').removeClass('marginDaPies');
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

    function myFunction() { 
     if(navigator.userAgent.indexOf("Opera") != -1 || navigator.userAgent.indexOf('OPR') != -1 ) 
    {
        document.getElementById("BrowserOpera").innerHTML += " (Current)";
    }
    else if(navigator.userAgent.indexOf("Chrome") != -1 )
    {
        document.getElementById("BrowserChrome").innerHTML += " (Current)";
    }
    else if(navigator.userAgent.indexOf("Safari") != -1)
    {
        document.getElementById("BrowserSafari").innerHTML += " (Current)";
    }
    else if(navigator.userAgent.indexOf("Firefox") != -1 ) 
    {
         document.getElementById("BrowserFirefox").innerHTML += " (Current)";
    }
    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
    {
      document.getElementById("BrowserIE").innerHTML += " (Current)"; 
    }
    }

    myFunction();
  </script>
</body>
</html>