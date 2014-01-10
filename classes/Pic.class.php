<?php 
/**
* 
*/
require_once 'classes/Queue.class.php';

class Pic
{

	public function init($limit=100){
		$Queue = new Queue();
		$Queue->clear();

		$res = mysql_query("SELECT * FROM pic ORDER BY created ASC LIMIT ".$limit."");
		
		$initPics = array();
		while ($pic = mysql_fetch_array($res)) {
			$initPics[] = $pic;
		}
		return $initPics;
	}

	public function createPic($url=null, $like_count=0, $comment=null, $user_name=null, $user_pic=null, $created=null, $picture_id=null){

		if ($this->alreadySet($picture_id)) {
			
			$created = intval($created, 10);

			$date = new DateTime();
			$date->setTimestamp($created);

			$created = $date->format('Y-m-d H:i:s');
			
			$query = mysql_query("INSERT INTO pic (url, like_count, comment, user_name, user_pic, created, picture_id) VALUES ('".$url."', '".$like_count."', '".$comment."', '".$user_name."', '".$user_pic."', '".$created."', '".$picture_id."')");
			$currentPic = mysql_query("SELECT * FROM pic WHERE picture_id ='".$picture_id."'");

			$currentPic = mysql_fetch_array($currentPic);

			$Queue = new Queue();
			$added = $Queue->addToQueue($currentPic['id'], $currentPic['created']);
			// var_dump($added);
		}
	}

	private function alreadySet($picture_id=null){

		$res = mysql_query("SELECT id FROM pic WHERE picture_id = '".$picture_id."'");
		$count = mysql_fetch_array($res);
		if ($count) {
			return false;
		}else{
			return true;
		}
	}

}

 ?>