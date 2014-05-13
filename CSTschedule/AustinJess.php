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

<!-- ************************INDEX PAGE*************************** -->
<div id="index" data-role="page">

<div id="header" data-role="header">
<img src="Logo.jpg" width="316" height="100" alt="CST Schedule"/>
</div><!-- /header -->

<div role="main" class="ui-content">
<div data-role="collapsible" data-theme="b" data-content-theme="b">
    <h4 ><span id="lvlHeader">Level</span></h4>
    <button id="lvl1" class="ui-btn ui-btn-a" onClick="menuSelector('lvl1', 'lvlHeader')">Level 1</button>
    <button id="lvl2" class="ui-btn ui-btn-a" onClick="menuSelector('lvl2', 'lvlHeader')">Level 2</button>
    <button id="lvl3" class="ui-btn ui-btn-a" onClick="menuSelector('lvl3', 'lvlHeader')">Level 3</button>
    <button id="lvl4" class="ui-btn ui-btn-a" onClick="menuSelector('lvl4', 'lvlHeader')">Level 4</button>
</div>
<div data-role="collapsible" data-theme="b" data-content-theme="b">
    <h4><span id="setHeader">Set</span></h4>
    <button id="setA" class="ui-btn ui-btn-a" onClick="menuSelector('setA', 'setHeader')">Set A</button>
    <button id="setB" class="ui-btn ui-btn-a" onClick="menuSelector('setB', 'setHeader')">Set B</button>
    <button id="setC" class="ui-btn ui-btn-a" onClick="menuSelector('setC', 'setHeader')">Set C</button>
</div>
<a href="#schedule" id="GetScheduleButton" class=" ui-btn ui-btn-a ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Get Schedule</a>
</div>
		<?php	
			session_start();
			include "functions.php"; 
			
			if (isLoggedIn()){
				echo '<div class="loginInfo" id="userName">' . $_SESSION["SESS_LOGIN_NAME"] . '</div>';
				echo '<div class="loginInfo"><form method="link" action="forum/logout.php">
					<input type="submit" class="button" value="Logout"></form></div>';
			} 
			?>
<!-- /content -->

<div id="footer" data-role="footer">

	<div class="footerButtons">
		<a href="#login" id="LoginButton" class=" ui-btn ui-btn-a ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Login</a>
		<a href="#register" id="RegisterButton" class=" ui-btn ui-btn-a ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Register</a>
	</div>
</div><!-- /footer -->
</div><!-- /page -->


<!-- ************************SCHEDULE PAGE*************************** -->
<div id="schedule" data-role="page">

<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>
	<div>
		<a href="#edit" id="editButton" class=" ui-btn ui-btn-aui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Edit</a>
	</div>	
</div><!-- /header -->

<div role="main" id="scheduleContent" class="ui-content">
	<?php
    require_once('config.php');
    session_start();

    // Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");
	$tbl_name="schdule1"; // Table name
?>

<table id="scheduleTable" cellpadding="0" cellspacing="1">

<tr id="scheduleHeadings">
<td width="6%" align="center"><strong></strong></td>
<td width="13%" align="center"><strong>Mon</strong></td>
<td width="13%" align="center"><strong>Tue</strong></td>
<td width="13%" align="center"><strong>Wed</strong></td>
<td width="13%" align="center"><strong>Thu</strong></td>
<td width="13%" align="center"><strong>Fri</strong></td>
</tr>

<?php
 	$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
	// ORDER BY id DESC is order result by descending

    //6c Enables the table to show the name of the user who posted the topic
    $sql="SELECT * FROM $tbl_name JOIN members1 ON members1.level_id = schdule1.level_id"; 
    $blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }
  ?>

<tr>
<td width="6%" align="center"><strong>8:00</strong></td>
<td  rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo "<span class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</span>";}

	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }
    
    ?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}

	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>8:30</strong></td>

<td rowspan = "<?php echo $b['timeBlocks'] ?>">
	<?php 

		$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ 

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}

	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<tr>
<td width="6%" align="center"><strong>9:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<tr>
<td width="6%" align="center"><strong>9:30</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>10:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<tr>
<td width="6%" align="center"><strong>10:30</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>11:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending

	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<tr>
<td width="6%" align="center"><strong>11:30</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>12:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<tr>
<td width="6%" align="center"><strong>12:30</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>13:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>13:30</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<tr>
<td width="6%" align="center"><strong>14:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>14:30</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>15:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>
<tr>
<td width="6%" align="center"><strong>15:30</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<tr>
<td width="6%" align="center"><strong>16:00</strong></td>
<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Tue'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Wed'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Thu'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td align="center" rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Fri'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    

<td rowspan = "<?php echo $b['timeBlocks'] ?>"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	
	echo "<div class=\"filledSlot\">", $rows['eventname'], "\n", $rows['instructor'], "&nbsp", $rows['location'], "</div>";}
	
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '16:30' and datetime = 'Mon'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
    if ($b['timeBlocks'] == null){
    	$b['timeBlocks'] = "1";
    }?> </td>    
</tr>

<?php
// Exit looping and close connection

mysql_close();
?>
<tr>
<td colspan="6" align="center"><a href="add_topic_form.php"><strong></strong> </a></td>
</tr>
</table>

</div><!-- /content -->
</div><!-- /page -->


<!-- ***************************LOGIN PAGE*************************** -->
<div id="login" data-role="page">
<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">User1</a>
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
<form id="loginForm" name="loginForm" method="post" action="loginJess.php">
	<input type="text" id="username" name="username">
	<input type="password" id="password" name="password">

	<div id="RegisterButtonDiv">
	<input class="button" type="submit" value="Login" name="Login">	
	</div>
</form>
</div><!-- /content -->
</div><!-- /page -->

<!-- ***************************REGISTER PAGE*************************** -->

<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
<body>
<div id="register" data-role="page">

<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-star ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>
	<div>
		<a href="#edit" id="editButton" class=" ui-btn ui-btn-a ui-icon-star ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" data-icon="star">Edit</a>
	</div>	
</div><!-- /header -->

<div role="main" class="ui-content">
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


<!-- ***************************EDIT SCHEDULE PAGE*************************** -->
<div id="edit" data-role="page">

<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>	
</div><!-- /header -->

<div role="main" class="ui-content">
	<h1 align="center">Edit Schedule</h1>
	<a href="#add" id="addButton" class=" ui-btn ui-btn-a ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Add Event</a>
	<a href="#modify" id="modifyButton" class=" ui-btn ui-btn-a ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Modify Event</a>
	<a href="#cancel" id="cancelButton" class=" ui-btn ui-btn-a ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Cancel Class</a>
</div><!-- /content -->
</div><!-- /page -->

<!-- ***************************MODIFY SCHEDULE PAGE*************************** -->
<div id="modify" data-role="page">

<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>
	<div>
		<a href="#edit" id="editButton" class=" ui-btn ui-btn-a ui-icon-back ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Edit</a>
	</div>	
</div><!-- /header -->

<?php
    require_once('config.php');
    session_start();

    // Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");
	$tbl_name="schdule1"; // Table name
?>

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong></strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Mon</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Tue</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Wed</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Thu</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Fri</strong></td>
</tr>

<?php
 	$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
	// ORDER BY id DESC is order result by descending

    //6c Enables the table to show the name of the user who posted the topic
    $sql="SELECT * FROM $tbl_name JOIN members1 ON members1.level_id = schdule1.level_id"; 
  ?>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>8:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>8:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '8:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>9:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>9:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '9:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>10:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>10:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '10:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>11:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>11:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '11:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>12:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>12:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '12:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>13:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>13:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '13:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>14:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>14:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '14:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>15:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>15:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '15:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>16:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>16:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '16:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>

<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>17:00</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:00' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:00' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:00' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:00' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:00' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>17:30</strong></td>
<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:30' and datetime = 'Mon'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:30' and datetime = 'Tue'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:30' and datetime = 'Wed'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td align="center" bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:30' and datetime = 'Thu'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    

<td bgcolor="#FFFFFF"><?php 
 	$sql="SELECT * FROM $tbl_name WHERE timefrom = '17:30' and datetime = 'Fri'";
	$result=mysql_query($sql);   
	while($rows=mysql_fetch_array($result)){ // Start looping table row
		// ORDER BY id DESC is order result by descending
	echo $rows['eventname'];
	echo "\n";
	echo $rows['instructor'];
	echo "&nbsp";
	echo $rows['location'];} ?></td>    
</tr>
<?php
// Exit looping and close connection

mysql_close();
?>
<tr>
<td colspan="6" align="center" bgcolor="#E6E6E6"><a href="add_topic_form.php"><strong></strong> </a></td>
</tr>
</table>
		<a href="#add" id="okButton" class=" ui-btn ui-btn-a ui-icon-check ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">OK</a>
	<a href="#add" id="revertButton" class=" ui-btn ui-btn-a ui-icon-delete ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Cancel Changes</a>
</div><!-- /content -->
</div><!-- /page -->


<!-- ***************************ADD SCHEDULE PAGE*************************** -->
<div id="add" data-role="page">

<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>
	<div>
		<a href="#edit" id="editButton" class=" ui-btn ui-btn-a ui-icon-back ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Edit</a>
	</div>	
</div><!-- /header -->

<div role="main" class="ui-content">
	<h1 align="center">Add Event</h1>
	<form id="addForm">
		<input type="text" id="addEventName" name="addEventName" placeholder="Event Name">
		<input type="text" id="addProfName" name="addProfName" placeholder="Instructor Name">
		<select name="eventType" size="1">
			<option>Select Event Type</option>
			<option value="testEvent">Test</option>
			<option value="assignmentEvent">Assignment Due</option>
			<option value="classEvent">Class</option>
		</select>
		<select name="selLevel">
			<option>Select Level</option>
			<option value="lvl1">Level 1</option>
      		<option value="lvl2">Level 2</option>
      		<option value="lvl3">Level 3</option>
      		<option value="lvl4">Level 4</option>
		</select>

		<div id="setAndNotificationDiv">
		<div id="setCheckbox" data-role="fieldcontain">
 			<fieldset data-role="controlgroup">
			<legend>Set (select all that apply)</legend>
			<input type="checkbox" name="checkboxSet" id="checkbox-1" value="setA">
			<input type="checkbox" name="checkboxSet" id="checkbox-2" value="setB">
			<input type="checkbox" name="checkboxSet" id="checkbox-3" value="setA">
			<label for="checkbox-1">Set A</label>
			<label for="checkbox-2">Set B</label>
			<label for="checkbox-3">Set C</label>
    		</fieldset>
		</div>
		<div id="addEventNotification">
			<br>
			<label for="notifySlider1">Notify by email:</label>
			<div class="sliderDiv">
				<select name="slider" id="notifySlider1" data-role="slider">
					<option value="yes">No</option>
					<option value="no">Yes</option>
				</select> 
			</div>
			<label for="notifySlider1">Notify by SMS:</label>
			<div class="sliderDiv">
				<select name="slider" id="notifySlider2" data-role="slider">
					<option value="yes">No</option>
					<option value="no">Yes</option>
				</select> 
			</div>
		</div>
		</div>

		<div id="timeButtons">
		<select name="Position" size="1">
			<option>Select Start Time</option>
			  <option>6:00</option>
			  <option>6:30</option>
			  <option>7:00</option>
			  <option>7:30</option>
			  <option>8:00</option>
			  <option>8:30</option>
			  <option>9:00</option>
			  <option>9:30</option>
			  <option>10:00</option>
			  <option>10:30</option>
			  <option>11:00</option>
			  <option>11:30</option>
			  <option>12:00</option>
			  <option>12:30</option>
			  <option>13:00</option>
			  <option>13:30</option>
			  <option>14:00</option>
			  <option>14:30</option>
			  <option>15:00</option>
			  <option>15:30</option>
			  <option>16:00</option>
			  <option>16:30</option>
			  <option>17:00</option>
			  <option>17:30</option>
			</select>
			<select name="Position" size="1">
			<option>Select End Time</option>
			  <option>6:00</option>
			  <option>6:30</option>
			  <option>7:00</option>
			  <option>7:30</option>
			  <option>8:00</option>
			  <option>8:30</option>
			  <option>9:00</option>
			  <option>9:30</option>
			  <option>10:00</option>
			  <option>10:30</option>
			  <option>11:00</option>
			  <option>11:30</option>
			  <option>12:00</option>
			  <option>12:30</option>
			  <option>13:00</option>
			  <option>13:30</option>
			  <option>14:00</option>
			  <option>14:30</option>
			  <option>15:00</option>
			  <option>15:30</option>
			  <option>16:00</option>
			  <option>16:30</option>
			  <option>17:00</option>
			  <option>17:30</option>
			</select>
		</div>
			<br><br>
			<input class="button" type="submit" value="Add" name="Update" data-form="ui-btn-up-a" data-theme="a" data-icon="check">
			<input class="button" type="reset" value="Reset" name="Reset" data-form="ui-btn-up-a" data-theme="a" data-icon="delete">			
	</form>
</div><!-- /content -->
</div><!-- /page -->

<!-- ***************************CANCEL SCHEDULE PAGE*************************** -->
<div id="cancel" data-role="page">

<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">User1</a>
	</div>
	<div>
		<a href="#edit" id="editButton" class=" ui-btn ui-btn-a ui-icon-back ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a">Edit</a>
	</div>	
</div><!-- /header -->

<div role="main" class="ui-content">
	<form id="addForm">
		<input type="text" id="cancelClassName" name="cancelClassName" placeholder="Class Name">

		<select name="selLevel">
			<option>Select Level</option>
			<option value="lvl1">Level 1</option>
      		<option value="lvl2">Level 2</option>
      		<option value="lvl3">Level 3</option>
      		<option value="lvl4">Level 4</option>
		</select>

		<div id="setAndNotificationDiv">
		<div id="setCheckbox" data-role="fieldcontain">
 			<fieldset data-role="controlgroup">
			<legend>Set (select all that apply)</legend>
			<input type="checkbox" name="checkboxSet" id="checkbox-1" value="setA">
			<input type="checkbox" name="checkboxSet" id="checkbox-2" value="setB">
			<input type="checkbox" name="checkboxSet" id="checkbox-3" value="setA">
			<label for="checkbox-1">Set A</label>
			<label for="checkbox-2">Set B</label>
			<label for="checkbox-3">Set C</label>
    		</fieldset>
		</div>
		<br>
		<div id="addEventNotification">
		<label for="notifySlider1">Notify by email:</label>
		<div class="sliderDiv">
			<select name="slider" id="notifySlider1" data-role="slider">
				<option value="yes">No</option>
				<option value="no">Yes</option>
			</select> 
		</div>
		<label for="notifySlider1">Notify by SMS:</label>
		<div class="sliderDiv">
			<select name="slider" id="notifySlider2" data-role="slider">
				<option value="yes">No</option>
				<option value="no">Yes</option>
			</select> 
		</div>
		</div>
		</div>


		<div id="timeButtons">
		<select name="Position" size="1">
			<option>Select Start Time</option>
			  <option>5:00</option>
			  <option>5:30</option>
			  <option>6:00</option>
			  <option>6:30</option>
			  <option>7:00</option>
			  <option>7:30</option>
			  <option>8:00</option>
			  <option>8:30</option>
			  <option>9:00</option>
			  <option>9:30</option>
			  <option>10:00</option>
			  <option>10:30</option>
			  <option>11:00</option>
			  <option>11:30</option>
			  <option>12:00</option>
			  <option>12:30</option>
			  <option>13:00</option>
			  <option>13:30</option>
			  <option>14:00</option>
			  <option>14:30</option>
			  <option>15:00</option>
			  <option>15:30</option>
			  <option>16:00</option>
			  <option>16:30</option>
			  <option>17:00</option>
			  <option>17:30</option>
			</select>
		<select name="Position" size="1">
			<option>Select End Time</option>
			  <option>5:00</option>
			  <option>5:30</option>
			  <option>6:00</option>
			  <option>6:30</option>
			  <option>7:00</option>
			  <option>7:30</option>
			  <option>8:00</option>
			  <option>8:30</option>
			  <option>9:00</option>
			  <option>9:30</option>
			  <option>10:00</option>
			  <option>10:30</option>
			  <option>11:00</option>
			  <option>11:30</option>
			  <option>12:00</option>
			  <option>12:30</option>
			  <option>13:00</option>
			  <option>13:30</option>
			  <option>14:00</option>
			  <option>14:30</option>
			  <option>15:00</option>
			  <option>15:30</option>
			  <option>16:00</option>
			  <option>16:30</option>
			  <option>17:00</option>
			  <option>17:30</option>
			</select>
		</div>
			<br><br>
			<input class="button" type="submit" value="Cancel Class" name="cancelClass" data-form="ui-btn-up-a" data-theme="a" data-icon="check">
			<input class="button" type="reset" value="Reset" name="Reset" data-form="ui-btn-up-a" data-theme="a" data-icon="delete">
	</form>
</div><!-- /content -->
</div><!-- /page -->

<!-- ***************************USER PROFILE PAGE*************************** -->
<div id="profile" data-role="page">
<div id="navHeader" data-role="header">
	<a href="#index" id="backButton"><img src="homeButton.jpg" width="45" height="45" alt="Home"/></a>
	<div class="userHeaderDiv">
	<a href="#profile" id="UserHeaderButton" class=" ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left ui-shadow ui-corner-all" data-form="ui-btn-up-a" data-theme="a" >User1</a>
	</div>	
</div><!-- /header -->

<div role="main" class="ui-content">
<h2 id="uNameProfile">User Profile</h2>
<form id="registerForm" name="registerForm" method="post" action="">
	<input type="password" id="password" name="password" placeholder="Change Password">
	<input type="password" id="cpassword" name="cpassword" placeholder="Re-enter Password">
	<input type="email" id="txtEmail" name="email" placeholder="Email: bob123@gmail.com">
	<select>
			<option>Select Level</option>
      		<option value="lvl1">Level 1</option>
      		<option value="lvl2">Level 2</option>
      		<option value="lvl3">Level 3</option>
      		<option value="lvl4">Level 4</option>
    </select>
	<select>
			<option>Select Set</option>
      		<option value="setA">Set A</option>
      		<option value="setB">Set B</option>
      		<option value="setC">Set C</option>
    </select>

	<label for="notifySlider1"><h3 id="notifyLabel">Notify by email:</h3></label>
	<div class="sliderDiv">
		<select name="slider" id="notifySlider1" data-role="slider">
			<option value="yes">No</option>
			<option value="no">Yes</option>
		</select> 
	</div>

	<label for="notifySlider1"><h3 id="notifyLabel">Notify by SMS:</h3></label>
	<div class="sliderDiv">
		<select name="slider" id="notifySlider2" data-role="slider">
			<option value="yes">No</option>
			<option value="no">Yes</option>
		</select> 
	</div>

	<div id="RegisterButtonDiv">
	<input class="button" type="submit" value="Update" name="Update" data-icon="check">
	<input class="button" type="reset" value="Reset" name="Reset" data-form="ui-btn-up-a" data-theme="a" data-icon="delete">	
	</div>
	
</form>
</div><!-- /content -->
</div><!-- /page -->

</body>
</html>