function isExist(input, selector) {
	msg = document.getElementById("msg").innerHTML;
	if (msg == 'Your username was changed' || msg == 'Youre mail was changed' || msg == 'Wrong password' || msg == 'This mail already taken' || msg == 'This username already taken') {
		alert(msg);
		document.getElementById("msg").innerHTML = "";
	}

	else if (input == "") {
		document.getElementById("msg").innerHTML = "";
		return;
	}

	else {

		if (window.XMLHttpRequest) {
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp = new XMLHttpRequest();
	    } 
	    else {
	        // code for IE6, IE5
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById("msg").innerHTML = this.responseText;
	            if (this.responseText == 'exist') {
	            	document.getElementById('confirm').disabled = true;
	            	document.getElementById("msg").innerHTML = 'This ' + selector + ' already in use';
	            	document.getElementById("msg").style.color = 'red';
	            }
	            else {
	            	document.getElementById('confirm').disabled = false;
	            	document.getElementById("msg").innerHTML = 'This ' + selector + ' is free';
	            	document.getElementById("msg").style.color = 'green';
	            }
	            document.getElementById('msg').style.display = 'block';
	        }
	    };
	    xmlhttp.open("GET", "getdata.php?q=" + input + "&selector=" + selector, true);
	    xmlhttp.send();
	}
}