<?php if ( have_posts() ) : ?>
	<div class="welcome_statement">	
		<?php while ( have_posts() ) : the_post(); ?>	
			<?php include (locate_template( '/partials/content-post.php' )); ?>		
		<?php endwhile; ?>
	</div>		
<?php endif; ?>