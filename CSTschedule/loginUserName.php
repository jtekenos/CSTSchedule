<?php
	include 'functions.php';
	require_once('config.php');
	session_start();

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect, error: ".mysql_error());
	mysql_select_db(DB_DATABASE)or die("cannot select DB, error: ".mysql_error());
	$tbl_name="accounts"; // Table name

			//$admin=$_REQUEST['admin'];
			//echo $admin;
?>
<?php   
    if (isLoggedIn()){
        echo "<a href=\"#profile\" id=\"UserHeaderButton\" class=\" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all\" data-form=\"ui-btn-up-a\" data-theme=\"a\" data-transition=\"pop\">" . $_SESSION["SESS_LOGIN_NAME"] . $_SESSION["SESS_levelAndSet"] .$_SESSION["SESS_admin"] . "</a>";
        
        echo '<div class="logoutUserInfo"><form method="link" action="logout.php">
            <input type="submit" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" data-transition="pop" value="Logout"></form></div>';   
  } else {
        echo '<div id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" data-transition="pop"><form method="link" action="login.php"></form></div>';
        echo '<div id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" data-transition="pop"><form method="link" action="register_page.php"></form></div>';
        }   
?>