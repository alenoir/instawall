<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'classes/Instagram.class.php';
require_once 'classes/connect.class.php';
//require_once 'classes/Pic.class.php';
//require_once 'classes/Queue.class.php';

$Insta = new Instagram(array(
  'apiKey'=>'087c4dedc9e942179d973ba767648488',
  'apiSecret'=>'f83ef66f9cd3494db572c70705a341c7',
  'apiCallback'=>'http://intagram.nicolasa.dc3'
));


if (isset($_GET['action'])) {
  switch($_GET['action']){
    case 'display':
      
      break;

    case 'check_new':
      $pic = array(
        'picture_id' => '2222',
        'url' => 'http://distilleryimage5.s3.amazonaws.com/ca5a68be79e111e3909c123696e3fbe5_5.jpg',
        'like_count' => 10,
        'comment' => 'bla bla',
        'user_name' => 'kik',
        'user_pic' => ''
      );
      
      echo json_encode($pic);
      break;

    case 'delete':

      break;
  }
}else{

}


 ?>