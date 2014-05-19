<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="themes/BCITTheme.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
<link rel="stylesheet" href="Style.css" />
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<script src="functions.js"></script> 
<meta charset="UTF-8">
<title>CST Schedule</title>
</head>
<body>

<div id="navHeader" data-role="header">
	<a href="http://okoceanfisheries.host56.com/CSTschedule/CSTSchedule.html#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="http://okoceanfisheries.host56.com/CSTschedule/CSTSchedule.html#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">User1</a>
	</div>
</div><!-- /header -->
	<?php
		session_start();
		if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>';
				}
				echo '</ul>';
				unset($_SESSION['ERRMSG_ARR']);
		}
	?>

<h1 align="center">User Login</h1>
<div role="main" class="ui-content">
<form id="loginForm" name="loginForm" method="post" action="login.php" data-ajax="false">
	<input type="text" id="username" name="username">
	<input type="password" id="password" name="password">

	<div id="RegisterButtonDiv">
	<input id="LoginButton" class="button" type="submit" value="Login" name="Login">	
	</div>
</form>
</div><!-- /content -->
</body>