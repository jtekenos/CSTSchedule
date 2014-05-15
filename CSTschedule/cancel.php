<?php
$primaryKey = $_REQUEST["q"];
$tableName = "set" . $_REQUEST["q2"];

	session_start();
	
	//Include database connection details
	require_once('config.php');

	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($con,"DELETE FROM schdule1 WHERE id = '$primaryKey'");
echo "entry Deleted";
mysqli_close($con);

?>