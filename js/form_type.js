function form_management() {
	var form_name = this.firstChild.name;
	var all_forms = document.getElementsByClassName('form');

	[].forEach.call(all_forms,function(element) {
		if(element.id === form_name)
			element.style.display = 'block';
		else
			element.style.display = 'none';
	});
}

function click_form() {
	document.body.innerHTML('click');
}


var nav = document.getElementsByClassName('nav-child');
var forms = document.getElementById('left-side').getElementsByTagName('form');

for(var i = 0; i < nav.length; i++){
	nav[i].addEventListener("click", form_management, false);
}

for(var i = 0; i < forms.length; i++){
	forms[i].elements.action.addEventListener("click", click_form, false);
}