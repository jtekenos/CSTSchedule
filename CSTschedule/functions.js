function menuSelector(sourceId, destinationId) {
	
	var clickedMenu = document.getElementById(sourceId).innerHTML;
	var destinationMenu = document.getElementById(destinationId).innerHTML;
	//document.write(document.getElementById(destinationId).innerHTML);
	document.getElementById(destinationId).innerHTML = clickedMenu;
}

function header(destinationId) {
	
	var mainHeader = document.getElementById("navHeader1").innerHTML;
	var destinationMenu = document.getElementById(destinationId).innerHTML;
	//document.write(document.getElementById(destinationId).innerHTML);
	document.getElementById(destinationId).innerHTML = mainHeader;
}

function weekPicker() {
	var today = new Date();
	today = new Date(today.getTime() + (24 * 60 * 60 * 1000 * 0));//for testing different days
	var dayofWeek = today.getDay();
	if(dayofWeek <= 5) {
		var i = 1 - dayofWeek
	}
	if(dayofWeek >= 6) {
		var i = 8 - dayofWeek
	}
	var mon = new Date(today.getTime() + (24 * 60 * 60 * 1000 * i));
	var tues = new Date(mon.getTime() + (24 * 60 * 60 * 1000 * 1));
	var wed = new Date(mon.getTime() + (24 * 60 * 60 * 1000 * 2));
	var thur = new Date(mon.getTime() + (24 * 60 * 60 * 1000 * 3));
	var fri = new Date(mon.getTime() + (24 * 60 * 60 * 1000 * 4));
	document.getElementById('x').innerHTML = "today is: " + today + "<br>" + mon +"<br>"
	+ tues +"<br>"+ wed +"<br>"+ thur +"<br>"+ fri;
}