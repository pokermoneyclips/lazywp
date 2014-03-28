<div class="posts-short">
	<?php if ( has_post_thumbnail() ) : ?>		
			<div class="thumbnail-image"><?php the_post_thumbnail( $shortimage ); ?></div>
		<?php endif; ?>
	<header class="title">	
		<h1><?php the_title(); ?></h1>
		<p class="author">Authored on <?php the_time('l, F \t\h\e jS, Y'); ?> by <?php the_author(); ?> 
		<?php if (get_the_category()) :?> in category: <?php the_category(', '); ?><?php endif; ?></p>
	</header>
	<?php echo lazy_grid_shortener(150); ?>
</div>