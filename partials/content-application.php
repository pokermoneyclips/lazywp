<?php $doc_type = strrchr($post_guid, '.'); ?>
<span class="application-wrap">
	<a class="application-link" href="<?php echo $post_guid; ?>"><?php the_title(); echo $doc_type; ?></a>
</span>