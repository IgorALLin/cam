<?php

function get_status($user_likes, $photo_id) {
	$res["like"] = "notactive";
	$res["dislike"] = "notactive";

	if($user_likes == 'zero')
		return($res);
	
	foreach($user_likes as $val) {
		if ($val["galleryid"] == $photo_id){
			if ($val["type"] == 1){
				$res["like"] = "active";
				$res["dislike"] = "notactive";
			}
			else if ($val["type"] == 2){
				$res["like"] = "notactive";
				$res["dislike"] = "active";
			}
		}
	}
	return($res);
}

function get_page ($curr_page, $num_pages) {
	if (!is_numeric($curr_page) || $curr_page < 1){
		$page = 1;
	}
	else if (is_int($curr_page) && $curr_page > $num_pages){
		$page = $num_pages;
	}
	else {
		$page = $curr_page;
	}
	return($page);
}

function pagination($page, $num_pages){

	if ($num_pages == 0 || $num_pages == 1){
		$result = array();
	} 
	if ($num_pages > 10){
		if($page <= 4 || $page + 3 >= $num_pages){
			for($i = 0; $i <= 4; $i++){
				$result[$i] = $i + 1;
			}
			$result[5] = "...";
			for($j = 6, $k = 4; $j <= 10; $j++, $k--){
				$result[$j] = $num_pages - $k;
			}	
		}
		else{
			$result[0] = 1;
			$result[1] = 2;
			$result[2] = "...";
			$result[3] = $page - 2;
			$result[4] = $page - 1;
			$result[5] = $page;
			$result[6] = $page + 1;
			$result[7] = $page + 2;
			$result[8] = "...";
			$result[9] = $num_pages - 1;
			$result[10] = $num_pages;			
		}
	}
	else{
		for($n = 0; $n < $num_pages; $n++){
			$result[$n] = $n + 1;
		}
	}
	return($result);
}


?>