function trim (inputString) {
	removeChar = ' ';
	var returnString = inputString;
	if (removeChar.length) {
		while(''+returnString.charAt(0)==removeChar) {
			returnString=returnString.substring(1,returnString.length);
		}
		while(''+returnString.charAt(returnString.length-1)==removeChar) {
			returnString=returnString.substring(0,returnString.length-1);
		}
	}
	return returnString;
}

function isLeapYear(yr) {
	return new Date(yr,2-1,29).getDate()==29;
}

function checkUsername(s) {
	//accept username at least chars
	var pattern = /^\w{5,}$/;
	return pattern.test(s);
}

// only accept numerals and return character.
function inNumOnly(e) {
	if(window.event) {
		key = e.keyCode; 
	}
	else if(e.which) {
		key = e.which; 
	}
	return ((key >= 48) && (key <= 57) || (key == 13) || (key == 8)) ? key : false;
}
function inNumOnly2(e) {
	if(window.event) {
		key = e.keyCode; 
	}
	else if(e.which) {
		key = e.which; 
	}
	
	return ((key >= 48) && (key <= 57) || (key == 13) || (key == 8) || (key == 46)) ? key : false;
}
function isValidNumber(svalue){
	var filter = /^\d+(\.\d{1,2})?$/;
	return filter.test(svalue);
}
function isValidEmail(s) {
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return filter.test(s);
}

function genPass() {
	var charset = 'abcdefghijklmnopqrstuvwxyz0123456789';
	var passLength = 7;
	var str = '';
	for (i=1; i<=passLength; i++) {
		str += charset.charAt(Math.round(Math.random()*charset.length));
	}
	return str;
}
function calDateAdd(interval, sdate) {
	var iday = parseInt(sdate.substr(0, 2),10);
	var imonth = parseInt(sdate.substr(3, 2),10);
	var iyear = parseInt(sdate.substr(6),10);
		
    switch (interval){
        case 'T':
            iyear+=1;
            break;
        case 'B':
            imonth+=1;
            break;
        case 'M':
            iday+=7;
            break;
        case 'I':
            iday+=1;
            break;
    }
	var dt = new Date(iyear,imonth,iday);
	
	var newdate = "";
	if(dt.getDate().toString(10).length!=2)
		newdate = (newdate + "0" + dt.getDate());
	else	
		newdate = (newdate + dt.getDate());
	newdate = newdate + "/";

	if(dt.getMonth().toString(10).length!=2)
		newdate = (newdate + "0" + dt.getMonth());
	else	
		newdate = (newdate + dt.getMonth());
	newdate = newdate + "/";
	newdate = newdate + dt.getYear();
	
	return newdate;
}