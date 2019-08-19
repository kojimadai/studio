<?php if (is_home() || is_front_page()): ?>
	<?php $front_date_state = get_theme_mod('front_date_state'); ?>
	<?php if($front_date_state == 'enabled'): ?>
		<time class="pubdate"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php the_time('Y.m.d'); ?></time>
	<?php elseif($front_date_state == 'disabled'): ?>
	<?php else: ?>
		<time class="pubdate"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php the_time('Y.m.d'); ?></time>
	<?php endif; ?>
<?php elseif(is_single()): ?>
	<?php $post_date_state = get_theme_mod('post_date_state'); ?>
		<?php if($post_date_state == 'enabled'): ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
		<?php if ( get_the_date('Ymd') < get_the_modified_date('Ymd') ) : ?>
		<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>"><i class="<?php echo get_theme_mod('updated_icon','fas fa-redo-alt'); ?>"></i><?php echo get_the_modified_date('Y.m.d') ?></time>
		<?php endif; ?>
	<?php elseif($post_date_state == 'pubdate'): ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
	<?php elseif($post_date_state == 'updated'): ?>
		<?php if ( get_the_date('Ymd') < get_the_modified_date('Ymd') ) : ?>
		<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>"><i class="<?php echo get_theme_mod('updated_icon','fas fa-redo-alt'); ?>"></i><?php echo get_the_modified_date('Y.m.d') ?></time>
		<?php else: ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
		<?php endif; ?>
	<?php elseif($post_date_state == 'disabled'): ?>
	<?php else: ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
		<?php if ( get_the_date('Ymd') < get_the_modified_date('Ymd') ) : ?>
		<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>"><i class="<?php echo get_theme_mod('updated_icon','fas fa-redo-alt'); ?>"></i><?php echo get_the_modified_date('Y.m.d') ?></time>
		<?php endif; ?>
	<?php endif; ?>
<?php elseif(is_page()): ?>
	<?php $page_date_state = get_theme_mod('page_date_state'); ?>
	<?php if($page_date_state == 'enabled'): ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
		<?php if ( get_the_date('Ymd') < get_the_modified_date('Ymd') ) : ?>
		<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>"><i class="<?php echo get_theme_mod('updated_icon','fas fa-redo-alt'); ?>"></i><?php echo get_the_modified_date('Y.m.d') ?></time>
		<?php endif; ?>
	<?php elseif($page_date_state == 'pubdate'): ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
	<?php elseif($page_date_state == 'updated'): ?>
		<?php if ( get_the_date('Ymd') < get_the_modified_date('Ymd') ) : ?>
		<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>"><i class="<?php echo get_theme_mod('updated_icon','fas fa-redo-alt'); ?>"></i><?php echo get_the_modified_date('Y.m.d') ?></time>
		<?php else: ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
		<?php endif; ?>
	<?php elseif($page_date_state == 'disabled'): ?>
	<?php else: ?>
		<time class="pubdate" datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php echo get_the_date('Y.m.d'); ?></time>
		<?php if ( get_the_date('Ymd') < get_the_modified_date('Ymd') ) : ?>
		<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>"><i class="<?php echo get_theme_mod('updated_icon','fas fa-redo-alt'); ?>"></i><?php echo get_the_modified_date('Y.m.d') ?></time>
		<?php endif; ?>
	<?php endif; ?>
<?php else: ?>
  <?php $archive_date_state = get_theme_mod('archive_date_state'); ?>
	<?php if($archive_date_state == 'enabled'): ?>
		<time class="pubdate"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php the_time('Y.m.d'); ?></time>
	<?php elseif($archive_date_state == 'disabled'): ?>
	<?php else: ?>
		<time class="pubdate"><i class="<?php echo get_theme_mod('pubdate_icon','fas fa-clock'); ?>"></i><?php the_time('Y.m.d'); ?></time>
	<?php endif; ?>
<?php endif; ?>
