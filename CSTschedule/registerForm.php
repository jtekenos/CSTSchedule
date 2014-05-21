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
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
<script src="functions.js"></script> 
<meta charset="UTF-8">
<title>CST Schedule</title>
</head>
<body>
<div id="register" data-role="page">

<div id="navHeader" data-role="header">
	<a href="http://okoceanfisheries.host56.com/CSTschedule/CSTSchedule.html" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="http://okoceanfisheries.host56.com/CSTschedule/CSTSchedule.html#profile" rel="external" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>
</div><!-- /header -->

<div role="main" class="ui-content">
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
<h1 align="center">User Registration</h1>
<div role="main" class="ui-content">
<form id="registerForm" name="registerForm" method="post" action="register.php">
	<input type="text" id="uName" name="uName" placeholder="User name" required>
	<input type="email" id="txtEmail" name="email" placeholder="Email" required>
	<input type="password" id="pwd" name="pwd" placeholder="Password" required>
	<input type="password" id="confimPwd" name="confirmPwd" placeholder="Re-enter Password" required>

	<script>
		$( "#registerForm" ).validate({
			rules: {
			    confirmPwd: {
			      	equalTo: "#pwd"
			    }
			},
			messages: {
				uName: "Username is required.",
				email: {
					required: "Email is required",
					txtEmail: "Please provide valid email"
				}
			}
		});
	</script>

	<select name= "level">
			<option>Select Level</option>
      		<option value="1">Level 1</option>
      		<option value="2">Level 2</option>
      		<option value="3">Level 3</option>
      		<option value="4">Level 4</option>
    </select>
	<select name = "set">
			<option>Select Set</option>
      		<option value="A">Set A</option>
      		<option value="B">Set B</option>
      		<option value="C">Set C</option>
    </select>

	<label for="notifySlider1"><h3 id="notifyLabel">Notify by email:</h3></label>
	<div class="sliderDiv">
		<select name="slideremail" id="notifySlider1" data-role="slider">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select> 
	</div>

	<label for="notifySlider1"><h3 id="notifyLabel">Notify by SMS:</h3></label>
	<div class="sliderDiv">
		<select name="slidersms" id="notifySlider2" data-role="slider">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select> 
	</div>

	<div id="RegisterButtonDiv">
	<input id="LoginButton" class="button" type="submit" value="Register" name="Register" data-icon="check">	
	<input id="LoginButton" class="button" type="reset" value="Reset" name="Reset" data-icon="delete">	
	</div>
	
</form>
</div><!-- /content -->
</div><!-- /page -->

</body>