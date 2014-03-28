<?php get_header(); ?>
<?php include(locate_template( '/variables/vars-options.php' )); ?>
<div class="body_wrap">
	<div class="content_wrap">
		<div class="gridspan_12_span12_down">
			<article class="the_content">
				
				<?php if(is_date()) : ?>
					
					<?php if( is_year() ) : ?>
						<h1>Yearly Archive For: <?php the_time('Y'); ?></h1>
					<?php elseif( is_month() ) : ?>
						<h1>Monthly Archive For: <?php the_time('F, Y'); ?></h1>
					<?php elseif( is_day() ) : ?>
						<h1>Daily Archive For: <?php the_time('F jS, Y'); ?></h1>
					<?php endif; ?>
				
				<?php // end date title formatting ?>
				
				<?php elseif(is_author() ) :?>
					<h1>Posts By: <?php the_author(); ?></h1>				
				
				<?php elseif( is_tag() ) :?>
					<h1>Posts Tagged As: <?php single_cat_title('',true); ?></h1>
					<?php echo category_description( $category_id ); // prints the description from the categories listing ?>
				
				<?php else: ?>
					<h1>Archive</h1>
				
				<?php endif; ?>
			</article>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php include(locate_template( '/partials/content-short.php' )); ?>
			<?php endwhile; ?>

				<?php // because these are descending the next_posts_link is actually older posts ?>
						<div class="navigation-wrapper">
							<span class="navigation-next-post"><?php next_posts_link('&laquo; Older Entries') ?></span>
							<span class="navigation-previous-post"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
						</div>
				<?php endif; ?>
					
		</div>
	</div>
</div>


<?php get_footer(); ?>