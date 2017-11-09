<?php
session_start();
if (!($_SESSION['id'])){
    header("location:login.php");
    exit(1);
}
$user=$_SESSION['id'];
date_default_timezone_set('Africa/cairo');
$key=$_POST['b'];
echo "<input type='hidden' value='$key' id='valve'>";
?>