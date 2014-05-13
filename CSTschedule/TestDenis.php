<!DOCTYPE html>
<html>
<body>

<?php
// Print the array from getdate()
//Array ( [seconds] => 39 [minutes] => 2 [hours] => 21 [mday] => 12 [wday] => 1 [mon] => 5 [year] => 2014 [yday] => 131 [weekday] => Monday [month] => May [0] => 1399942959 ) 

$mydate=getdate();
$mydate=getdate($mydate[0] + 86400 * 4);
if($mydate[wday] <= 5) {
		$dayShifter = 1 - $mydate[wday];
	}
if($mydate[wday] >= 6) {
		$dayShifter = 8 - $mydate[wday];
	}
$dateNum = $mydate[0] + 86400 * $dayShifter;


echo $mydate[mday], $mydate[weekday], "<br>";
$myDate2 = getdate($dateNum);
echo $myDate2[mday], $myDate2[weekday], "<br>";
$monDate = $myDate2[mon] . $myDate2[mday];
echo $monDate;
?>

</body>
</html>