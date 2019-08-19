<?php get_header(); ?>
	<?php if(is_mobile()): ?>
		<div id="l3" class="single sp"><?php get_template_part('template-parts/page/sp'); ?></div>
	<?php else: ?>
		<?php $page_col = get_theme_mod('page_col','c1'); ?>
		<?php if($page_col == 'c1'): ?>
			<div id="l3" class="single c1"><?php get_template_part('template-parts/page/1col'); ?></div>
		<?php elseif($page_col == 'c2_left'): ?>
			<div id="l3" class="single c2 left"><?php get_template_part('template-parts/page/2col'); ?></div>
		<?php elseif($page_col == 'c2_right'): ?>
			<div id="l3" class="single c2 right"><?php get_template_part('template-parts/page/2col'); ?></div>
		<?php elseif($page_col == 'c3_left'): ?>
			<div id="l3" class="single c3 left"><?php get_template_part('template-parts/page/3col'); ?></div>
		<?php elseif($page_col == 'c3_center'): ?>
			<div id="l3" class="single c3 center"><?php get_template_part('template-parts/page/3col'); ?></div>
		<?php elseif($page_col == 'c3_right'): ?>
			<div id="l3" class="single c3 right"><?php get_template_part('template-parts/page/3col'); ?></div>
		<?php endif; ?>
	<?php endif; ?>
<?php get_footer(); ?>
