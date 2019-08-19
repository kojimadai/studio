<?php if (is_home() || is_front_page()): ?>
	<?php $front_author_state = get_theme_mod('front_author_state'); ?>
	<?php if($front_author_state == 'enabled'): ?>
		<span class="author">
			<?php if(get_theme_mod('author_design','a') == 'a'): ?>
				<?php echo get_avatar(get_the_author_meta('ID'), 128 ); ?>
			<?php else: ?>
				<i class="<?php echo get_theme_mod('author_icon','fas fa-user'); ?>"></i>
			<?php endif; ?>
			<?php the_author(); ?>
		</span>
	<?php endif; ?>
<?php elseif(is_single()): ?>
	<?php $post_author_state = get_theme_mod('post_author_state'); ?>
	<?php if($post_author_state == 'enabled'): ?>
		<span class="author">
			<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
				<?php if(get_theme_mod('author_design','a') == 'a'): ?>
					<?php echo get_avatar(get_the_author_meta('ID'), 128 ); ?>
				<?php else: ?>
					<i class="<?php echo get_theme_mod('author_icon','fas fa-user'); ?>"></i>
				<?php endif; ?>
				<?php the_author(); ?>
			</a>
		</span>
	<?php endif; ?>
<?php elseif(is_page()): ?>
	<?php $page_author_state = get_theme_mod('page_author_state'); ?>
	<?php if($page_author_state == 'enabled'): ?>
		<span class="author">
			<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
				<?php if(get_theme_mod('author_design','a') == 'a'): ?>
					<?php echo get_avatar(get_the_author_meta('ID'), 128 ); ?>
				<?php else: ?>
					<i class="<?php echo get_theme_mod('author_icon','fas fa-user'); ?>"></i>
				<?php endif; ?>
				<?php the_author(); ?>
			</a>
		</span>
	<?php endif; ?>
<?php else: ?>
	<?php $archive_author_state = get_theme_mod('archive_author_state'); ?>
	<?php if($archive_author_state == 'enabled'): ?>
		<span class="author">
			<?php if(get_theme_mod('author_design','a') == 'a'): ?>
				<?php echo get_avatar(get_the_author_meta('ID'), 128 ); ?>
			<?php else: ?>
				<i class="<?php echo get_theme_mod('author_icon','fas fa-user'); ?>"></i>
			<?php endif; ?>
			<?php the_author(); ?>
		</span>
	<?php endif; ?>
<?php endif; ?>


