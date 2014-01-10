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
  <script src="/js/photoWall.js"></script>
	
	<script type="text/javascript">
$(document).ready(function(){
    PhotoWall.init({
        el:             '#gallery'               // Gallery element
        ,zoom:          true                     // Use zoom
        ,zoomAction:    'mouseenter'             // Zoom on action
        ,zoomTimeout:   500                      // Timeout before zoom
        ,zoomDuration:  100                      // Zoom duration time
        ,showBox:       true                     // Enavle fullscreen mode
        ,showBoxSocial: true                     // Show social buttons
        ,padding:       10                       // padding between images in gallery
        ,lineMaxHeight: 150                      // Max set height of pictures line
                                                 // (may be little bigger due to resize to fit line)
    });

    /*

        Photo object consist of:

        {   // big image src,width,height and also image id
            id:
            ,img:       //src
            ,width:
            ,height:
            ,th:{
                src:      //normal thumbnail src
                zoom_src: //zoomed normal thumbnail src
                zoom_factor: // factor of image zoom
                ,width:   //width of normal thumbnail
                ,height:  //height of normal thumbnail
            }
        };

    */

    var PhotosArray = new Array(
        {id:1,img:'img_big1.jpg',width:500,height:400,
         th:{src:'img_small1.jpg',width:50,height:40,
             zoom_src:'img_zoomed1.jpg',zoom_factor:4
            }
        },
        {id:2,img:'img_big2.jpg',width:500,height:400,
         th:{src:'img_small2.jpg',width:50,height:40,
             zoom_src:'img_zoomed2.jpg',zoom_factor:4
            }
        },
        {id:3,img:'img_big3.jpg',width:500,height:400,
         th:{src:'img_small3.jpg',width:50,height:40,
             zoom_src:'img_zoomed3.jpg',zoom_factor:4
            }
        },
        {id:4,img:'img_big4.jpg',width:500,height:400,
         th:{src:'img_small4.jpg',width:50,height:40,
             zoom_src:'img_zoomed4.jpg',zoom_factor:4
            }
        }
    );

    PhotoWall.load(PhotosArray);
    });

</script>
</body>
</html>
