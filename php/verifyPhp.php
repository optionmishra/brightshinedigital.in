<?php 

include_once("connect.php");

$studentId = $_POST['studentId'];
$emailId = $_POST['emailId'];
$date = strtotime(date("Y-m-d"));

$sql = "SELECT * FROM web_user WHERE id='$studentId' AND email='$emailId' AND status='1'";

$query = mysqli_query($link,$sql);
$numrpws = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if($numrpws>0)
{
	$expiryDate = strtotime($data["session_end"]);
	if($date<=$expiryDate){
		exit("verifyResult=Success");
	}else{
		exit("verifyResult=Unsuccess");
	}		
}
else{	
	exit("verifyResult=Error");
}
?>