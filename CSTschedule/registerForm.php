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
<div id="register" data-role="page">

<div id="navHeader" data-role="header">
	<a href="CSTSchedule.php#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="CSTSchedule.php#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-star ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>
	<div>
		<a href="#edit" id="editButton" class=" ui-btn ui-btn-a ui-icon-star ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" data-icon="star">Edit</a>
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
<form id="registerForm" name="registerForm" method="post" action="register.php">
	<input type="text" id="uName" name="login" placeholder="User name">
	<input type="password" id="password" name="password" placeholder="Password">
	<input type="password" id="cpassword" name="cpassword" placeholder="Re-enter Password">
	<input type="email" id="txtEmail" name="email" placeholder="Email">
	<select name= "level">
      		<option value="lvl1">Level 1</option>
      		<option value="lvl2">Level 2</option>
      		<option value="lvl3">Level 3</option>
      		<option value="lvl4">Level 4</option>
    </select>
	<select name = "set">
      		<option value="setA">Set A</option>
      		<option value="setB">Set B</option>
      		<option value="setC">Set C</option>
    </select>

	<label for="notifySlider1"><h3 id="notifyLabel">Notify by email:</h3></label>
	<div class="sliderDiv">
		<select name="slideremail" id="notifySlider1" data-role="slider">
			<option value="yes">No</option>
			<option value="no">Yes</option>
		</select> 
	</div>

	<label for="notifySlider1"><h3 id="notifyLabel">Notify by SMS:</h3></label>
	<div class="sliderDiv">
		<select name="slidersms" id="notifySlider2" data-role="slider">
			<option value="yes">No</option>
			<option value="no">Yes</option>
		</select> 
	</div>

	<div id="RegisterButtonDiv">
	<input class="button" type="submit" value="Register" name="Register">	
	</div>
	
</form>
</div><!-- /content -->
</div><!-- /page -->

</body>