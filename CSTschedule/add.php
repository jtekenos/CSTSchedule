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

$startTBlock = tBlockConverter($startTime);
$tBlocks = tBlockConverter($endTime) - $startTBlock;

$usedBlockArray = array();
$index = 0;
for($i=$tBlocks-1; $i>=0; $i--){
  	$usedBlock = $startTBlock + $i;
  	$usedBlockArray[$index] = $usedBlock;
  	$index++;
  }

$passed = 1;
if($tBlocks < 1) {
	echo "<h3>Please select a valid time<h3>";
	$passed = 0;
} 
if($event == "") {
	echo "<h3>please specify the event name<h3>";
	$passed = 0;
}
if($location == "") {
	echo "<h3>please specify the location<h3>";
	$passed = 0;
}
if($level == "noLvl" or $set == "noSet") {
	echo "<h3>please specify the level and set<h3>";
	$passed = 0;
}
if($date == "") {
	echo "<h3>please specify the date<h3>";
	$passed = 0;
}



$result = mysqli_query($con,"SELECT * FROM schdule1 WHERE event_date = '$date' AND level_id = '$levelSet'");
while($row = mysqli_fetch_array($result)) {
  $oldStartTBlock = tBlockConverter($row['timefrom']);
  $oldEndTBlock = tBlockConverter($row['timeto']);
  $oldtBlocks = $oldEndTBlock - $oldStartTBlock;
  
  for($i=$oldtBlocks-1; $i>=0; $i--){
  	$oldUsedBlock = $oldStartTBlock + $i;

  	foreach ($usedBlockArray as $value) {
  		if($oldUsedBlock == $value) {
  			$passed = 2;
  		}
	}
  }
}
if($passed == 2)
 echo "<h3>please pick another time<h3>";

if($passed == 1) {
	$sql="INSERT INTO schdule1 (eventname, location, timefrom, timeto, instructor, comments, level_id, timeBlocks, event_date)
	VALUES ('$event','$location','$startTime','$endTime','$prof','$eventType', '$levelSet', '$tBlocks', '$date')";
		
	if (!mysqli_query($con,$sql)) {
  		die('Error: ' . mysqli_error($con));
	}
	echo "<h2>Entry Added</h2>
	<a href=\"CSTScheduleDenis.html#schedule\" onClick=\"tableSelectorDate('tableHere')\" id=\"changeScheduleButton\" class=\"ui-btn ui-btn-aui-shadow ui-corner-all\" data-form=\"ui-btn-up-a\" data-theme=\"a\" data-transition=\"pop\">schedule</a>";

}


//header("Location: CSTSchedule.html");


echo "<a href=\"CSTScheduleDenis.html#add\" id=\"changeScheduleButton\" class=\"ui-btn ui-btn-aui-shadow ui-corner-all\" data-form=\"ui-btn-up-a\" data-theme=\"a\" data-transition=\"pop\">back</a>";

mysqli_close($con);
?>
</body>
</html>
