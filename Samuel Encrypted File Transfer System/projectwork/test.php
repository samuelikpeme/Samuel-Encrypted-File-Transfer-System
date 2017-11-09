<?php
$name="Harmony is a very good and bad girl, uche can gossip for africa jareh";
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
// decrption part;
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


$lengthofmsg=strlen($name);
$enc="";
for ($a=0;$a<$lengthofmsg;$a++){
	$m=ord($name[$a]);
	if ($m<=127){
		$enc.=chr(encRSA($m));
	}
	else{
		$enc.=$name[$a];

	}
}


$b=strlen($enc);
$getmsg="";
for ($a=0;$a<$b;$a++){
	$m=ord($enc[$a]);
	if ($m<=127){
		$getmsg.=chr(decRSA($m));
	}
	else{
		$getmsg.=$enc[$a];

	}
}
echo "<p style='color:black'>      ".$enc."</p>";

echo "<p style='color:red'> it has been decrypted to:".$getmsg."</p>";






?>



