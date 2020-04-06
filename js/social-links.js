jQuery(document).ready(function($) {
	var root = document.location.hostname;
	
	$("a.share-facebook").append("<img id='facebook-icon-red'>");
	$('#facebook-icon-red').attr("src","assets/images/facebook-red.png");
	
	$("a.share-twitter").append("<img id='twitter-icon-red'>");
	$('#twitter-icon-red').attr("src","assets/images/twitter-red.png");
	
	$("a.share-linkedin").append("<img id='linkedin-icon-red'>");
	$('#twitter-icon-red').attr("src","assets/images/twitter-red.png");
});