<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');

	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	//Sanitize the POST values
	$primaryKey = mysqli_real_escape_string($con, $_POST['key']);
	$event = mysqli_real_escape_string($con, $_POST['addEventName']);
	$prof = mysqli_real_escape_string($con, $_POST['addProfName']);
	$location = mysqli_real_escape_string($con, $_POST['addLocation']);
	$eventType = mysqli_real_escape_string($con, $_POST['eventType']);
	$set = mysqli_real_escape_string($con, $_POST['selSet']);
	$level = mysqli_real_escape_string($con, $_POST['selLevel']);
	$startTime = mysqli_real_escape_string($con, $_POST['selStartTime']);
	$endTime = mysqli_real_escape_string($con, $_POST['selEndTime']);
	$date = mysqli_real_escape_string($con, $_POST['date']);
	$tableName = "schdule1";
		//$tableName = "set" . $level . $set;
	$tBlocks = "2";
$levelSet = $level . $set;
	//check for and ignore blank values
	if ($event != '') {
		mysqli_query($con,"UPDATE $tableName SET eventname = '$event'	WHERE id = '$primaryKey'");
	}
	if ($location != '') {
		mysqli_query($con,"UPDATE $tableName SET location = '$location'	WHERE id = '$primaryKey'");
	}
	if ($startTime != "Select Start Time") {
		mysqli_query($con,"UPDATE $tableName SET timefrom = '$startTime'	WHERE id = '$primaryKey'");
	}
	if ($endTime != "Select End Time") {
		mysqli_query($con,"UPDATE $tableName SET timeto = '$endTime'	WHERE id = '$primaryKey'");
	}
	if ($prof != '') {
		mysqli_query($con,"UPDATE $tableName SET instructor = '$prof'	WHERE id = '$primaryKey'");
	}
	if ($levelSet != '') {
		mysqli_query($con,"UPDATE $tableName SET level_id = '$levelSet'	WHERE id = '$primaryKey'");
	}
	if ($eventType != '') {
		mysqli_query($con,"UPDATE $tableName SET comments = '$eventType'	WHERE id = '$primaryKey'");
	}
	if ($date != '') {
		mysqli_query($con,"UPDATE $tableName SET event_date = '$date'	WHERE id = '$primaryKey'");
	}

	mysqli_close($con);

	header("Location: CSTScheduleDenis.html#schedule");
?>
