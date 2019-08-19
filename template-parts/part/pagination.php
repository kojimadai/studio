<div id="pagination">
	<?php $nextpost = get_adjacent_post(false, '', false); if ($nextpost) : ?>
		<a href="<?php echo get_permalink($nextpost->ID); ?>" class="prev">
			<div class="icon"><span>＜</span></div>
			<figure><?php echo get_the_post_thumbnail($nextpost->ID,'thumbnail'); ?></figure>
			<div class="title"><?php echo esc_attr($nextpost->post_title); ?></div>
		</a>
	<?php endif; ?>
	<?php $prevpost = get_adjacent_post(false, '', true); if ($prevpost) : ?>
		<a href="<?php echo get_permalink($prevpost->ID); ?>"  class="next">
			<div class="title"><?php echo esc_attr($prevpost->post_title); ?></div>
			<figure><?php echo get_the_post_thumbnail($prevpost->ID,'thumbnail'); ?></figure>
			<div class="icon"><span>＞</span></div>
		</a>
	<?php endif; ?>
</div>