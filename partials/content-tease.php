<div class="snippet gridspan_12_span4_<?php 
	// reset the count every 3 loops
	if ($mycount == 2) {
		$mycount = -1;
	}
	$mycount++; // increase count

	// if its even we want to use the down grid
	if($mycount == 0 || $mycount == 2) { 
		echo 'down'; 
	}
	// else we go up so the math == 100%
	elseif($mycount == 1) { 
		echo 'up';
	} ?>"> <?php // written as div class="snippet gridspan_12_span4_up OR gridspan_12_span4_down" ?>
	<h4><?php the_title(); ?></h4>
	<?php if ( has_post_thumbnail() ) : ?>
		<span class="snippet-image"><?php the_post_thumbnail( $teaseimage ); ?></span>
	<?php endif; ?>
	<p class="author">Authored on <?php the_time('l, F \t\h\e jS, Y'); ?> by <?php the_author(); ?> in category: <?php the_category(', '); ?></p>
	<?php echo lazy_grid_shortener(110); ?>
</div>