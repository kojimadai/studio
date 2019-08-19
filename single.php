<?php get_header(); ?>
	<?php if( !is_user_logged_in() && !is_bot() ) { set_post_views( get_the_ID() ); } ?>
	<?php if(is_mobile()): ?>
		<div id="l3" class="single sp"><?php get_template_part('template-parts/post/sp'); ?></div>
	<?php else: ?>
		<?php $post_col = get_theme_mod('post_col','c1'); ?>
		<?php if($post_col == 'c1'): ?>
			<div id="l3" class="single c1"><?php get_template_part('template-parts/post/1col'); ?></div>
		<?php elseif($post_col == 'c2_left'): ?>
			<div id="l3" class="single c2 left"><?php get_template_part('template-parts/post/2col'); ?></div>
		<?php elseif($post_col == 'c2_right'): ?>
			<div id="l3" class="single c2 right"><?php get_template_part('template-parts/post/2col'); ?></div>
		<?php elseif($post_col == 'c3_left'): ?>
			<div id="l3" class="single c3 left"><?php get_template_part('template-parts/post/3col'); ?></div>
		<?php elseif($post_col == 'c3_center'): ?>
			<div id="l3" class="single c3 center"><?php get_template_part('template-parts/post/3col'); ?></div>
		<?php elseif($post_col == 'c3_right'): ?>
			<div id="l3" class="single c3 right"><?php get_template_part('template-parts/post/3col'); ?></div>
		<?php endif; ?>
	<?php endif; ?>
<?php get_footer(); ?>
