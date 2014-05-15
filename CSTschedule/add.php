<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');

	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
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


/*
 //Input Validations - TO IMPLEMENT LATER
	if($event == '') {
		$errmsg_arr[] = 'Event name missing';
		$errflag = true;
	}
	if($prof == '') {
		$errmsg_arr[] = 'Instructor name missing';
		$errflag = true;
	}
	if($location == '') {
		$errmsg_arr[] = 'Location missing';
		$errflag = true;
	}
	if($eventType == '') {
		$errmsg_arr[] = 'Event type missing';
		$errflag = true;
	}
	if($set == '') {
		$errmsg_arr[] = 'Set missing';
		$errflag = true;
	}
	if($level == '') {
		$errmsg_arr[] = 'Level missing';
		$errflag = true;
	}
	if($sliderEmail == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($sliderSMS == '') {
		$errmsg_arr[] = 'SMS missing';
		$errflag = true;
	}
	if($startTime == '') {
		$errmsg_arr[] = 'Start time missing';
		$errflag = true;
	}
	if($endTime == '') {
		$errmsg_arr[] = 'End time missing';
		$errflag = true;
	}
	if($date == '') {
		$errmsg_arr[] = 'Date missing';
		$errflag = true;
	}
		
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: CSTSchedule.html");
		exit();
	}
	*/
	/*//old date format code LEAVE IT IN FOR NOW
	$timestamp = strtotime($date);
	$inputDateArray = getdate($timestamp);
	$dayOfweek = substr($inputDateArray[weekday],0,3);

	if($inputDateArray[wday] <= 5) {
		$dayShifter = 1 - $inputDateArray[wday];
	}
if($inputDateArray[wday] >= 6) {
		$dayShifter = 8 - $inputDateArray[wday];
	}
$dateArray = getdate($timestamp + 86400 * $dayShifter);
$week = $dateArray[mon] . $dateArray[mday];
	$weekCode = $dateArray[mon] . $dateArray[mday];
	*/
	$levelSet = $level . $set;
	$tBlocks = "2";
	//Create INSERT query
	$sql="INSERT INTO schdule1 (eventname, location, timefrom, timeto, instructor, 
		level_id, comments, timeBlocks, event_date)
	VALUES ('$event','$location','$startTime','$endTime','$prof','$levelSet','$eventType',
		'$tBlocks', '$date')";
		
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: added.html");
exit();
?>
