<?php
session_start();
if (!($_SESSION['id'])){
    header("location:login.php");
    exit(1);
}

function decRSA($e){

$data[0]=1;
   for ($a=0;$a<=103;$a++){
     $rest[$a]=pow($e,1)%143;
     if($data[$a] > 143){
     	$data[$a+1]=$data[$a]*$rest[$a]%143;
     }
     else{
     	$data[$a+1]=$data[$a]*$rest[$a];
     }
   }
$get=$data[103]%143;
return $get;
}


$user=$_SESSION['id'];
date_default_timezone_set('Africa/cairo');
$id=$_POST['c'];
$key=$_POST['b'];
$connecting=mysqli_connect("localhost","root","","cryptography");
$select="select * from message where UserID='$id' AND enterKey='$key'";
$result1=mysqli_query($connecting,$select);
while($row=mysqli_fetch_array($result1)){
	$getmsgs=mysql_real_escape_string($row['Message']);

	$c=strlen($getmsgs);

	$getmsg="";
for ($a=0;$a<$c;$a++){
	$m=ord($getmsgs[$a]);
	if ($m<=127){
		$getmsg.=chr(decRSA($m));
	}
	else{
		$getmsg.=$getmsgs[$a];

	}
}


      

	echo "<p style='color:red!important'> Date sent:".$row['Messaging']."</p>";
	echo "<p style='color:red!important'> From:".$row['Username']."</p>";
    echo "<p>".$getmsg."</p>";
}
mysqli_close($connecting);
?>