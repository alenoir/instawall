$(document).ready(function(){
	$.ajax({
	  url: "/ajax.php?action=check_new&lat=44.8377890&lng=-0.5791800&tag=node",
	  
	}).done(function(data) {
	  console.log(data);
	});
});
