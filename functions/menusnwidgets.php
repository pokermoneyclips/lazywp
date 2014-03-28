<?php
/* Menus */
function lazy_grid_menus() {
  register_nav_menus(
    array(
      'header-menu' => ( 'Header Menu' ),
      'extra-menu' => ( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'lazy_grid_menus' );


/* Widgets*/
function lazy_grid_widget($name, $id, $description) {
	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	));
}
lazy_grid_widget("Left Footer", "footer_left", "Displays in the left of the footer");
lazy_grid_widget("Middle Footer", "footer_middle", "Displays in the middle of the footer");
lazy_grid_widget("Right Footer", "footer_right", "Displays in the right of the footer");
lazy_grid_widget("Home Left", "home_left", "Displays below the latest posts on the left side");
lazy_grid_widget("Home Right", "home_right", "Displays below the latest posts on the right side");
lazy_grid_widget("Content Right", "content_right", "Displays on the right hand side of post content");


/* Add featured image support 
 * http://markjaquith.wordpress.com/2009/12/23/new-in-wordpress-2-9-post-thumbnail-images/
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true );
add_image_size( 'content-tease', 305, 50, true ); // for content-teaser display 
add_image_size( 'content-post', 300, 300, true ); // for content-post display