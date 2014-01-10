<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'classes/Instagram.class.php';
require_once 'classes/connect.class.php';
require_once 'classes/Pic.class.php';
require_once 'classes/Queue.class.php';

require_once 'ajax.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Insta</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
	

		<?php foreach($res->data as $picture){?>
			<img src="<?php echo $picture->images->thumbnail->url;?>" />		
		<?php }?>
		
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="/js/script.js"></script>
</body>
</html>
