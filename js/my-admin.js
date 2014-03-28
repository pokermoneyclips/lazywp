jQuery(document).ready(function($){
// For Media Uploader
  var custom_uploader;
 
    $('#upload_image_button').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#upload_image').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    }); // END Media Uploader
	

// Top Slider Area Select Changer
$("#lazy_grid_header").change(function(){          
	var value = $("#lazy_grid_header option:selected").val();
	var singleTable = $(".single-image");
	var sliderTable = $(".slider-image");
    
	if(value === "single") {
		singleTable.removeClass("hide-single-image-options").addClass("show-single-image-options");
	}
	if(value !== "single") {
		singleTable.removeClass("show-single-image-options").addClass("hide-single-image-options");	
	}
});

$("#lazy_grid_recent_type").change(function(){   
	var catValue = $("#lazy_grid_recent_type option:selected").val();
	var catTable = $(".front-post-category");
	
    if(catValue === "post") {
		catTable.removeClass("hide-single-image-options").addClass("show-single-image-options");
	}
	if(catValue !== "post") {
		catTable.removeClass("show-single-image-options").addClass("hide-single-image-options");	
	}	
});
 
 
});