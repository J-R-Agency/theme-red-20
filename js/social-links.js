jQuery(document).ready(function($) {
	var root = document.location.hostname;
	
	$(".sd-title").append("<div id='share-icon'>");
	
	$("a.share-facebook").append("<div id='facebook-icon-red'>");
	
	$("a.share-twitter").append("<div id='twitter-icon-red'>");
	
	$("a.share-linkedin").append("<div id='linkedin-icon-red'>");
	
	$(".sharedaddy").eq(1).remove();
	
	$(".share-icon").removeAttr("href");
	
	$(".share-facebook").click(function() {
		window.open(window.location.href+'?share=facebook','','resizable=yes,width=800,height=600');
	});
	$(".share-twitter").click(function() {
		window.open(window.location.href+'?share=twitter','','resizable=yes,width=800,height=600');
	});
	$(".share-linkedin").click(function() {
		window.open(window.location.href+'?share=linkedin','','resizable=yes,width=800,height=600');
	});		
});