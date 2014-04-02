<?php
// Include Admin Theme Files
include (TEMPLATEPATH . '/admin/admin.php');

// Include Menus, Widgets, and Featured Images
include (TEMPLATEPATH . '/functions/menusnwidgets.php');

// Include Menus, Widgets, and Featured Images
include (TEMPLATEPATH . '/functions/htmlmods.php');

/* Styles */
function lazy_grid_styles() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'lazy_grid_styles' );


/* JS */
function lazy_grid_js() {
	/*wp_register_script( 'slider', get_template_directory_uri() . '/js/slide.js', array('jquery'), '', true );
	if( is_page( 'home' ) ) {
		wp_enqueue_script( 'slider' );
	}*/	
	wp_enqueue_script( 'lazy_slider', get_template_directory_uri() . '/js/slide.js', array('jquery'), '', true );	
	wp_enqueue_script( 'lazy_grid_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'lazy_grid_js' );


/* 
custom excerpt creator
http://stackoverflow.com/questions/4082662/multiple-excerpt-lengths-in-wordpress
This includes the Readmore link to posts
*/
function lazy_grid_shortener($limit) {
	//$shortened = wp_trim_words(get_the_content(), $limit);
	$shortened = wp_html_excerpt(get_the_content(), $limit);
	$readmore = '<p><a  class="readmore" href="' . get_permalink($post->ID) . '">Read More</a></p>';
	return '<p>' . $shortened . '</p>' . $readmore;
}


// Removing ellipses
function lazy_grid_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'lazy_grid_excerpt_more');


// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );


// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


// Obscure login screen error messages
function wpfme_login_obscure(){ return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';}
add_filter( 'login_errors', 'wpfme_login_obscure' );


/* Bunch of crazy comment stuff I need to go through */
function lazy_grid_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'lazy_grid' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'lazy_grid' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<?php
	$extra_classes = "";
	// check if comment is awaiting moderation
	if ('0' == $comment->comment_approved) {
		$extra_classes .= "comment-pending-approval-bg ";
	}
	
	// check depth of comments and add extra classes if its a reply
	if($depth > 1) {
		$extra_classes .= "comment-reply "; 
		
		if($depth % 2 == 0) {
			$extra_classes .= "depth-even";
		} 
		
		else { 
			$extra_classes .= "depth-odd"; 
		} 
	}	
	?>
	<li <?php comment_class($extra_classes); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<header class="comment-meta">
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'An administrator has not approved your comment yet', 'lazy_grid' ); ?></p>
				<?php endif; ?>
				
				<?php
					printf( '<p class="author">Posted by: %1$s on %2$s',
						get_comment_author(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'lazy_grid' ) . '</span>' : ''
					);
					printf( '%3$s</p>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'lazy_grid' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<section class="comment-content">
				<?php comment_text(); ?>
			</section><!-- .comment-content -->
			
			<?php edit_comment_link( __( 'Edit', 'lazy_grid' ), '<p class="edit-link">', '</p>' );  // edit link for admins ?>
			
			
			
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply to this comment', 'lazy_grid' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
?>