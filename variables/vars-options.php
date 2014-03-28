<?php
// Front Top Menu Variables
$slidetype = get_option('lazy_grid_header');
$slidebg = get_option('lazy_grid_header_image');
$slidetext = get_option('lazy_grid_header_text');
$slidetextpos = get_option('lazy_grid_header_text_pos');

$slideimage = get_option('lazy_grid_header_slider_image');
if ($slideimage == NULL) {
	$slideimage = 'post-thumbnail';
}

$slidecat = get_option('lazy_grid_header_slider_cat');


// Front Recent Posts Section
$fronttype = get_option('lazy_grid_recent_type');
$frontrecent = get_option('lazy_grid_recent_posts');

// More Image Sizes
$teaseimage = get_option('lazy_grid_tease_image');
if ($teaseimage == NULL) {
	$teaseimage = 'content-tease';
}
$shortimage = get_option('lazy_grid_short_image');
if ($shortimage == NULL) {
	$shortimage = 'thumbnail';
}
$postimage = get_option('lazy_grid_post_image');
if ($postimage == NULL) {
	$postimage = 'content-post';
}
?>