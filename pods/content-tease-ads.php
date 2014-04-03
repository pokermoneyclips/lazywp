<div class="snippet gridspan_12_span4_up"> 
	<?php
	//this is normally where the WP Loop would be. Instead we add a loop to get pods stuff 
	// get pods object for current item 
	$pods = pods( 'ads', $frontad );
	 
	// set our variables
	$code= $pods->field('ad_code');
	?>
	<h4><?php echo $pods->field('title'); ?></h4>
	<?php echo $code; ?>
</div>
