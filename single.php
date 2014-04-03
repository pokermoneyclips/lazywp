<?php get_header(); ?>
<?php 
// http://keithdevon.com/passing-variables-to-get_template_part-in-wordpress/
	include(locate_template( '/variables/vars-options.php' )); 
	include(locate_template( '/variables/has-right.php' )); 
?>
<div class="body_wrap">
	<div class="content_wrap">
		<div class="<?php echo $mclass; ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $posttype = get_post_type( $post );?>
				<?php if ($posttype == 'post') : ?>
					<?php include(locate_template( '/partials/content-post.php' )); ?>
				<?php else : ?>
					<?php include(locate_template( '/pods/content-' . $posttype . '.php' )); ?>					
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</div>
		
		<?php include (locate_template('sidebar-right.php')); ?>
		
	</div>
	<?php comments_template(); ?>
</div>


<?php get_footer(); ?>