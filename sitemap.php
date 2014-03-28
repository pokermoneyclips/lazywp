<?php 
/*
* Template Name: Sitemap
*/

get_header(); 

	include(locate_template( '/variables/vars-options.php' )); 
	include(locate_template( '/variables/has-right.php' ));  ?>

<div class="body_wrap">
	<div class="content_wrap">
		<div class="<?php echo $mclass; ?>">
			<h1><?php single_post_title(); ?></h1>
			<h2><?php 
				$numposts_text = " articles posted since 2014";
				$numberposts = get_posts('numberposts=-1&');
				$numposts = count($numberposts);
				
				if (0 < $numposts) {
					$numposts = number_format($numposts);
				} 
				
				echo $numposts. $numposts_text; ?>
			</h2>
	
			<ul id="archive-list">
				<?php
					$myposts = get_posts('numberposts=-1&');
						foreach($myposts as $post) : ?>
							<li><span class="author">Posted <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> ago:</span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endforeach; ?>
			</ul>
		</div>
				<?php include (locate_template('sidebar-right.php')); ?>
	</div>	
</div>


<?php get_footer(); ?>