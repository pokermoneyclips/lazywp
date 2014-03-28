<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$postargs = array(
	'paged' => $paged,
	'post__not_in' => $slide_post_ids,
	'posts_per_page' => get_option('posts_per_page')
);

$front_posts = new WP_Query( $postargs );         
$mycount = 0;

if ( have_posts() ) : ?>
	<div class="welcome_statement">	
		<?php while ( $front_posts->have_posts() ) : $front_posts->the_post(); ?>	
			<?php $mycount++; ?>
			<?php include (locate_template( '/partials/content-short.php' )); ?>		
		<?php endwhile; ?>
	
		<?php // because these are descending the next_posts_link is actually older posts ?>
		<div class="navigation-wrapper">
			<?php if($mycount >= get_option('posts_per_page')) : ?>
			<span class="navigation-next-post"><?php next_posts_link('&laquo; Older Entries') ?></span>
			<?php endif; ?>
			<span class="navigation-previous-post"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
		</div>	
	
	</div>
<?php endif; wp_reset_postdata(); ?>