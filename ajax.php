<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require_once 'classes/Instagram.class.php';
require_once 'classes/connect.class.php';
require_once 'classes/Queue.class.php';
require_once 'classes/Pic.class.php';


$Insta = new Instagram(array(
	'apiKey'=>'087c4dedc9e942179d973ba767648488',
	'apiSecret'=>'f83ef66f9cd3494db572c70705a341c7',
	'apiCallback'=>'http://intagram.nicolasa.dc3'
));

$Pic = new Pic();
$Queue = new Queue();


if (isset($_GET['action'])) {
	switch($_GET['action']){
		case 'init':
			$results = $Pic->init();
			echo json_encode($results);
			break;

		case 'check_new':
			$lat = $_GET['lat'];
			$lng = $_GET['lng'];
			$tag = $_GET['tag'];
			$pics_location = $Insta->searchMedia($lat, $lng, 500);

			foreach ($pics_location->data as $pic) {
				
				$like_count = $pic->likes->count;
				$url = $pic->images->standard_resolution->url;
				$comment = '';
				if(isset($pic->caption->text) && !empty($pic->caption->text)){
					$comment = $pic->caption->text;
				}
				$user_name = $pic->user->username;
				$user_pic = $pic->user->profile_picture;
				$picture_id = $pic->id;
				$created_time = $pic->created_time; // Attention format timestamp
				$Pic->createPic($url, $like_count, $comment, $user_name, $user_pic, $created_time, $picture_id);
			}

			$pics_tag = $Insta->searchMediaByTag($tag);

			foreach ($pics_tag->data as $pic) {
				$like_count = $pic->likes->count;
				$url = $pic->images->standard_resolution->url;
				$comment = '';
				if(isset($pic->caption->text) && !empty($pic->caption->text)){
					$comment = $pic->caption->text;
				}
				$user_name = $pic->user->username;
				$user_pic = $pic->user->profile_picture;
				$picture_id = $pic->id;
				$created_time = $pic->created_time; // Attention format timestamp
				$Pic->createPic($url, $like_count, $comment, $user_name, $user_pic, $created_time, $picture_id);
			}
			$Queue = new Queue();

			$lastPic = $Queue->getLast();

			echo json_encode($lastPic);
			
			break;

		case 'delete':

			break;
	}
}else{

}


 ?>