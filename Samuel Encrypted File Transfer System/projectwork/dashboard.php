<?php
session_start();
$_SESSION['lasttime']=time();

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
              <li><a href="profile.php" style='color:black !important'><button id='User Profile' type="button" class="btn btn-primary">User Profile</button></a></li>
              <li><a href="Editprofile.php" style='color:black !important'><button id='Edit User Account' type="button" class="btn btn-primary">Edit User Account</button></a></li>

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
          <li><a href="logout.php" style='color:white !important'>Logout</a></li>
        </ul>
      </section>
      <div class='col col-lg-9 col-md-9'>
        <article class='col col-lg-12'>
          <div class="col-md-8 col-lg-12" id='long'>                     
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Message</h3>
                            </div>
                            <div class="panel-body">
                              <form method='post' action='dashboard.php'>
                                <div class="form-group">
                                <div class='form-group'>
                                  <div class='col col-md-4'><input class='form-control' type='text' placeholder='enter username for receiver' name='user1' id='user1' required>
                                  </div>
                                 <div class='col col-md-4'><input class='form-control' type='text' placeholder='enter decryption key' name='key' id='key' required>
                                  </div> 
                                   <br>
                                   <div class='form-group'>
                                   <div class='col col-md-4' id='erroruser'>
                                   </div>
                                   </div>
                                   <br>
                                  <textarea style='width:97%;height:200px;resize:none;'class="form-control" placeholder="Type here" name='texts'></textarea>
                                </div>
                                </div>
                                <div class="pull-right">
                                <?php
                                echo "<input type='hidden' name='date' value='".date('y-m-d H:i:s')."'>"; ?>
                                  <div class="btn-group" id='elects'>
                                      <label id='label' for='file'>Add File</label> <input type='file'id='file' name='file'>
                                      <div id='uploaded'>
                                        <input type='hidden' value='g' name='photo1' id='photo1' >
                                      </div>
                                    <input type="submit" name='submit' value='send' class="btn btn-primary">
                                  </div>
                                </div>
                                <?php
                          if (isset($_POST['user1']) && $_POST['user1']!=""){

                            function encRSA($m){ // function to perform encryption
                            $data[0]=1;
                            for ($a=0;$a<=7;$a++){
                            $rest[$a]=pow($m,1)%143;
                            if($data[$a] > 143){
                               $data[$a+1]=$data[$a]*$rest[$a]%143;
                            }
                             else{
                               $data[$a+1]=$data[$a]*$rest[$a];
                             }
                            }

                            $get=$data[7]%143;
                            return $get;

                            }

                          
                            $receiver= $_POST['user1'];
                            $date=$_POST['date'];
                            $text=$_POST['texts'];
                            $photo=$_POST['photo1'];
                            $key=$_POST['key'];
                            $key=sha1($key);

                            $textencrypt=strlen($text); 
                            

                            $enc="";
                            for ($a=0;$a<$textencrypt;$a++){
                             $m=ord($text[$a]);
                              if ($m<=127){
                              $enc.=chr(encRSA($m));
                              }
                               else{
                               $enc.=$text[$a];

                                   }
                              }

                          $enc=mysql_real_escape_string($enc);


                            $connecting=mysqli_connect("localhost","root","","cryptography");
                            
                         $insert="INSERT INTO message(Username,Message,Messaging,TOUSER,photo,enterkey) VALUES ('$user','$enc','$date','$receiver','$photo','$key')";    
                         mysqli_query($connecting,$insert) or die("failed to query database".mysqli_error());
                        
                            echo "<p style='color:green'>Message successfully sent</p>";
                          }

                          ?>
                              </form>
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
