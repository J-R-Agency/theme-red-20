jQuery(document).ready(function($) {
	var root = document.location.hostname;
	
	$(".sd-title").append("<div id='share-icon'>");
	
	$("a.share-facebook").append("<div id='facebook-icon-red'>");
	//$('#facebook-icon-red').attr("src","<?php echo site_url(); ?>/assets/images/facebook-red.png");
	
	$("a.share-twitter").append("<div id='twitter-icon-red'>");
	
	$("a.share-linkedin").append("<div id='linkedin-icon-red'>");
	
	$(".sharedaddy").eq(1).remove();
});