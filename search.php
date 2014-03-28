<?php get_header(); ?>
<?php 
	include(locate_template( '/variables/vars-options.php' )); 
	include(locate_template( '/variables/has-right.php' )); 
?>

<div class="body_wrap">
	<div class="content_wrap">
		<div class="<?php echo $mclass; ?>">
			<header>
				<h1>Search Results For: <span class="search-result-text"><?php the_search_query() ?></span></h1>
			</header>
			<?php 
			$searchcount = 0;
			if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $searchcount++ ;?>
				
				<div class="search-result">
					<header class="title">	
						<h1><span class="search-result-text">Result <?php echo $searchcount; ?>)</span> <?php the_title(); ?></h1>
						<p class="author">Authored on <?php the_time('l, F \t\h\e jS, Y'); ?> by <?php the_author(); ?> 
						<?php if (get_the_category()) :?> in category: <?php the_category(', '); ?><?php endif; ?></p>
					</header>
					<?php echo lazy_grid_shortener(20); ?>
				</div>
				
			<?php endwhile; endif; ?>
		</div>
		
		<?php include(locate_template('has-right.php')); ?>

	</div>	
</div>

<?php get_footer(); ?>