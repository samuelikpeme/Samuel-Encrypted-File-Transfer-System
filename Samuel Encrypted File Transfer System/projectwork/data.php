<?php
session_start();
if (!($_SESSION['id'])){
    header("location:login.php");
    exit(1);
}

$get=$_POST['input'];
$name=$_SESSION['id'];
$connecting=mysqli_connect("localhost","root","","cryptography");
$getvalue = "SELECT Username FROM user where Username='$get'";
$result=mysqli_query($connecting,$getvalue) or die("failed to query database".mysqli_error());

$row = mysqli_fetch_array($result);

if ($row['Username']==$name){
echo "<p style='color:red'>you can not send message to yourself</p>";
echo "<script> $('#user1').val('');</script>";
exit(1);
 }
if (mysqli_num_rows($result)==0){
echo "<p style='color:red'>Username does not exist</p>";
echo "<script> $('#user1').val('');</script>";
exit(1);
}
else {
	echo "<input type='checkbox' style='background-color:blue !important;color:white !important;' checked disabled>";
}