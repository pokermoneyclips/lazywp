<?php
// Oembed Video Wrapper
function your_theme_embed_filter( $output, $data, $url ) {
	$mywrapper = '<div class="video">'.$output.'</div>';
	return $mywrapper;
}
add_filter('oembed_dataparse', 'your_theme_embed_filter', 90, 3 );


// Add links to posts on featured images
function lazy_grid_featured_image_link( $html, $post_id, $post_image_id) {
	// Do not add if already viewing post
	if(is_home() || is_front_page()) { 
		$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
	}
	else {
		$html = '<figure class="image-wrapper">' . $html;
		$html .= '</figure>';
	}
	return $html;
}
add_filter( 'post_thumbnail_html', 'lazy_grid_featured_image_link', 10, 3 );


// Bunch of Changes to Embedded Images
function lazy_grid_remove_width( $html ) {
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;
}
add_filter( 'post_thumbnail_html', 'lazy_grid_remove_width', 10 );
add_filter( 'the_content', 'lazy_grid_remove_width', 10 );


function lazy_grid_wrap_embed_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
	$src  = wp_get_attachment_image_src( $id, $size, false );
	$html5 = "<figure class='image-wrapper'>";
	$html5 .= "<img src='$src[0]' alt='$alt' />";
	if ($caption) {
		$html5 .= "<figcaption class='image-caption'>$caption</figcaption>";
	}
	$html5 .= "</figure>";
	return $html5;
}
add_filter( 'image_send_to_editor', 'lazy_grid_wrap_embed_image', 10, 9 );


// WYSIWYG editor mods
function lazy_grid_add_editor_styles() {
    add_editor_style( '/css/style.css' );
}
add_action( 'init', 'lazy_grid_add_editor_styles' );