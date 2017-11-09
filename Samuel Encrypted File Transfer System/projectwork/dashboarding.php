<?php
session_start();
$_SESSION['lasttime']=time();
if (!($_SESSION['id'])){
    header("location:login.php");
    exit(1);
}
$user=$_SESSION['id'];
 date_default_timezone_set('Africa/cairo');

$receiver= $_POST['user1'];
                            $date=$_POST['date'];
                            $text=$_POST['texts'];
                            $photo=$_POST['photo1'];
                            $key=$_POST['key'];
                            $key=sha1($key);
                            echo $receiver;
                            echo $date;
                            echo $text;
                            $connecting=mysqli_connect("localhost","root","","cryptography");
                            
                         $insert="INSERT INTO message(Username,Message,Messaging,TOUSER,photo,enterkey) VALUES ('$user','$text','$date','$receiver','$photo','$key')";    
                         mysqli_query($connecting,$insert) or die("failed to query database".mysqli_error());
                        if (mysqli_query($connecting,$insert)){
                            echo "<p style='color:green'>Message successfully sent</p>";
                            header('location:dashboard.php');
                        }
                        else{
                            echo "<p style='color:red'>An error has occurred</p>";
                        }



?>