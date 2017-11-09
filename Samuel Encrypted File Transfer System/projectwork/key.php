<?php
session_start();
if (!($_SESSION['id'])){
    header("location:login.php");
    exit(1);
}
$user=$_SESSION['id'];
date_default_timezone_set('Africa/cairo');
$key=$_POST['c'];
$pass=$_POST['b'];
$pass=sha1($pass);
$connecting=mysqli_connect("localhost","root","","cryptography");
$select1="select security from registration where username='$user' AND security='$pass'";
$result2=mysqli_query($connecting,$select1);
if (mysqli_num_rows($result2) > 0){
$select="select enterkey from message where UserID='$key'";

$result1=mysqli_query($connecting,$select);
while($row=mysqli_fetch_array($result1)){
    $keys=$row['enterkey'];
    $value=$keys;
}
$select="select * from message where enterkey='$keys' and UserID='$key'";
$result=mysqli_query($connecting,$select);
while($row=mysqli_fetch_array($result)){
    echo "<p style='color:red'>Dear ".$row['TOUSER'].",</p>";
    echo "<p style='color:red'>The Descryption key to the message sent to you by ".$row['Username']." on ".$row['Messaging']." is ".$value."</p>";
   }
}
else{
    echo "<p style='color:red'>password not correct</p>";

}
   mysqli_close($connecting);
   ?>