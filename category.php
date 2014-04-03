<?php get_header(); ?>
<?php include(locate_template( '/variables/vars-options.php' )); ?>
<div class="body_wrap">
	<div class="content_wrap">
		<div class="gridspan_12_span12_down">
			<article class="the_content">
				<h1>Category: <?php single_cat_title('',true); ?></h1>
				<?php echo category_description( $category_id ); // prints the description from the categories listing ?>
			</article>
			
			<?php 
				/* http://stackoverflow.com/questions/18773912/php-include-html-adds-white-spaces
				 * Encode in UTF-8 without BOM for Chrome Compatibiilty
				*/
				$posttype = 'post';
				$postperpage = 9;
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$category = get_category( get_query_var( 'cat' ) );
				$cat_id = $category->cat_ID;
				$args = array(
				'posts_per_page' => $postperpage, // this overrides the reading settings value
				'paged' => $paged,
				'cat' => $cat_id,
				'post_type' => $posttype
				);
				
				$short = new WP_Query( $args );          

				$mycount = 0; // this is for counting the loop

				if ( have_posts() ) : ?>
					<div class="snippet_wrap">
						<?php while ( $short->have_posts() ) : $short->the_post(); ?>
							<?php include(locate_template( '/partials/content-tease.php' )); ?>
						<?php endwhile; ?>
					</div>
					<?php // because these are descending the next_posts_link is actually older posts ?>
						<div class="navigation-wrapper">
							<?php 
							if ( $short->max_num_pages > 1 ) : // ensures reading setting value is overwritten ?>
								<span class="navigation-next-post"><?php next_posts_link('&laquo; Older Entries') ?></span>
							<?php endif; ?>
							<span class="navigation-previous-post"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
						</div>
				<?php endif;  wp_reset_postdata(); ?>
					
		</div>
	</div>
</div>


<?php get_footer(); ?>