<article class="the_content">
	<header class="title">	
		<h1><?php the_title(); ?></h1>
		<p class="author">Authored on <?php the_time('l, F \t\h\e jS, Y'); ?> by <?php the_author(); ?></p>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>		
		<?php the_post_thumbnail( $postimage ); ?>
	<?php endif; ?>
	<?php the_content(); ?>

	<?php if (get_the_category()) : ?>
		<ul class="info">
			<li>Category: <?php the_category(', '); ?></li>
		</ul>
	<?php endif; ?>
	<?php 
	$get_post_type = get_post_type( get_the_ID() );
	if ($get_post_type != 'page') : ?>
	<div class="navigation-wrapper">			
			<span class="navigation-next-post"><?php next_post_link('%link', '&laquo; &laquo; %title'); ?></span>
			<span class="navigation-previous-post"><?php previous_post_link('%link', '%title &raquo; &raquo; '); ?></span>
	</div>
	<?php endif; ?>
	<?php include (locate_template('/partials/social-media.php')); ?>
</article>