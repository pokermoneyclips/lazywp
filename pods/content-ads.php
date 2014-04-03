<?php
//this is normally where the WP Loop would be. Instead we add a loop to get pods stuff 

	// get current item 
	$slug = pods_v( 'last', 'url' ); 

	// get pods object for current item 
	$pods = pods( 'ads', $slug );
 
	// set our variables
	$code = $pods->field('ad_code');
?>
<h1><?php the_title(); ?></h1>
<?php echo $code; ?>
