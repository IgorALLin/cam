<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/functions/pagination.php';

$PHOTOS_PER_PAGE = 10;

$all_photos = $gallery->count_all();
if(isset($_COOKIE["id"])){
	$user_photos = $gallery->count_user_photos($_COOKIE["id"]);
	$user_likes = $likes->users_likes($_COOKIE["id"]);
}
	

$type = 1;
if (isset($_GET['type']) && $_GET['type'] == 2)
	$type = 2;

if ($type == 1) {
	$num_photos = $all_photos;
	$photos = $gallery->takeIMG();
}
else{
	$num_photos = $user_photos;
	if(isset($_COOKIE["id"]))
		$photos = $gallery->takeUserImg($_COOKIE["id"]);
}
	
$page = 1;
$num_pages = intval(($num_photos - 1) / $PHOTOS_PER_PAGE) + 1;
if (isset($_GET['page']))
	$page = get_page($_GET['page'], $num_pages);
$result = pagination($page, $num_pages);

$start = $page * $PHOTOS_PER_PAGE - $PHOTOS_PER_PAGE;
$end = $start + $PHOTOS_PER_PAGE;

for ($i = $start; $i < $end; $i++) {
	if (isset($photos[$i]["img"])) {
		$photo = $photos[$i]["img"];
		$photo_id = $photos[$i]["id"];
		if(isset($_COOKIE["id"]))
			$status = get_status($user_likes, $photo_id);
		else
			$status = get_status('zero', $photo_id);
		$num_likes = $likes->count_likes($photo_id);
		$num_dislikes = $likes->count_dislikes($photo_id);

		echo '<div class="photos">
				<div class="photo_info">'.$photo_id.'</div>
				<div class="photo_info">'.$i.'</div>
				<img src="img/'.$photo.'" width="250" height="200" alt="'.$photos[$i]["img"].'">';
				if($user->isAuth()){
					echo '<div class="likes">
							<div class="photo_info">'.$photo_id.'</div>
							<div class="like"><a href="javascript: void 0"><img src="icons/like_'.$status["like"].'.png"></a></div>
							<div class="numlikes">'.$num_likes.'</div>
							<div class="numdislikes">'.$num_dislikes.'</div>
							<div class="dislike"><a href="javascript: void 0"><img src="icons/dislike_'.$status["dislike"].'.png"></a></div>
						</div>
						<div class="comment">
						    <form class="comment_send">
							    <b>Wright comment:</b><br />
							    <textarea name="text" cols="31"></textarea>
						    </form>
						 	<a class="show_comments" href="#">Show comments</a>';
							if ($type == 2)
					    		echo '<a href="functions/delIMG.php?photoId='.$photo_id.'" class="del_pic"><p>Delete picture</p></a>';
							echo '<div class="comments_show"></div>    
						</div>';
				}
		echo '</div>';
	}
}

if($num_photos > 10){
	echo '<br><div class="pag"><p>';
	foreach($result as $elem) {
		if ($elem != $page && $elem !== "..."){
			if ($type == 2)
				echo '<a class="pagination" href="index.php?page='.$elem.'&type=2">'.$elem.'</a>';
			else
				echo '<a class="pagination" href="index.php?page='.$elem.'">'.$elem.'</a>';
		}
		else{
			echo $elem;
		}
	}
	echo '</p></div>';
}

?>
