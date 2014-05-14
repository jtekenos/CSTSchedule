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
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	$email = clean($_POST['email']);
	$set = clean($_POST['set']);
	$level = clean($_POST['level']);
	$slideremail = clean($_POST['slideremail']);
	$slidersms = clean($_POST['slidersms']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'User name missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($set == '') {
		$errmsg_arr[] = 'Set missing';
		$errflag = true;
	}
	if($level == '') {
		$errmsg_arr[] = 'Set missing';
		$errflag = true;
	}
	if($slideremail == '') {
		$errmsg_arr[] = 'Set missing';
		$errflag = true;
	}
	if($slidersms == '') {
		$errmsg_arr[] = 'Set missing';
		$errflag = true;
	}
	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM accounts WHERE username='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'User name already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: registerForm.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO accounts(username, levelAndSet, email, password, notifyEmail, notifySMS) VALUES('$login','$level$set', '$email','$password','$slideremail','$slidersms')";
	$result = mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: CSTSchedule.html?login=".$login."&password=".$password);
		exit();
	}else {
		die("Query failed");
	}
?>
