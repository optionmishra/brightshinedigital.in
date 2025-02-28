<?php 
include_once "connect.php";

$emailId = $_POST['emailId'];
$passTxt = $_POST['passTxt'];

$sql = "SELECT * FROM web_user WHERE email='$emailId' AND password='$passTxt'";

$query = mysqli_query($link,$sql);
$login_counter = mysqli_num_rows($query);

$studentData = array();

if ($login_counter > 0) {
	$data = mysqli_fetch_array($query);	
	$useActive = $data["active"];
	$useStatus = $data["status"];
	$sessionId = $data["id"];
	$classes = $data["classes"];
	$studentData = $data["id"]."|";
	$studentData.= $data["fullname"]."|";		
	$studentData.= $data["dob"]."|";
	$studentData.= $data["mobile"]."|";
	$studentData.= $data["session_end"]."|";
	$studentData.= $data["classes"];

	if($useStatus == 1 && $useActive == 1){
		//$sqllisy = mysqli_query($link,"UPDATE web_user SET active='0' WHERE id='$sessionId'");
		print "phpResult=Success|$studentData";
	}else {
		print "phpResult=Please contact your administrator.";
	}
	
	$tempSubject = $data["subject"];
	$tempClass = $data["classes"];
	$tempClassArray = array();
	$tempClassArray = explode(",",$tempClass);
	$length = count($tempClassArray);
	print "&getBooks=Success|$length";
	for ($i = 0; $i < $length; $i++) {
		$subSql = "SELECT * FROM subject WHERE sid='$tempSubject' AND class='$tempClassArray[$i]'";
		$subQuery = mysqli_query($link,$subSql);
		$classRows = mysqli_num_rows($subQuery);
		if ($classRows > 0) {
			while ($tempRow = mysqli_fetch_array($subQuery)) {
				print "|";
				print $tempRow['class']."#";
				print $tempRow['name'];
			}  
		}
	}

}else {
	print "phpResult=The login details don't match our records.";
	//print "phpResult=$sql";
}
?>