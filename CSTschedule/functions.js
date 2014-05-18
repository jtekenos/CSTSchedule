function menuSelector(sourceId, destinationId) {
	var clickedMenu = document.getElementById(sourceId).innerHTML;
	var destinationMenu = document.getElementById(destinationId).innerHTML;
	//document.write(document.getElementById(destinationId).innerHTML);
	document.getElementById(destinationId).innerHTML = clickedMenu;
	if (clickedMenu == 'Level 1'){
		document.getElementById('setA').style.display = 'block';
    	document.getElementById('setB').style.display = 'block';
    	document.getElementById('setC').style.display = 'block';
    	document.getElementById('setD').style.display = 'none';
    	document.getElementById('setE').style.display = 'none';
    	document.getElementById('setG').style.display = 'none';
    	document.getElementById('setL').style.display = 'none';
    	document.getElementById('setO').style.display = 'none';
    	document.getElementById('setQ').style.display = 'none';
    	$("#levelCollapsible").collapsible({collapsed:true});
	} else if (clickedMenu == 'Level 2') {
		document.getElementById('setA').style.display = 'block';
    	document.getElementById('setB').style.display = 'block';
    	document.getElementById('setC').style.display = 'block';
    	document.getElementById('setD').style.display = 'block';
    	document.getElementById('setE').style.display = 'block';
    	document.getElementById('setG').style.display = 'none';
    	document.getElementById('setL').style.display = 'none';
    	document.getElementById('setO').style.display = 'none';
    	document.getElementById('setQ').style.display = 'none';
    	$("#levelCollapsible").collapsible({collapsed:true});
	} else if (clickedMenu == 'Level 3') {
		document.getElementById('setA').style.display = 'none';
    	document.getElementById('setB').style.display = 'none';
    	document.getElementById('setC').style.display = 'block';
    	document.getElementById('setD').style.display = 'block';
    	document.getElementById('setE').style.display = 'none';
    	document.getElementById('setG').style.display = 'none';
    	document.getElementById('setL').style.display = 'block';
    	document.getElementById('setO').style.display = 'none';
    	document.getElementById('setQ').style.display = 'none';
    	$("#levelCollapsible").collapsible({collapsed:true});
	} else if (clickedMenu == 'Level 4') {
		document.getElementById('setA').style.display = 'block';
    	document.getElementById('setB').style.display = 'block';
    	document.getElementById('setC').style.display = 'none';
    	document.getElementById('setD').style.display = 'none';
    	document.getElementById('setE').style.display = 'none';
    	document.getElementById('setG').style.display = 'block';
    	document.getElementById('setL').style.display = 'none';
    	document.getElementById('setO').style.display = 'block';
    	document.getElementById('setQ').style.display = 'block';
    	$("#levelCollapsible").collapsible({collapsed:true});
	} 
}

function collapseSet() {
	$("#setCollapsible").collapsible({collapsed:true})
}

function collapseSet2() {
	$("#setCollapsible2").collapsible({collapsed:true})
}

function collapseLevel2() {
	$("#levelCollapsible2").collapsible({collapsed:true});
}


function dynamicSetCheckbox() {
	var selectedLevel = $( "#selLevel" ).val();
	if (selectedLevel == 'lvl1') {
		$( "#setCheckboxLvl0" ).hide();
		$( "#setCheckboxLvl1" ).show();
		$( "#setCheckboxLvl2" ).hide();
		$( "#setCheckboxLvl3" ).hide();
		$( "#setCheckboxLvl4" ).hide();
	} else if (selectedLevel == 'lvl2') {
		$( "#setCheckboxNull" ).hide();
		$( "#setCheckboxLvl1" ).hide();
		$( "#setCheckboxLvl2" ).show();
		$( "#setCheckboxLvl3" ).hide();
		$( "#setCheckboxLvl4" ).hide();
	} else if (selectedLevel == 'lvl3') {
		$( "#setCheckboxLvl0" ).hide();
		$( "#setCheckboxLvl1" ).hide();
		$( "#setCheckboxLvl2" ).hide();
		$( "#setCheckboxLvl3" ).show();
		$( "#setCheckboxLvl4" ).hide();		
	} else if (selectedLevel == 'lvl4') {
		$( "#setCheckboxLvl0" ).hide();
		$( "#setCheckboxLvl1" ).hide();
		$( "#setCheckboxLvl2" ).hide();
		$( "#setCheckboxLvl3" ).hide();
		$( "#setCheckboxLvl4" ).show();
	}
} 

function getLevel(lvlId) {
	storeLevel = document.getElementById(lvlId).value;
	return storeLevel;
}

function getSet(setId) {
	storeSet = document.getElementById(setId).value;
	return storeSet;
}

// picks the current week to display a schedule for it (not currently used)
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

//displays the schedule for selected week and set Ajax => scheduleTable.php
function tableSelector(direction, tableId) { 
	levelSet = storeLevel + storeSet;
	if(direction == "current") {
	}
	else if(direction == "later") {
		var numDate = document.getElementById("numDateId").innerHTML;
		numDate = parseInt(numDate) + 86400 * 7;
	}
	else if(direction == "earlier") {
		var numDate = document.getElementById("numDateId").innerHTML;
		numDate = parseInt(numDate) - 86400 * 7;
	}

 var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(tableId).innerHTML=xmlhttp.responseText;
    }
  }

if(direction == "current") {
	xmlhttp.open("GET","scheduleTable.php?q1=&q2=" + levelSet,true);
}
else {
	xmlhttp.open("GET","scheduleTable.php?q1=" + numDate  + "&q2=" + levelSet, true);
}
  
  xmlhttp.send();
}
//updates stored timestamp if a new date is selected
function dateUpdate() {
	var newDate = document.getElementById("changeDate").value;
	if(newDate == "") {
		numDate = new Date().getTime() / 1000;
	}
	else {
	numDate = new Date(newDate).getTime() / 1000;
	}
	
}
//displays the schedule for last stored date and set Ajax => scheduleTable.php
function tableSelectorDate(tableId) { 
	dateUpdate();
	levelSet = storeLevel + storeSet;
	 var xmlhttp=new XMLHttpRequest();
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById(tableId).innerHTML=xmlhttp.responseText;
	    }
	  }

	xmlhttp.open("GET","scheduleTable.php?q1=" + numDate  + "&q2=" + levelSet, true);

  
  xmlhttp.send(); 
}

//gets details about selected event AJAX => eventDetails.php
function detailsJs(sourceId) {
	var field = "all";
	primaryKey = sourceId;
	document.getElementsByName("key").value=primaryKey;
	document.getElementById("eventInfoContent").innerHTML="Loading Details...";
	var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("eventInfoContent").innerHTML=xmlhttp.responseText;
    }
  }
	xmlhttp.open("GET","eventDetails.php?q1="+primaryKey + "&q2=" + field +
		"&q3=" + levelSet, true);
	xmlhttp.send();
}

//displays a field for selected entry in the database AJAX => eventDetails.php
function pullField(dataField, destinationId) {
	var field = dataField;
	var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(destinationId).innerHTML=xmlhttp.responseText;
    }
  }
	xmlhttp.open("GET","eventDetails.php?q1="+primaryKey + "&q2=" + 
		field + "&q3=" + levelSet,true);
	xmlhttp.send();
}
//deletes selected event via AJAX => cancel.php
function cancelEvent() { 
 var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("eventInfoContent").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","cancel.php?q=" + primaryKey + "&q2=" + levelSet,true);

  xmlhttp.send();
}

function fillFields() {
	document.getElementsByName("key")[0].value=primaryKey;
	pullField("eventname", "eventname");
	pullField("location", "location");
	pullField("instructor", "instructor");
	pullField("from", "from");
	pullField("to", "to");
	pullField("event_date", "event_date");
	pullField("comments", "comments");
}
