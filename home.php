<?php get_header(); ?>
<?php 
	include(locate_template( '/variables/vars-options.php' )); 
	include(locate_template( '/variables/has-right.php' )); 
?>

<div class="body_wrap">
	<div class="content_wrap">
		<div class="<?php echo $mclass; ?>">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php include(locate_template( '/partials/content-short.php' )); ?>

			<?php endwhile; ?>
				
				<?php // because these are descending the next_posts_link is actually older posts ?>
				<div class="navigation-wrapper">
					<span class="navigation-next-post"><?php next_posts_link('&laquo; Older Entries') ?></span>
					<span class="navigation-previous-post"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
				</div>

			<?php endif; ?>
		</div>
		
		<?php include (locate_template('sidebar-right.php')); ?>
	
	</div>	
</div>


<?php get_footer(); ?>