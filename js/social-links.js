jQuery(document).ready(function($) {
	var root = document.location.hostname;
	
	$(".sd-title").append("<div id='share-icon'>");
	
	$("a.share-facebook").append("<div id='facebook-icon-red'>");
	
	$("a.share-twitter").append("<div id='twitter-icon-red'>");
	
	$("a.share-linkedin").append("<div id='linkedin-icon-red'>");
	
	$(".sharedaddy").eq(1).remove();
	
	$(".share-icon").removeAttr(href);
	
	$(".share-icon").click(function() {
		window.open(window.location.href+'?share=facebook','','resizable=yes,width=800,height=600');
	});
});