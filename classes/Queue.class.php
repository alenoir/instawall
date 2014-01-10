<?php 
/**
* 
*/
require_once 'classes/connect.class.php';
class Queue
{
	public function addToQueue($pic_id=null, $created=null){
		
		if(isset($pic_id)){
			
			$query = mysql_query("INSERT INTO queue (pic_id, created) VALUES ('".$pic_id."', '".$created."')");
			return $query;
		}
		
	}

	public function deletePic($id=null){
		$query = mysql_query("DELETE FROM queue WHERE id = ".$id."");
	}

	public function getLast(){
		$query = mysql_query("SELECT queue.*, pic.*, queue.id as queue_id FROM queue LEFT JOIN pic ON (queue.pic_id=pic.id) ORDER BY queue.created LIMIT 1");
		$res = mysql_fetch_assoc($query);

		$del = mysql_query("DELETE FROM queue WHERE id=".$res['queue_id']."");

		return $res;
	}

	public function clear(){
		$cleared = mysql_query("TRUNCATE TABLE queue");
	}

}

 ?>