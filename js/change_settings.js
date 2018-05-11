var user_panel = document.getElementById('hidden_slide').getElementsByTagName('p');
var forms = document.getElementsByClassName('form');

for(var i = 0; i < user_panel.length; i++){
    user_panel[i].addEventListener('click', function(){
        var form = this.innerHTML;  
        for(var j = 0; j < forms.length; j++){
            if(forms[j].getAttribute('name') == form)
                forms[j].style.display = 'block';
            else
                forms[j].style.display = 'none';
        } 
    }, false);
}

function hideServerMsg() {
    var sevrverMsg = document.getElementsByClassName('server_messages');
    for(var i = 0; i < sevrverMsg.length; i++)
    	sevrverMsg[i].style.display = "none";
}
setTimeout(hideServerMsg, 5000);