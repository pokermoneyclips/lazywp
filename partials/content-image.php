<?php $image = wp_get_attachment_image($post_ID, 'full'); // Create the image ?>	
<figure class="image-wrapper">
	<?php
		echo $image;
		if($post_caption) {
			echo '<figcaption class="image-caption">' . $post_caption . '</figcaption>';
		}
	?>
</figure>