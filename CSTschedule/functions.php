<?php

function isLoggedIn()
{
	//Check whether the session variable SESS_MEMBER_ID is present or not
	//Should call session_start(); before calling this function
	return (isset($_SESSION['SESS_MEMBER_ID']) &&
	       	(trim($_SESSION['SESS_MEMBER_ID']) != ''));
}

//function used in server side validation on add and modify pages
//converts a time string to the corresponding timeslot
function tBlockConverter($timeString) {
	$TimeValue = 0;
	if ($timeString == "8:00") {
		$TimeValue = 16;
	} elseif ($timeString == "8:30") {
		$TimeValue = 17;
	} elseif ($timeString == "9:00") {
		$TimeValue = 18;
	} elseif ($timeString == "9:30") {
		$TimeValue = 19;
	} elseif ($timeString == "10:00") {
		$TimeValue = 20;
	} elseif ($timeString == "10:30") {
		$TimeValue = 21;
	} elseif ($timeString == "11:00") {
		$TimeValue = 22;
	} elseif ($timeString == "11:30") {
		$TimeValue = 23;
	} elseif ($timeString == "12:00") {
		$TimeValue = 24;
	} elseif ($timeString == "12:30") {
		$TimeValue = 25;
	} elseif ($timeString == "13:00") {
		$TimeValue = 26;
	} elseif ($timeString == "13:30") {
		$TimeValue = 27;
	} elseif ($timeString == "14:00") {
		$TimeValue = 28;
	} elseif ($timeString == "14:30") {
		$TimeValue = 29;
	} elseif ($timeString == "15:00") {
		$TimeValue = 30;
	} elseif ($timeString == "15:30") {
		$TimeValue = 31;
	} elseif ($timeString == "16:00") {
		$TimeValue = 32;
	} elseif ($timeString == "16:30") {
		$TimeValue = 33;
	} elseif ($timeString == "17:00") {
		$TimeValue = 34;
	} elseif ($timeString == "17:30") {
		$TimeValue = 35;
	}
	return $TimeValue;
}

?>
