<?php if ( post_password_required() ) return; ?>
<div id="comments" class="comments-area">
	
	<?php if ( have_comments() ) : ?>
		<h3 class="the_comments">Comments</h3>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'lazy_grid_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div id="comment-nav-below" class="navigation-wrapper comment-nav" role="navigation">
			<p class="assistive-text section-heading"><?php _e('Comment navigation', 'lazy_grid' ); ?></p>
			<div class="navigation-next-post"><?php next_comments_link( __( '&laquo; &laquo; Newer Comments', 'lazy_grid' ) ); ?></div>
			<div class="navigation-previous-post"><?php previous_comments_link( __( 'Older Comments &raquo; &raquo;', 'lazy_grid' ) ); ?></div>

		</div>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="nocomments"><?php _e('We are no longer accepting comments.' , 'lazy_grid' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 
	// http://codex.wordpress.org/Function_Reference/comment_form
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );		
		$my_args = array(
			'label_submit' => 'Post Comment',
			'title_reply' => 'Write Yer Comment',
			'comment_notes_before' => '<p class="req-text">* means REQUIRED! No one will see your email address</p>',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' =>
					'<p class="comment-form-author">' .
					'<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
					( $req ? '<span class="required">*</span>' : '' ) .
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' /></p>',
				'email' =>
					'<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
					( $req ? '<span class="required">*</span>' : '' ) .
					'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_authormail'] ) .
					'" size="30"' . $aria_req . ' /></p>',
				'url' => ''))		
		);		
			comment_form($my_args); 
		?>

</div>