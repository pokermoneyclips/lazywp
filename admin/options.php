<?php 
// Variables Ill be reusing
$site_categories = get_categories();
$site_type_args = array('public' => true); // dont return weird things like the menu
$site_types = get_post_types($site_type_args);
?>

<div class="wrap">
	<?php if( isset($_GET['settings-updated']) ) {
		$saved_message = "Settings Saved.";
	} ?>
	<?php if( isset($saved_message)) : ?>
		<div class="saved-message"><?php echo $saved_message; ?></div>
	<?php endif; ?>
	<h1>Lazy Grid Theme Options</h1>
	<form method="post" action="options.php">
		<?php settings_fields( 'lazygrid-settings-group' ); ?>
		<?php do_settings_sections( 'lazygrid-settings-group' ); ?>
		
		
		<h2>Image Sizes</h2>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<p>Available Image Sizes: </p>
				</th>
				<td>
					<ul>
						<?php
						$image_sizes = get_intermediate_image_sizes(); 

						// stuck with this global until they patch WP correctly
						global $_wp_additional_image_sizes;
						$sizes = array();
						foreach( $image_sizes as $s ){
							$sizes[ $s ] = array( 0, 0 );
							if( in_array( $s, array( 'thumbnail', 'medium', 'large' ) ) ){
								$sizes[ $s ][0] = get_option( $s . '_size_w' );
								$sizes[ $s ][1] = get_option( $s . '_size_h' );
							}else{
								$sizes[ $s ] = array( $_wp_additional_image_sizes[ $s ]['width'], $_wp_additional_image_sizes[ $s ]['height'], );
							}
						}
				 
						foreach( $sizes as $size => $atts ){
							echo  '<li>' . $size . ' ' . implode( 'x', $atts ) . '</li>';
						} 		
						?>
					</ul>
				</td>
			</tr>
		</table>

		
		
		
		
		<h2>Front Page</h2>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Slider, Single Background Image, Or None for Top Header Region?</th>
				<td>
					<?php $front_head_type = array(
						'' => '-- Select One --',
						'slider' => 'Slider',
						'single' => 'Single Image',
						'none' => 'None'
						); ?>
					<select name="lazy_grid_header" id="lazy_grid_header">
						<?php foreach( $front_head_type as $var => $front_head ): ?>
							<option value="<?php echo $var; ?>"
								<?php if( $var == get_option('lazy_grid_header') ): ?> 
									selected="selected"<?php endif; ?>>
								<?php echo $front_head; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
		</table>
		<?php 
		if (get_option('lazy_grid_header') == 'single') {
			$single_image_class = "show-single-image-options";
		}			
		else {
			$single_image_class = "hide-single-image-options";				
		}
		if (get_option('lazy_grid_header') == 'slider') {
			$slider_class = "show-single-image-options";
		}
		else {
			$slider_class = "hide-single-image-options";			
		}
		if (get_option('lazy_grid_recent_type') == 'post') {
			$post_category_class = "show-single-image-options";
		}
		else {
			$post_category_class = "hide-single-image-options";
		}
		?>
			
		<table class="header-options slider-image form-table <?php echo $slider_class; ?>">
			<tr valign="top">
				<th colspan="2">
					<h3>Slider Options</h3>
				</th>
			</tr>
			
			<tr valign="top">
				<th scope="row">Slider Image Size</th>
				<td>
					<select name="lazy_grid_header_slider_image">
						<option value="">-- Select One --</option>
						<?php foreach ($image_sizes as $size_name): ?>
							<option value="<?php echo $size_name; ?>"
								<?php if ($size_name == get_option('lazy_grid_header_slider_image')) : ?>
								selected="selected"<?php endif; ?>>
								<?php echo ucfirst($size_name); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr valign="top">	
				<th scope="row">Category</th>
				<td>
					<select name="lazy_grid_header_slider_cat">
					<option value="">--Select One--</option>
					<?php
						foreach ($site_categories as $site_category) : ?>							
						<option value="<?php echo $site_category->term_id; ?>"
								<?php if( $site_category->term_id == get_option('lazy_grid_header_slider_cat') ): ?> 
									selected="selected"<?php endif; ?>>
								<?php echo $site_category->name; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
		</table>

		<table class="header-options single-image form-table <?php echo $single_image_class; ?>">
			<tr valign="top">
				<th colspan="2">
					<h3>Single Image Options</h3>
				</th>
			</tr>
			<tr valign="top">
				<th scope="row">Background Image<br> (Enter a URL or select / upload an image)</th>
				<td>				
					<input id="upload_image" type="text" name="lazy_grid_header_image" value="<?php echo get_option('lazy_grid_header_image'); ?>" /> 
					<input id="upload_image_button" class="button" type="button" value="Upload Image" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Text</th>
				<td><input type="text" name="lazy_grid_header_text" value="<?php echo get_option('lazy_grid_header_text'); ?>" /></td>
			</tr>
			<tr valign="top">
				<th scope="row">Text Position</th>
				<td>
					<?php 
					$single_text_pos = array(
						'' => '-- Select One --',
						'center' => 'Center',
						'top-left' => 'Top Left',
						'top-right' => 'Top Right',
						'bottom-left' => 'Bottom Left',
						'bottom-right' => 'Bottom Right'							
						); ?>
					<select name="lazy_grid_header_text_pos">
						<?php foreach( $single_text_pos as $var => $text_position ): ?>
							<option value="<?php echo $var; ?>"
								<?php if( $var == get_option('lazy_grid_header_text_pos') ): ?> 
									selected="selected"<?php endif; ?>>
								<?php echo $text_position; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>										
		</table>
		<table class="form-table">
			<tr valign="top">
				<th colspan="2"><h3>Recent Posts</h3></th>
			</tr>
			
			<tr valign="top">
				<th scope="row">Type of Post</th>
				<td>
					<select name="lazy_grid_recent_type" id="lazy_grid_recent_type">
						<option value="">--Select One--</option>
						<option value="none" 
							<?php if( "none" == get_option('lazy_grid_recent_type') ): ?> 
								selected="selected"<?php endif; ?>
						>None</option>
						<?php
							foreach ($site_types as $site_type) : ?>							
							<option value="<?php echo $site_type; ?>"
								<?php if( $site_type == get_option('lazy_grid_recent_type') ): ?> 
									selected="selected"<?php endif; ?>>
								<?php echo ucfirst($site_type); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">Image Size for Teasers<br>
				(for types with featured image)</th>
				<td>
					<select name="lazy_grid_tease_image">
						<option value="">-- Select One --</option>
						<?php foreach ($image_sizes as $size_name): ?>
							<option value="<?php echo $size_name; ?>"
								<?php if ($size_name == get_option('lazy_grid_tease_image')) : ?>
								selected="selected"<?php endif; ?>>
								<?php echo ucfirst($size_name); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
		</table>	
			
			
		<table class="form-table header-options front-post-category <?php echo $post_category_class; ?>">	
			<tr valign="top">
				<th colspan="2">Post Categories</th>
			</tr>			
			<tr valign="top">
				<th scope="row">If none checked, all categories will be shown
				</th>
				<td>
					<?php
						
						foreach ($site_categories as $site_category) : ?>							
							<input type="checkbox" name="lazy_grid_recent_posts[]" value="<?php echo $site_category->term_id ?>"
								<?php 
								if((get_option('lazy_grid_recent_posts')) != "" && in_array($site_category->term_id, get_option('lazy_grid_recent_posts') )): ?> 
									checked<?php endif; ?>>
								<?php echo $site_category->name; ?>
							<br>
						<?php endforeach; ?>
						
				</td>
			</tr>
		</table>
		<h2>Post Settings</h2>
		<table class="form-table">
			<tr>
				<th scope="row">Image Size for Short Display<br>
				(for types with featured image)</th>
				<td>
					<select name="lazy_grid_short_image">
						<option value="">-- Select One --</option>
						<?php foreach ($image_sizes as $size_name): ?>
							<option value="<?php echo $size_name; ?>"
								<?php if ($size_name == get_option('lazy_grid_short_image')) : ?>
								selected="selected"<?php endif; ?>>
								<?php echo ucfirst($size_name); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">Image Size for Posts<br>
				(for types with featured image)</th>
				<td>
					<select name="lazy_grid_post_image">
						<option value="">-- Select One --</option>
						<?php foreach ($image_sizes as $size_name): ?>
							<option value="<?php echo $size_name; ?>"
								<?php if ($size_name == get_option('lazy_grid_post_image')) : ?>
								selected="selected"<?php endif; ?>>
								<?php echo ucfirst($size_name); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>

		</table>
		
		
		<?php submit_button(); ?>
	</form>
</div>