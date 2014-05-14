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

//uses AJAX to display the right schedule for the selected week
function tableSelector(direction, tableId) { 
	if(direction == "current") {
	}
	else if(direction == "later") {
		numDate = document.getElementById("numDateId").innerHTML;
		numDate = parseInt(numDate) + 86400 * 7;
	}
	else if(direction == "earlier") {
		numDate = document.getElementById("numDateId").innerHTML;
		numDate = parseInt(numDate) - 86400 * 7;
	}

 var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(tableId).innerHTML=xmlhttp.responseText;
    }
  }

if(direction == "current") {
	xmlhttp.open("GET","scheduleTableDenis.php?q=",true);
}
else {
	xmlhttp.open("GET","scheduleTableDenis.php?q="+numDate,true);
}
  
  xmlhttp.send();
}

function detailsJs(sourceId) {
	//alert("its working")
	var detailInfo = document.getElementById(sourceId).innerHTML;
	document.getElementById("eventInfoContent").innerHTML = detailInfo;
}