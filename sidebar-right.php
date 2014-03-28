<?php if($has_right) : ?>
	<div class="<?php echo $rclass; ?>">
		<aside class="right_side">
			<?php if ( dynamic_sidebar('content_right') ) : ?>					
														
			<?php endif; ?>			
		</aside>
	</div>
<?php endif; ?>