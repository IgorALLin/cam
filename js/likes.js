/*function modify_db(photo_id, type){
	var ajax = new XMLHttpRequest();

	var body = 'photo_id=' + photo_id + '&type=' + type;
	ajax.open("POST", "functions/save_likes.php", true);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send(body);
}

function modify_likes (){
	var src_like = this.like_img.src.indexOf("notactive");
	var src_dislike = this.dislike_img.src.indexOf("notactive");

	//document.getElementById("test").innerHTML = this.like_img.src.indexOf("notactive");
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

	//document.getElementById("test").innerHTML = this.like_img.src.indexOf("notactive");
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

var div_likes = document.getElementsByClassName('likes');

for (var i = 0; i < 10; i++) {
	var photo_id = div_likes[i].childNodes[1].innerHTML;
	var numlikes = div_likes[i].childNodes[5];
	var numdislikes = div_likes[i].childNodes[7];
	var like_img = div_likes[i].childNodes[3].getElementsByTagName('img')[0];
	var dislike_img = div_likes[i].childNodes[9].getElementsByTagName('img')[0];


	div_likes[i].childNodes[3].addEventListener('click', {handleEvent: modify_likes, photo_id, numlikes, numdislikes, like_img, dislike_img}, false);
	div_likes[i].childNodes[9].addEventListener('click', {handleEvent: modify_dislikes, photo_id, numlikes, numdislikes, like_img, dislike_img}, false);
}*/
