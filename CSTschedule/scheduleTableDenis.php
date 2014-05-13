<?php
$q=$_REQUEST["q"]; $hint="";
    require_once('config.php');
    session_start();

    // Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");
	$tbl_name="schdule1"; // Table name

//Gets week code for current date
$mydate=getdate();
//$mydate=getdate($mydate[0] - 86400 * 4); //line for testing other dates
if($mydate[wday] <= 5) {
		$dayShifter = 1 - $mydate[wday];
	}
if($mydate[wday] >= 6) {
		$dayShifter = 8 - $mydate[wday];
	}
$monArray = getdate($mydate[0] + 86400 * $dayShifter);
$tueArray = getdate($monArray[0] + 86400 * + 1);
$wedArray = getdate($monArray[0] + 86400 * + 2);
$thuArray = getdate($monArray[0] + 86400 * + 3);
$friArray = getdate($monArray[0] + 86400 * + 4);
$week = $monArray[mon] . $monArray[mday];
echo "<table border=\"1\">
	<caption>$monArray[month] $monArray[mday] to $friArray[month] $friArray[mday]</caption>
	<tr>
		<td width=\"6%\"></td>
		<th>Mon $monArray[mon]/$monArray[mday]</th>
		<th>Tue $tueArray[mon]/$tueArray[mday]</th>
		<th>Wed $wedArray[mon]/$wedArray[mday]</th>
		<th>Thu $thuArray[mon]/$thuArray[mday]</th>
		<th>Fri $friArray[mon]/$friArray[mday]</th>
	</tr>";
$sql="SELECT * FROM $tbl_name Where  week = '$week' ORDER BY id DESC";

		
$monSpan = 0;
$tueSpan = 0;
$wedSpan = 0;
$thuSpan = 0;
$friSpan = 0;

for ($row=0; $row<20; $row++) {
	$hourFrom = 8 + $row / 2 - 0.1;
	$hourFrom = round($hourFrom);

	if($row % 2 == 0) {
		$minFrom = "00";
		$hourRow = 1;
	}
	else {
		$minFrom = "30";
		$hourRow = 0;
	}
	$timeFrom = $hourFrom . ":" . $minFrom;

	echo "<tr>";
	for ($col=1; $col<=5; $col++) {

		if ($col == "1") {
			if($hourRow == 1) {
				echo "<td class=\"timeCell\" rowspan=\"2\"> $timeFrom </td>";
			}
			
  			$weekDay = "Mon";
  			$monSpan--;
  			$curSpan = $monSpan;
		} elseif ($col == "2") {
			$weekDay = "Tue";
			$tueSpan--;
			$curSpan = $tueSpan;
		} elseif ($col == "3") {
			$weekDay = "Wed";
			$wedSpan--;
			$curSpan = $wedSpan;
		} elseif ($col == "4") {
			$weekDay = "Thu";
			$thuSpan--;
			$curSpan = $thuSpan;
		} elseif ($col == "5") {
			$weekDay = "Fri";
			$friSpan--;
			$curSpan = $friSpan;
		}
	$cellId = $weekDay . $hourFrom . $minFrom;
	$blocks="SELECT * FROM $tbl_name WHERE timefrom = '$timeFrom' and datetime = '$weekDay' and week = '$week'";
    $blk = mysql_query($blocks);
    $b = mysql_fetch_array($blk);
	$spans = $b['timeBlocks'];

if($spans != null) {
	$cellClass = "filledCell";
	if ($col == "1") {
	  	$monSpan = $spans;
	} elseif ($col == "2") {
		$tueSpan = $spans;
	} elseif ($col == "3") {
		$wedSpan = $spans;
	} elseif ($col == "4") {
		$thuSpan = $spans;
	} elseif ($col == "5") {
		$friSpan = $spans;
	}
}
else {
	$cellClass = "emptyCell";
}
if($curSpan < 1) {
	echo "<td width=\"15%\" class=\"$cellClass\" rowspan=\"$spans\">";
	
	if($spans != null) {
		echo "<a href=\"#eventInfo\" onClick=\"detailsJs('$cellId')\"><span class=\"linkSpan\"></span></a>";
		$sql="SELECT * FROM $tbl_name WHERE timefrom = '$timeFrom' and datetime = '$weekDay' and week = '$week'";
		$result=mysql_query($sql);   
		while($rows=mysql_fetch_array($result)){ // Start looping table row
			// ORDER BY id DESC is order result by descending
		echo $timeFrom, " - ", $rows['timeto'], "<br>",
			$rows['eventname'], "<br>", 
			$rows['location'];
		echo "<div class=\"hiddenInfo\" id=\"$cellId\">",
				$rows['eventname'], "<br>", 
				$weekDay, " ", $timeFrom, " - ", $rows['timeto'], "<br>",
				$rows['instructor'], "<br>",
				$rows['location'],
				$rows['week'],
			"</div>";}
	}
	echo "</td>";
	} 
}
	echo "</tr>";
}	
echo "</table>";
?>