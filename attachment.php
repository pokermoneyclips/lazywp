<?php get_header(); ?>
<div class="body_wrap">
	<div class="content_wrap">
		<div class="gridspan_12_span12_down">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<header class="title">	
					<h1><?php the_title(); ?></h1>
					<p class="author">Authored on <?php the_time('l, F \t\h\e jS, Y'); ?> by <?php the_author(); ?></p>
				</header>				
				<?php 
				$formatter = $post->post_mime_type;
				$format = stristr($formatter, '/', true); // used this as mime type was returning type / file type				
				include (locate_template('/variables/vars-post.php')); // grab our variables about the media
				include (locate_template( '/partials/content-' . $format . '.php' )); // grab the right content - $mime type file
				the_excerpt(); // this would double display if post type set to attachment on front page
				the_content(); // this would double display if post type set to attachment on front page
				?>				
			<?php endwhile; endif; ?>
		
		</div>
	</div>	
</div>
<?php get_footer(); ?>