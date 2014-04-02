<div class="social-share-title"><h4>Share on social media</h4></div>
<div class="social-share"><!-- 
share on Facebook 
	--><a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on Facebook">b</a><!--  
	tweet on Twitter 
	--><a rel="nofollow" href="http://twitter.com/home?status=<?php echo urlencode("Currently reading: "); ?><?php the_permalink(); ?>" title="Share this article with your Twitter followers">a</a><!--  
	submit to StumbleUpon
	--><a rel="nofollow" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post at StumbleUpon">E</a><!--  
	bookmark on Delicious
	--><a rel="nofollow" href="http://delicious.com/post?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(get_the_title($id)); ?>" title="Bookmark this post at Delicious">I</a><!--  
	submit to Digg 
	--><a rel="nofollow" href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>" title="Submit this post to Digg">F</a>
</div>