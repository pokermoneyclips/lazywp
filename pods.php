<?php
/*
Template Name: Custom Pods template
*/
 
get_header();
?>
<?php 
// http://keithdevon.com/passing-variables-to-get_template_part-in-wordpress/
	include(locate_template( '/variables/vars-options.php' )); 
	include(locate_template( '/variables/has-right.php' )); 
?>
<div class="body_wrap">
	<div class="content_wrap">
		<div class="<?php echo $mclass; ?>">
			<?php pods_content(); ?>
		</div>
		
		<?php include (locate_template('sidebar-right.php')); ?>
		
	</div>
</div>


<?php get_footer(); ?>