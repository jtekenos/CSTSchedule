<?php
$primaryKey = $_REQUEST["q"];
$tableName = "schdule1";

	session_start();
	
	//Include database connection details
	require_once('config.php');

	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($con,"DELETE FROM $tableName WHERE id = '$primaryKey'");
echo "php ran";
mysqli_close($con);

?>