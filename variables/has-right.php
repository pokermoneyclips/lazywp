<?php 
/* class switching for content right sidebar if active 
 * this is used all over the place so I didnt want to update multiple places
*/

// create variables to check and see if these all exist
$has_right = is_active_sidebar( 'content_right' );

// If something is true add the recommended class
if ($has_right) {
	$mclass = "gridspan_12_span9_up";
	$rclass = "gridspan_12_span3_down";
}
else {
	$mclass = "gridspan_12_span12_down";
	$rclass = "";
}
?>