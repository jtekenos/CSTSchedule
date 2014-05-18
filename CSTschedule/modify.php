<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="themes/BCITTheme.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
			
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
		<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
		<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
		<script src="functions.js"></script> 
		<meta charset="UTF-8">
		<?php include "functions.php";?>
		<title>Add Schedule</title>
	</head>
	<body>

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
	if ($startTime != '') {
		mysqli_query($con,"UPDATE $tableName SET timefrom = '$startTime'	WHERE id = '$primaryKey'");
	}
	if ($endTime != '') {
		mysqli_query($con,"UPDATE $tableName SET timeto = '$endTime'	WHERE id = '$primaryKey'");
	}
	if ($prof != '') {
		mysqli_query($con,"UPDATE $tableName SET instructor = '$prof'	WHERE id = '$primaryKey'");
	}
	if (strlen($levelSet) <= 2) {
		mysqli_query($con,"UPDATE $tableName SET level_id = '$levelSet'	WHERE id = '$primaryKey'");
	}
	if ($eventType != '') {
		mysqli_query($con,"UPDATE $tableName SET comments = '$eventType'	WHERE id = '$primaryKey'");
	}
	if ($date != '') {
		mysqli_query($con,"UPDATE $tableName SET event_date = '$date'	WHERE id = '$primaryKey'");
	}




echo "<h2>Entry Added</h2>
	<a href=\"CSTScheduleDenis.html#schedule\" onClick=\"tableSelectorDate('tableHere')\" id=\"changeScheduleButton\" class=\"ui-btn ui-btn-aui-shadow ui-corner-all\" data-form=\"ui-btn-up-a\" data-theme=\"a\" data-transition=\"pop\">schedule</a>";

echo "<a href=\"CSTScheduleDenis.html#add\" id=\"changeScheduleButton\" class=\"ui-btn ui-btn-aui-shadow ui-corner-all\" data-form=\"ui-btn-up-a\" data-theme=\"a\" data-transition=\"pop\">back</a>";


	mysqli_close($con);

?>

</body>
</html>
