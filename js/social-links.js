jQuery(document).ready(function($) {
	var root = document.location.hostname;
	
	$("a.share-facebook").append("<img id='facebook-icon-red'>");
	$('#facebook-icon-red').attr("src","<?php echo site_url(); ?>/assets/images/facebook-red.png");
	
	$("a.share-twitter").append("<img id='twitter-icon-red'>");
	$('#twitter-icon-red').attr("src","<?php echo site_url(); ?>/assets/images/twitter-red.png");
	
	$("a.share-linkedin").append("<img id='linkedin-icon-red'>");
	$('#linkedin-icon-red').attr("src","<?php echo site_url(); ?>/assets/images/linkedin-red.png");
});