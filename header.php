<!DOCTYPE html>
<html>
<head>
<title><?php wp_title( '-', true, 'right' ); bloginfo( 'name' ); ?></title>
<meta name="viewport" content="width=device-width">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="container">
	<header id="header">
		<?php if (is_front_page()): ?>
		<h1><a href="<?php bloginfo( 'siteurl' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else: ?>
		<h2><a href="<?php bloginfo( 'siteurl' ); ?>"><?php bloginfo( 'name' ); ?></a></h2>		
		<?php endif; ?>
	
		<nav class="head-menu">
			<?php 
			$menu_args = array('menu' => 'Header Menu');
			wp_nav_menu( $menu_args ); ?>
		</nav>	
	</header>