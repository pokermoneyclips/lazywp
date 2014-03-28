<?php
	// create variables to check and see if these all exist
	$is_left = is_active_sidebar( 'footer_left' );
	$is_middle = is_active_sidebar( 'footer_middle' );
	$is_right = is_active_sidebar( 'footer_right' );
	$is_true = array($is_left, $is_middle, $is_right); // put the active sidebars into an array
	$is_true_count = count(array_filter($is_true)); // count how many items in array return true
	
	// If something is true add the recommended class
	if ($is_true_count == 1) {
		$gclass = "gridspan_12_span12_down";
	}
	elseif ($is_true_count == 2) {
		$gclass = "gridspan_12_span6_down";
	}
	elseif ($is_true_count == 3) {
		$gclass = "gridspan_12_span4_";
		$gclass_odd = "down";
		$gclass_even = "up";
	}

	?>
	<?php if ($is_true_count != 0) {echo '<div class="foot_wrap">';} // show wrapper only if widgets exist ?>
		<?php if ($is_left) : ?>
			<div class="<?php echo $gclass . $gclass_odd; ?>">
				<div class="foot_box foot_left">
					<?php if ( dynamic_sidebar('footer_left') ) : ?>

					<?php endif; ?>			
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ($is_middle) : ?>
			<div class="<?php echo $gclass . $gclass_even; ?>">
				<div class="foot_box">					
					<?php if ( dynamic_sidebar('footer_middle') ) : ?>					

					<?php endif; ?>			
				</div>
			</div>
		<?php endif; ?>

		<?php if ($is_right) : ?>	
			<div class="<?php echo $gclass . $gclass_odd; ?>">
				<div class="foot_box foot_right">
					<?php if ( dynamic_sidebar('footer_right') ) : ?>					

					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>	
	<?php if ($is_true_count != 0) {echo '</div>';} ?>