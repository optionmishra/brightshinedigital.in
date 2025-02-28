<?php 
include_once "connect.php";

$emailTxt = $_POST['emailTxt'];
$passTxt = $_POST['passTxt'];
$bookSeries = $_POST['bookSeries'];
$currentClass = $_POST['currentClass'];
$currentClass++;

$sql = "SELECT * FROM web_user WHERE email='$emailTxt' AND password='$passTxt' AND subject='$bookSeries'";

$query = mysqli_query($link,$sql);
$numrows = mysqli_num_rows($query);
$login_counter = mysqli_num_rows($query);

$studentData = array();

if ($login_counter > 0) {
	$data = mysqli_fetch_array($query);
	$tempBooks = $data["activeBooks"];
	$tempClasses = $data["classes"];
	$classesArray = explode(",",$tempClasses);
	$activeBooksArray = explode(",",$tempBooks);
	$classesLength = count($classesArray);
	$tempBool = false;

	$useActive = $data["active"];
	$useStatus = $data["status"];
	$sessionId = $data["id"];
	$studentData = $data["id"]."|";
	$studentData.= $data["session_start"]."|";
	$studentData.= $data["session_end"];

	if($useStatus == 1){
		if($classesLength == 1){
			$tempBool = true;
			$sqllisy = mysqli_query($link,"UPDATE web_user SET activeBooks='0' WHERE id='$sessionId'");
			print "phpResult=Success|$studentData";
		}else{
			for ($i = 0; $i < $classesLength; $i++) {
				if($classesArray[$i] == $currentClass){
					if($activeBooksArray[$i] == 1){
						$tempBool = true;
						$activeBooksArray[$i] = 0;
						$activeBooks = implode(",",$activeBooksArray);
						$sqllisy = mysqli_query($link,"UPDATE web_user SET activeBooks='$activeBooks' WHERE id='$sessionId'");
						print "phpResult=Success|$studentData";
					}
					break;
				}
			}
			//$sqllisy = mysqli_query($link,"UPDATE web_user SET active='0' WHERE id='$sessionId'");
		}
	}
	if($tempBool == false){
		print "phpResult=Please contact your administrator.";
	}

}else {
	print "phpResult=The login details don't match our records.";
}
?>