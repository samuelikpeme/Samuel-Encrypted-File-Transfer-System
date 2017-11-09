<?php
session_start();
if (!($_SESSION['id'])){
    header("location:login.php");
    exit(1);
}
$user=$_SESSION['id'];
date_default_timezone_set('Africa/cairo');
$key=$_POST['b'];
$connecting=mysqli_connect("localhost","root","","cryptography");
$select="select UserID from message where UserID='$key'";
$result1=mysqli_query($connecting,$select);
while($row=mysqli_fetch_array($result1)){
    echo "<input type='hidden'  class='btn btn-primary' id='keyid' value='".$row['UserID']."' />";
    }
mysqli_close($connecting);
?>