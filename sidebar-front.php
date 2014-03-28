<?php
	// create variables to check and see if these all exist
	$home_left = is_active_sidebar( 'home_left' );
	$home_right = is_active_sidebar( 'home_right' );
	$home_true = array($home_left, $home_right); // put the active sidebars into an array
	$home_true_count = count(array_filter($home_true)); // count how many items in array return true
	
	// If something is true add the recommended class
	if ($home_true_count == 1) {
		$hclass = "gridspan_12_span12_down";
	}
	elseif ($home_true_count == 2) {
		$hclass = "gridspan_12_span6_down";
	}
	?>
	<?php if ($home_true_count != 0) {echo '<div class="home-custom">';} // show wrapper only if widgets exist ?>
		<?php if ($home_left) : ?>
			<div class="home-left <?php echo $hclass; ?>">
				<?php if ( dynamic_sidebar('home_left') ) : ?>

				<?php endif; ?>			
			</div>
		<?php endif; ?>

		<?php if ($home_right) : ?>	
			<div class="home-right <?php echo $hclass; ?>">
				<?php if ( dynamic_sidebar('home_right') ) : ?>					

				<?php endif; ?>
			</div>
		<?php endif; ?>	
	<?php if ($home_true_count != 0) {echo '</div>';} ?>