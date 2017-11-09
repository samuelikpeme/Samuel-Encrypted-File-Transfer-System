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
<title>dashboard</title>

    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
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
              <li><a href="profile.php" style='color:white !important'>User Profile</a></li>
              <li><a href="Editprofile.php" style='color:white !important'>Edit User Account</a></li>
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
          <div class="col-md-8 col-lg-12" id='long'>                     
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">UnRead Messages</h3>
                            </div>
                            <div class="panel-body">
                              <?php 
              $connecting=mysqli_connect("localhost","root","","cryptography");
              $select="select * from message where TOUSER='$user' AND GETS IS NULL";
              $a=0;
              $result=mysqli_query($connecting,$select);
              while($row=mysqli_fetch_array($result)){
                  echo "<p>Message from <input type='submit'type='button' class='btn btn-primary' value='".$row['Username']."'  /><button class='btn btn-primary mess' id='".$row['UserID']."' class='viewing' data-toggle='modal' data-target='#popup' >View Message</button><button class='btn btn-primary key' id='".$row['UserID']."' data-toggle='modal' data-target='#popup2' >GetKEY</button></p>";
              }
              mysqli_close($connecting);
              ?>
     <div class="modal fade" id="popup" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:blue">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style='color:white'>MESSAGE</h4>
        </div>
        <div class="modal-body" style="background-color:white">
          <input type='text' id='key' placeholder='enter descryption key' /><input type='submit' type='button' class='btn btn-primary' id='open' value='GetMessage'>
          <div id='messagepart1'>
          </div>
          <div id='messagepart'>
          </div>
        </div>
        <div class="modal-footer" style="background-color:blue">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
    
 <div class="modal fade" id="popup2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:blue">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style='color:white'>DECRYPTION KEY</h4>
        </div>
        <div class="modal-body" id='showkey' style="background-color:white">
          <label>enter security password: </label>
           <input type='password' name='sec' id='sec'/>
          <input type='submit' name='secsubmit' id='secsubmit'  value='GetKey'/>
          <div id='collect'>
          </div>
        </div>
        <div class="modal-footer" style="background-color:blue">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
                                  </div>
                                </div>

                            </div>
                          </div>
                          </div>
                              </div>
    
  
      <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
  
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
