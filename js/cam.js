function show_comment(photo_id, comment_div, flag) {
    var disp = comment_div.getElementsByClassName('comments_show')[0];

    if (disp.style.display == 'block' && flag == 0)
        disp.style.display = 'none';
    else {
        var ajax = new XMLHttpRequest();
        var body = 'photo_id=' + photo_id;

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200){
                disp.style.display = 'block';
                disp.innerHTML = ajax.responseText;
            }
        }
        ajax.open("POST", "functions/showComments.php", true);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send(body);
    }
}

function send_mail_to_user(photo_id){
    var ajax = new XMLHttpRequest();

    var body = '&photo_id=' + photo_id; 
    ajax.open("POST", "functions/send_mail_comment.php", true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(body);
}

function save_comment (photo_id, comment, comment_div, e) {
    e = e || window.e;

    if (e.shiftKey && e.keyCode == 13) {
    }
    else if (e.keyCode == 13) {
        var txt = comment['text'].value;    
        var ajax = new XMLHttpRequest();

        var body = 'text=' + txt + '&photo_id=' + photo_id;    
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200){
                comment['text'].value = '';
                show_comment(photo_id, comment_div, 1);

                if(ajax.responseText == 'saved')
                    send_mail_to_user(photo_id);
            }
        }
        ajax.open("POST", "functions/saveComment.php", true);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send(body);
    } 
}

function events_for_comments () {
    var photos = document.getElementsByClassName('photos');

    for(var i = 0; i < photos.length; i++){
        (function(){
            var comment_div = photos[i].getElementsByClassName('comment')[0];
            var comment = photos[i].getElementsByClassName('comment_send')[0];
            var photo_id = photos[i].getElementsByClassName('photo_info')[0].innerHTML;
            var disp_comment = photos[i].getElementsByClassName('show_comments')[0];
            var comment_show = photos[i].getElementsByClassName('comments_show')[0];

            comment.addEventListener('keyup', function(e){
                save_comment(photo_id, comment, comment_div, e);
            });

            disp_comment.addEventListener('click', function(){
                show_comment(photo_id, comment_div, 0);
            });

        }());
    }
}





function modify_db(photo_id, type){
    var ajax = new XMLHttpRequest();

    var body = 'photo_id=' + photo_id + '&type=' + type;
    ajax.open("POST", "functions/save_likes.php", true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(body);
}

function modify_likes (){
    var src_like = this.like_img.src.indexOf("notactive");
    var src_dislike = this.dislike_img.src.indexOf("notactive");


    if (src_like > -1){
        if (src_dislike < 0){
            this.dislike_img.src = 'icons/dislike_notactive.png';
            this.numdislikes.innerHTML = Number(this.numdislikes.innerHTML) - 1;
        }
        this.like_img.src = 'icons/like_active.png';
        this.numlikes.innerHTML = Number(this.numlikes.innerHTML) + 1;
        modify_db(this.photo_id, 1);
    }       
    else{
        this.like_img.src = 'icons/like_notactive.png';
        this.numlikes.innerHTML = Number(this.numlikes.innerHTML) - 1;
        modify_db(this.photo_id, 0);
    }
        
}

function modify_dislikes (){
    var src_like = this.like_img.src.indexOf("notactive");
    var src_dislike = this.dislike_img.src.indexOf("notactive");

    if (src_dislike > -1){
        if (src_like < 0){
            this.like_img.src = 'icons/like_notactive.png';
            this.numlikes.innerHTML = Number(this.numlikes.innerHTML) - 1;
        }
        this.dislike_img.src = 'icons/dislike_active.png';
        this.numdislikes.innerHTML = Number(this.numdislikes.innerHTML) + 1;
        modify_db(this.photo_id, 2);
    }       
    else{
        this.dislike_img.src = 'icons/dislike_notactive.png';
        this.numdislikes.innerHTML = Number(this.numdislikes.innerHTML) - 1;
        modify_db(this.photo_id, 0);
    }
}

function call_likes(){
    var div_likes = document.getElementsByClassName('likes');


    for (var i = 0; i < div_likes.length; i++) {
        var photo_id = div_likes[i].childNodes[1].innerHTML;
        var numlikes = div_likes[i].childNodes[5];
        var numdislikes = div_likes[i].childNodes[7];
        var like_img = div_likes[i].childNodes[3].getElementsByTagName('img')[0];
        var dislike_img = div_likes[i].childNodes[9].getElementsByTagName('img')[0];


        div_likes[i].childNodes[3].addEventListener('click', {handleEvent: modify_likes, photo_id, numlikes, numdislikes, like_img, dislike_img}, false);
        div_likes[i].childNodes[9].addEventListener('click', {handleEvent: modify_dislikes, photo_id, numlikes, numdislikes, like_img, dislike_img}, false); 
    }
}

function savePhoto (img) {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", 'functions/saveIMG.php', true);
    ajax.setRequestHeader('Content-Type', 'application/upload');
    ajax.send(img);
}

function takePhoto () {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200)
        document.getElementById("right-side").innerHTML=xhttp.responseText;
    }
    xhttp.open("POST", "functions/sendIMG.php", true);
    xhttp.setRequestHeader('Content-Type', 'application/upload');
    xhttp.send();    
}

call_likes();
events_for_comments();

// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now;
    cam = navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}

// Legacy code below: getUserMedia 
else if(navigator.getUserMedia) { // Standard
    cam = navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    cam = navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
    cam = navigator.mozGetUserMedia({ video: true }, function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
    }, errBack);
}

cam.then(function(value) {
    // Успех!

}, function(reason) {
    // Ошибка!

    var button = document.getElementById('snap'); 
    var upload_photo = document.getElementById('upload_photo');
    var upload_submit = document.getElementById('upload_submit');
    var upload_form = '<form enctype = "multipart/form-data" action = "/camagru/functions/upload_photo.php" method = "post"><input name="picture" type="file" /><input type="submit" id="upload_submit" value="Upload" /></form>';

    button.style.display = "none";
    
    upload_photo.style.display = 'block';
    upload_photo.innerHTML = upload_form;

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200){
            var show_photo = document.getElementById('show_upload_photo');
            var video = document.getElementById('video');
            var response = ajax.responseText;

            if(response && response !== 'Bad file type' && response !== 'Too big file' && response !== 'No photo'){
                upload_photo.innerHTML = '';
                button.style.display = "block";
                video.style.display = "none";
                show_photo.style.display = "block";
                show_photo.innerHTML = response;
            }
            else{
                upload_photo.innerHTML = response + upload_form;
            }
        }
    }
    ajax.open("POST", "functions/get_user_upload_photo.php", true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send();
});

// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var button = document.getElementById('snap');
var frame;

// Trigger photo take
button.addEventListener("click", function() {
    var user_photo = document.getElementById('user_photo');

    canvas.style.display = 'block';
    document.getElementById('st').style.display = 'none';
    if (user_photo)
        context.drawImage(user_photo, 0, 0, 640, 480);    
    else
        context.drawImage(video, 0, 0, 640, 480);
    
    context.drawImage(frame, 400, 380);
    var img = canvas.toDataURL("image/png");
    
    savePhoto(img);
    takePhoto();
    call_likes();
    events_for_comments();
    setTimeout(takePhoto, 100);
    setTimeout(call_likes, 1000);
    setTimeout(events_for_comments, 1000);
});

function radio_click (){
    var button = document.getElementById('snap');
    button.disabled = false;
    frame = document.getElementById(this.value);
}

var radio = document.getElementsByName('frame');
for (var i = 0; i < radio.length; i++){
    radio[i].addEventListener('click', radio_click, false);
}

