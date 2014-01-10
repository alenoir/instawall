$(document).ready(function(){
  $.ajax({
      type : "GET",
      url: "/ajax.php?action=init",
      dataType : "json"
    }).done(function(data) {
    
      for(i=0;i<data.length;i++){
        console.log(data[i].url);
        $('#container').append('<div  class="large-1 columns pic"><img src="'+data[i].url+'" /></div>');
      }
      
      setTimeout(reload, 7000);
      
    });
  function reload(){
    console.log('start');
    $.ajax({
      type : "GET",
      url: "/ajax.php?action=check_new&lat=48.8582799&lng=2.2944578&tag=eiffeltower",
      dataType : "json"
    }).done(function(data) {
      console.log('done');
      if(data.url != undefined) {
        console.log('url defined');
        var random = Math.floor((Math.random()* $('.pic').length )+1);
        
        var refpic = $(".pic:eq(" + random + ") img");
      
        refpic.attr("src", data.url);
  
        var picW = refpic.width();
        var picWx2 = (refpic.width())*2;
        
        var new_pic = refpic.clone( true );

        new_pic.css( {
          "max-width": picWx2,
          "z-index": "100",
            "position": "absolute",
            "top":0,
            "left":0
  
          }).animate( {
          "width": picWx2
          });
        refpic.parent().append("<div style='position:absolute;top:0;left0; z-index:101;min-width: "+picWx2+"px; min-height: "+picWx2+"px;' width ="+picWx2+" height="+picWx2+" class='hover-pic'><p style='margin: 0;bottom: 0;position: absolute;background: #888;width: 100%;padding: 5px;' class='info-user'><span style='color: #fff;'>Like : "+ data.like_count +"</span></p><img style='width:60px;position:absolute;left:50%;margin-left:-30px;bottom:10px;-webkit-border-radius: 60px;-moz-border-radius: 60px;border-radius: 60px;border:2px solid #888'src="+ data.user_pic +"></div>");
        refpic.parent().append(new_pic);
        
        
setTimeout(function(){
          $('.hover-pic').animate( {
            "width": picW
            }, function(){
              $('.hover-pic').fadeOut();
              new_pic.fadeOut(function(){
                new_pic.remove();
                $('.hover-pic').remove();
              });
              
            
          });       
        }, 5000);


      }
      
      setTimeout(reload, 7000);
      
    }); 
  
  }
    
  

});


