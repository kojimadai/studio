<?php if (is_home() || is_front_page()): ?>
	<?php $front_desc_state = get_theme_mod('front_desc_state'); ?>
	<?php if($front_desc_state == 'enabled'): ?>
		<p class="desc"><?php echo get_the_excerpt(); ?></p>
	<?php elseif($front_desc_state == 'disabled'): ?>
	<?php else: ?>
		<p class="desc"><?php echo get_the_excerpt(); ?></p>
	<?php endif; ?>
<?php else: ?>
	<?php $archive_desc_state = get_theme_mod('archive_desc_state'); ?>
	<?php if($archive_desc_state == 'enabled'): ?>
		<p class="desc"><?php echo get_the_excerpt(); ?></p>
	<?php elseif($archive_desc_state == 'disabled'): ?>
	<?php else: ?>
		<p class="desc"><?php echo get_the_excerpt(); ?></p>
	<?php endif; ?>
<?php endif; ?>
