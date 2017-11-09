<?php
 $conn=mysqli_connect('localhost','root','','cryptography');
 if (!($conn)){
 	die('could not connect to database, an error occured'.mysqli_error());
 }
  $first=$_POST['firstname'];
  $last=$_POST['lastname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $username=$_POST['username'];
  $phone=$_POST['phone'];
  $security=$_POST['security'];

 // encrpting the password not to be seen by database intruders
  $password=sha1($password);
  $security=sha1($security);

  // getting username from database table
  $getuser="SELECT username FROM registration WHERE username='$username'";

  // getting email from the database table
  $getemail="SELECT email FROM registration WHERE email='$email'";
  $query1=mysqli_query($conn,$getuser);

  $query2=mysqli_query($conn,$getemail);

  if (mysqli_num_rows($query1)>0){
      header("location:signup.php?error=username");
      exit(1);
  }
   if (mysqli_num_rows($query2) > 0){
   	  header("location:signup.php?error=email");
      exit(1);
   }

   $insert="INSERT INTO registration(first_name,last_name,password,gender,phone,username,email,security) VALUES ('$first','$last','$password','$gender','$phone','$username','$email','$security') ";
   $insertlogin="INSERT INTO user(username,password) VALUES ('$username','$password')";
  mysqli_query($conn,$insertlogin) or die('error querying database'.mysqli_error());

   mysqli_query($conn,$insert) or die('error querying database'.mysqli_error());
   header("location:signup.php?error=success");
      exit(1);


?>