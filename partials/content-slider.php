<div class="card grid-<?php echo $lazy_slide->post_count; ?> <?php 
	if($mycount == 0) { 
		echo 'active'; 
	} 
	elseif($mycount == $lazy_slide->post_count - 1) { // have to subtract 1 as were looking at zero starting point versus 1 starting point
		echo 'previous';
	}
?>">
	<?php $mycount ++; ?>
	<div class="front">
		<?php if ( has_post_thumbnail() ) : ?>
			<span class="thumbnail-image"><?php the_post_thumbnail($slideimage); ?></span>
		<?php endif; ?>
			<span class="slider-content">
			<h4><?php the_title(); ?></h4>
			<?php echo lazy_grid_shortener(110); ?>
			</span>
	</div>
	<div class="back"><h4><?php the_title(); ?></h4></div>
</div>