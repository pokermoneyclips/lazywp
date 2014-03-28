jQuery(document).ready(function($) {

/* http://css-tricks.com/resolution-specific-stylesheets/ */
function adjustStyle(width) {
    width = parseInt(width);
	var pathname = window.location.pathname;
    if (width < 720) {
		//if ($(".framed").length > 0) { /* Checks if element exists */
		//	$(".framed").remove();
		//	$(".insert").append('<a class="framelink" href="' + frameSrc + '" target="_blank">' + frameSrc + '</a>');
		//}
	} /* Close initial if statement*/ 
	
	else {
		//if ($(".framed").length == 0) { /* Checks if element doesn't exist */
		//	$(".insert").append('<iframe class="framed" src="' + frameSrc  + '">');
		//	$(".framelink").remove();
		}
	}
				
$(function() {
		adjustStyle($(this).width());
	   $(window).resize(function() { 
	   adjustStyle($(this).width());
	   });
}); 

//http://css-tricks.com/convert-menu-to-dropdown/

// Create the dropdown base
$("<select />").appendTo("nav");

// Create default option "Go to..."
$("<option />", {
   "selected": "selected",
   "value"   : "",
   "text"    : "Go to..."
}).appendTo("nav select");

// Populate dropdown with menu items
$("nav.head-menu a").each(function() {
 var el = $(this);
 $("<option />", {
     "value"   : el.attr("href"),
     "text"    : el.text()
 }).appendTo("nav select");
});

$("nav select").change(function() {
  window.location = $(this).find("option:selected").val();
});


})