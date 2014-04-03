<?php get_header(); ?>
<?php include(locate_template( '/variables/vars-options.php' )); ?>

<?php // This is the slider section 
//codex.wordpress.org/Class_Reference/WP_Query
if ($slidetype == 'slider') : ?>
	<div class="slider-wrap">
		<div class="table">
			<div class="card-wrap">	
				<?php 
					$slideargs = array(
						'cat' => $slidecat,
						'posts_per_page' => 4
					);
					$lazy_slide = new WP_Query( $slideargs );          

					$mycount = 0; // this is for counting the loop
					$slide_post_ids = array();
					if ( have_posts() ) : while ( $lazy_slide->have_posts() ) : $lazy_slide->the_post(); ?>
						
						<?php include(locate_template( '/partials/content-slider.php' )); // Grab the slider  ?>
					
					<?php 
					$slide_post_ids[] = get_the_ID(); // Grab the post IDs to use down the line so we dont repeat content
					endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
<?php elseif($slidetype == 'single') : ?>
	<div class="front-giant-banner"> 
		<div class="front-giant-banner-bg"><img src="<?php echo $slidebg; ?>" /></div>
		<div class="front-giant-banner-text <?php echo $slidetextpos; ?>"><?php echo $slidetext; ?></div>
	</div>
<?php endif; ?>

<?php // This is the content from the page ?>
<div class="body_wrap">
		<?php 
		// Check reading settings to apply appropriate template
		if(get_option('page_on_front') != 0) {
			include(locate_template( '/partials/partial-front-page.php' ));
		}
		else {
			include(locate_template( '/partials/partial-front-posts.php' ));
		}
		?>
		
<?php if($fronttype != "none" && !empty($fronttype) && get_option('page_on_front') != 0) : ?>	
	
	<?php 
	// This is the list of additional latest posts
	/* http://stackoverflow.com/questions/18773912/php-include-html-adds-white-spaces
	 * Encode in UTF-8 without BOM for Chrome Compatibiilty
	*/

	
	$recentargs = array (
	'posts_per_page' => 6,
	'post_type' => $fronttype
	);

	if (!empty($frontad) && $frontad != "") {
		$recentargs[posts_per_page] = 5;
	}
	
	if ($fronttype == "post") {
		$recentargs[category__in] = $frontrecent;
		$recentargs[post__not_in] = $slide_post_ids;
	// unclosed if statement so we can print this html ?>
	<header class="front-sub-header">
		<h2>Recent Posts</h2>
	</header>	
	<?php } // close if post statement
	elseif ($fronttype == "page") {
		$recentargs[post__not_in] = array($post->ID); // dont show the current page
		$recentargs[post__in] = $frontshowpage; // show desired pages
	}
	elseif ($fronttype == "attachment") {
		$recentargs[post_status] = inherit;
	}
	
	$short = new WP_Query( $recentargs );          

	$mycount = 0; // this is for counting the loop
	if ( have_posts() ) : ?>
		<div class="snippet_wrap">
		<?php while ( $short->have_posts() ) : $short->the_post(); ?>
			<?php 
			if ($fronttype != "attachment") {
				if ($mycount == 1 && !empty($frontad) && $frontad != "") {
					include(locate_template( '/pods/content-tease-ads.php' ));
					$mycount = 2;
				}
				include(locate_template( '/partials/content-tease.php' ));

			}
			else {	
				include(locate_template( '/partials/content-tease-media.php' ));					
			}
			?>
		<?php endwhile; ?>
		</div>
	<?php endif; wp_reset_postdata(); ?>

<?php endif; ?>	
	
	<?php get_sidebar('front'); ?>
	
</div>

<?php get_footer(); ?>