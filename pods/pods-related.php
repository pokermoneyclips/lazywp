<?php 
$post_id = get_the_ID();
$categories = get_the_category(); 
$cat_id_array = array(); // Category ID array
foreach($categories as $category) {
	$cat_id_array[] = $category->term_id;
}
$args = array(
'posts_per_page' => 4,
'category__in' => $cat_id_array,
'post__not_in' => array($post_id)
);

$pods = new WP_Query( $args );          

$mycount = 0; // this is for counting the loop

if ( have_posts() ) : ?>
	<div class="snippet_wrap">
		<?php while ( $pods->have_posts() ) : $pods->the_post(); ?>
			<div>
				<header class="title">	
					<h6><?php the_title(); ?></h6>
					<p class="author">Authored on <?php the_time('l, F \t\h\e jS, Y'); ?> by <?php the_author(); ?></p>
				</header>
				<?php echo lazy_grid_shortener(100); ?>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif;  wp_reset_postdata(); ?>
