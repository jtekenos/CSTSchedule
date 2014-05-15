<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');

	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Sanitize the POST values
$event = mysqli_real_escape_string($con, $_POST['addEventName']);
$prof = mysqli_real_escape_string($con, $_POST['addProfName']);
$location = mysqli_real_escape_string($con, $_POST['addLocation']);
$eventType = mysqli_real_escape_string($con, $_POST['eventType']);
$set = mysqli_real_escape_string($con, $_POST['selSet']);
$level = mysqli_real_escape_string($con, $_POST['selLevel']);
$startTime = mysqli_real_escape_string($con, $_POST['selStartTime']);
$endTime = mysqli_real_escape_string($con, $_POST['selEndTime']);
$date = mysqli_real_escape_string($con, $_POST['date']);

	$levelSet = $level . $set;
	$tBlocks = "2";
	//Create INSERT query
	$sql="INSERT INTO schdule1 (eventname, location, timefrom, timeto, instructor, comments, level_id, timeBlocks, event_date)
	VALUES ('$event','$location','$startTime','$endTime','$prof','$eventType', '$levelSet', $tBlocks', '$date')";
		
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: CSTScheduleDenis.html");
?>
