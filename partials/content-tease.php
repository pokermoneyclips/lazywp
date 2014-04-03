<div class="snippet gridspan_12_span4_<?php 
	$mycount++; // increase count

	$countarray = range(2, 20, 3);
	// if its even we want to use the down grid
	if(in_array($mycount, $countarray)) { 
		echo 'up'; 
	}
	// else we go up so the math == 100%
	else { 
		echo 'down';
	} ?>"> <?php // written as div class="snippet gridspan_12_span4_up OR gridspan_12_span4_down" ?>
	<h4><?php the_title(); ?></h4>
	<?php if ( has_post_thumbnail() ) : ?>
		<span class="snippet-image"><?php the_post_thumbnail( $teaseimage ); ?></span>
	<?php endif; ?>
	<p class="author">Authored on <?php the_time('l, F \t\h\e jS, Y'); ?> by <?php the_author(); ?> in category: <?php the_category(', '); ?></p>
	<?php echo lazy_grid_shortener(110); ?>
</div>