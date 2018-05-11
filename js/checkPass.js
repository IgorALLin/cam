function validate(){
	var pass2 = document.getElementById("password2").value;
	var pass1 = document.getElementById("password1").value;

	if(pass1 != pass2)
	    document.getElementById("password2").setCustomValidity("Passwords don't match");
	else
	    document.getElementById("password2").setCustomValidity('');

	if (pass1.length < 6){
		document.getElementById("password1").setCustomValidity("Too weak password");
	}
	else
	    document.getElementById("password1").setCustomValidity('');
}

window.onload = function () {
    document.getElementById("password1").onchange = validate;
    document.getElementById("password2").onchange = validate;
}
