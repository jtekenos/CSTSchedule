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
