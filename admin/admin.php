<?php 
// create custom plugin settings menu
function lazy_grid_settings_create_menu() {

	//create new top-level menu
	// www.paulund.co.uk/add-menu-item-to-wordpress-admin
	add_menu_page('Lazy Grid Theme Settings', 'Lazy Grid Settings', 'administrator', 'lazy-grid', 'lazy_grid_settings_page', 
	get_template_directory_uri() . '/images/icon.png', 500);

	//call register settings function
	add_action( 'admin_init', 'lazy_grid_register_settings' );
}
add_action('admin_menu', 'lazy_grid_settings_create_menu');


function lazy_grid_register_settings() {
	//register our settings
	register_setting( 'lazygrid-settings-group', 'lazy_grid_header');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_header_image');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_header_text');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_header_text_pos');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_header_slider_image');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_header_slider_cat');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_recent_posts');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_tease_image');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_recent_type');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_category_ad');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_short_image');
	register_setting( 'lazygrid-settings-group', 'lazy_grid_post_image');
}

function lazy_grid_settings_page() {
    // Check that the user is allowed to update options
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	}
	else {	
		include (TEMPLATEPATH . '/admin/options.php');
		lazy_grid_admin_scripts();
	}
}

// Load JS for Media Popup
// webmaster-source.com/2013/02/06/using-the-wordpress-3-5-media-uploader-in-your-plugin-or-theme/
add_action('admin_enqueue_scripts', 'lazy_grid_admin_scripts'); 
function lazy_grid_admin_scripts() {
        wp_enqueue_media();
        wp_register_script('my-admin-js', get_template_directory_uri() . '/js/my-admin.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
		wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/my-admin.css' );
}


// Sanitize and validate input. Accepts an array, return a sanitized array.
//planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
function ozh_sampleoptions_validate($input) {
	// Our first value is either 0 or 1
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	
	// Say our second option must be safe text with no HTML tags
	$input['sometext'] =  wp_filter_nohtml_kses($input['sometext']);
	
	return $input;
}
