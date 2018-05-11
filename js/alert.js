function alertMsg () {
	msg = document.getElementById('hiddenmsg').innerHTML;
	if (msg != '') {
		alert(msg);
		document.getElementById('hiddenmsg').innerHTML = '';
	}

}