<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$event = clean($_POST['addEventName']);
	$prof = clean($_POST['addProfName']);
	$location = clean($_POST['addLocation']);
	$eventType = clean($_POST['eventType']);
	$set = clean($_POST['selSet']);
	$level = clean($_POST['selLevel']);
	$sliderEmail = clean($_POST['notifySliderEmail']);
	$sliderSMS = clean($_POST['notifySliderSMS']);
	$startTime = clean($_POST['selStartTime']);
	$endTime = clean($_POST['selEndTime']);
	$date = clean($_POST['date']);
	$fakeDayOfTheWeek = 'Mon'; //Denis change this pls
	
	//Input Validations
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
	//test values
	$testId = "30";
	$event = "test2";
	$location = "asdf";
	$startTime = "12:30";
	$endTime = "14:30";
	$prof = "testprof";
	$level = "1";
	$eventType = "adsf";
	$dayOfweek = "Thu";
	$tBlocks = "2";
	$weekCode = "66";
	//Create INSERT query
	$qry = "INSERT INTO schdule1 (id, eventname, location, timefrom, timeto, instructor, 
		level_id, comments, datetime, timeBlocks, week)
	VALUES ('$testId', $event','$location','$startTime','$endTime','$prof','$level','$eventType',
		'$dayOfweek', '$tBlocks', '$weekCode')";
	$result = mysql_query($qry);
	
	if($result) {
		header("location: add_form.html");
		exit();
	}else {
		die("Query failed");
	}
?>
