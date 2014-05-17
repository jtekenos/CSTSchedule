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

$startTimeValue = 0;
if ($startTime == "8:00") {
	$startTimeValue = 16;
} elseif ($startTime == "8:30") {
	$startTimeValue = 17;
} elseif ($startTime == "9:00") {
	$startTimeValue == 18;
} elseif ($startTime == "9:30") {
	$startTimeValue = 19;
} elseif ($startTime == "10:00") {
	$startTimeValue = 20;
} elseif ($startTime == "10:30") {
	$startTimeValue = 21;
} elseif ($startTime == "11:00") {
	$startTimeValue = 22;
} elseif ($startTime == "11:30") {
	$startTimeValue = 23;
} elseif ($startTime == "12:00") {
	$startTimeValue = 24;
} elseif ($startTime == "12:30") {
	$startTimeValue = 25;
} elseif ($startTime == "13:00") {
	$startTimeValue = 26;
} elseif ($startTime == "13:30") {
	$startTimeValue = 27;
} elseif ($startTime == "14:00") {
	$startTimeValue = 28;
} elseif ($startTime == "14:30") {
	$startTimeValue = 29;
} elseif ($startTime == "15:00") {
	$startTimeValue = 30;
} elseif ($startTime == "15:30") {
	$startTimeValue = 31;
} elseif ($startTime == "16:00") {
	$startTimeValue = 32;
} elseif ($startTime == "16:30") {
	$startTimeValue = 33;
} elseif ($startTime == "17:00") {
	$startTimeValue = 34;
} elseif ($startTime == "17:30") {
	$startTimeValue = 35;
}

$endTimeValue = 0;
if ($endTime == '8:00') {
	$endTimeValue = 16;
} elseif ($endTime == "8:30") {
	$endTimeValue = 17;
} elseif ($endTime == "9:00") {
	$endTimeValue = 18;
} elseif ($endTime == "9:30") {
	$endTimeValue = 19;
} elseif ($endTime == "10:00") {
	$endTimeValue = 20;
} elseif ($endTime == "10:30") {
	$endTimeValue = 21;
} elseif ($endTime == "11:00") {
	$endTimeValue = 22;
} elseif ($endTime == "11:30") {
	$endTimeValue = 23;
} elseif ($endTime == "12:00") {
	$endTimeValue = 24;
} elseif ($endTime == "12:30") {
	$endTimeValue = 25;
} elseif ($endTime == "13:00") {
	$endTimeValue = 26;
} elseif ($endTime == "13:30") {
	$endTimeValue = 27;
} elseif ($endTime == "14:00") {
	$endTimeValue = 28;
} elseif ($endTime == "14:30") {
	$endTimeValue = 29;
} elseif ($endTime == "15:00") {
	$endTimeValue = 30;
} elseif ($endTime == "15:30") {
	$endTimeValue = 31;
} elseif ($endTime == "16:00") {
	$endTimeValue = 32;
} elseif ($endTime == "16:30") {
	$endTimeValue = 33;
} elseif ($endTime == "17:00") {
	$endTimeValue = 34;
} elseif ($endTime == "17:30") {
	$endTimeValue = 35;
}
	$levelSet = $level . $set;
	$tBlocks = $endTimeValue - $startTimeValue;
	//Create INSERT query
	$sql="INSERT INTO schdule1 (eventname, location, timefrom, timeto, instructor, comments, level_id, timeBlocks, event_date)
	VALUES ('$event','$location','$startTime','$endTime','$prof','$eventType', '$levelSet', '$tBlocks', '$date')";
		
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: CSTSchedule.html");
?>
