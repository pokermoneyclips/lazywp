<?php get_header(); ?>
<?php 
	include(locate_template( '/variables/vars-options.php' )); 
	include(locate_template( '/variables/has-right.php' )); 
?>

<div class="body_wrap">
	<div class="content_wrap">
		<div class="<?php echo $mclass; ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<?php include(locate_template( '/partials/content-post.php' )); ?>

			<?php endwhile; endif; ?>
		</div>
		
		<?php include (locate_template('sidebar-right.php')); ?>
	
	</div>
</div>


<?php get_footer(); ?>