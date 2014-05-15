<?php
$primaryKey = $_REQUEST["q1"];
$field = $_REQUEST["q2"];
$levelSet = $_REQUEST["q3"];
$tableName = "schdule1"
session_start();
	
require_once('config.php');

$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM $tableName WHERE id = '$primaryKey'");

while($row = mysqli_fetch_array($result)) {
	if($field == "all") {
	  echo  $row['eventname'], "<br>", 
	  $row['event_date'], "<br>",
	  $row['timefrom'], " - ", $row['timeto'], 
	  "<br>Location: ", $row['location'], 
	  "<br>Instructor: ", $row['instructor'],  
	  "<br>", $row['comments'], "<br>";
}
	else if($field == "location"){
		echo $row['location'];
	}
	else if($field == "instructor"){
		echo $row['instructor'];
	}
	else if($field == "eventname"){
		echo $row['eventname'];
	}
	else if($field == "comments"){
		echo $row['comments'];
	}
	else if($field == "level_id"){
		echo $row['level_id'];
	}
	else if($field == "timefrom"){
		echo $row['timefrom'];
	}
	else if($field == "timeto"){
		echo $row['timeto'];
	}
	else if($field == "event_date"){
		echo $row['event_date'];
	}
	
}

mysqli_close($con);

?>