<?php
session_start();
if (!($_SESSION['id'])){
    header("location:login.php");
    exit(1);
}
$user=$_SESSION['id'];
 date_default_timezone_set('Africa/cairo');

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-default">
                <div class="container">
                  <div class="navbar-header">
                
                    <h1>CRYPTOGRAPHY SYSTEM</h1>
                </div>
                        
                </div>
              </nav>
              <br>
    <div class='row'>
      <section class='col col-lg-3  col-md-3'>
        <ul class="nav nav-pills nav-stacked">
          <li class="dropdown">
            <a href="#" style='color:white !important' class="dropdown-toggle" data-toggle="dropdown" role="botton">Profile <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php" style='color:black !important'>User Profile</a></li>
              <li><a href="Editprofile.php" style='color:black !important'>Edit User Account</a></li>

            </ul>
          </li>
          <li class="dropdown">
            <a href="#" style='color:white !important' class="dropdown-toggle" data-toggle="dropdown" role="botton">Messages <span class="caret"></span></a>
            <ul class="dropdown-menu">
             <a href="unreadmessages.php" style='color:white !important'> <button id='unreads' type="button" class="btn btn-primary">Unread Messages<span class='badge' id='read'><?php 
              $connecting=mysqli_connect("localhost","root","","cryptography");
              $select="select * from message where TOUSER='$user' AND GETS IS NULL";
              $a=0;
              $result=mysqli_query($connecting,$select);
              while($row=mysqli_fetch_array($result)){
                  $a=$a+1;
              }
              echo $a;
              mysqli_close($connecting);
              ?></span></button></a>
              <a href="readmessage.php" style='color:white !important'><button id='reads' style='color:white !important' type="button" class="btn btn-primary">Read Messages<span class='badge' id='unread'><?php 
              $connecting=mysqli_connect("localhost","root","","cryptography");
              $select="select * from message where TOUSER='$user' AND GETS='YES'";
              $a=0;
              $result=mysqli_query($connecting,$select);
              while($row=mysqli_fetch_array($result)){
                  $a=$a+1;
              }
              echo $a;
              mysqli_close($connecting);
              ?></span></button></a>

            </ul>
          </li>
          <li><a href="dashboard.php" style='color:white !important'>Send</a></li>
          <li><a href="logout.php" style='color:white !important'>Logout</a></li>
        </ul>
      </section>
      <div class='col col-lg-9 col-md-9'>
        <article class='col col-lg-12'>
          <div class="col-md-8 col-lg-12" id='long'>                     
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Profile</h3>
                            </div>
                            <div class="panel-body">
                              <?php 
              $connecting=mysqli_connect("localhost","root","","cryptography");
              $select="select * from registration where username='$user'";
              $a=0;
              $result=mysqli_query($connecting,$select);
              while($row=mysqli_fetch_array($result)){
                  echo "<h3><span class='glyphicon glyphicon-login'></span>User Profile</h3>
          ";
           echo "<form>
            <hr>
            <div class='form-group'>
              <label class='col-sm-5 control-label'>First Name:</label>
              <div class='col-sm-7'>
                <input name='firstname' type='text' value='".$row['First_Name']."' class='form-control' disabled>
              </div>
            </div>";
            echo "<div class='form-group'>
              <label class='col-sm-5 control-label'>Last Name:</label>
              <div class='col-sm-7'>
                <input type='text' value='".$row['Last_Name']."' class='form-control' disabled>
              </div>
            </div>";
            echo "<div class='form-group'>
              <label class='col-sm-5 control-label'>Gender:</label>
              <div class='col-sm-7'>
                <input type='text' value='".$row['Gender']."' class='form-control' disabled>
              </div>
            </div>";
            echo "<div class='form-group'>
              <label class='col-sm-5 control-label'>Mobile Number:</label>
              <div class='col-sm-7'>
                <input type='text' value='".$row['phone']."' class='form-control' disabled>
              </div>
            </div>";
            echo "<div class='form-group'>
              <label class='col-sm-5 control-label'>Username:</label>
              <div class='col-sm-7'>
                <input type='text' value='".$row['username']."' class='form-control' disabled>
              </div>
            </div>";
            echo "<div class='form-group'>
              <label class='col-sm-5 control-label'>Email:</label>
              <div class='col-sm-7'>
                <input type='text' value='".$row['email']."' class='form-control' disabled>
              </div>
            </div>";





            echo "</form>";
              }
              mysqli_close($connecting);
              ?>
                                  </div>
                                </div>

                            </div>
                          </div>
                          </div>
        </article>
      </div>
    </div>
    </div>
 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/respond.js"></script>
    <script type="text/javascript" src="js/dashboard.js"></script>

  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript">
    
    // to destroy after some minutes of inactivity
    $(function(){

      function timeChecker(){
                setInterval(function(){
                 
                 var storedTimeStamp = sessionStorage.getItem("lastTimeStamp"); 
                 timeCompare(storedTimeStamp);
                },3000);
      }

      function timeCompare(timeString){
        var currentTime= new Date();
        var pastTime = new Date(timeString);
        var timeDiff= currentTime - pastTime;
        var minPast = Math.floor((timeDiff/60000));
        if (minPast > 0) // when inactive for 1 minute
        {
          sessionStorage.removeItem("lastTimeStamp");
          window.location="logout.php";
          return false;
        }
        else {
          console.log(minPast);
        }
      }

      $(document).mousemove(function(){
        var timeStamp= new Date();
        sessionStorage.setItem("lastTimeStamp",timeStamp);
      });

      timeChecker();
    });
  </script>

</body>
</html>
