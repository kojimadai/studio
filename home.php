<?php get_header(); ?>
	<?php $front_col = get_theme_mod('front_col','c2_left'); ?>
	<?php if($front_col == 'c1'): ?>
		<div id="l3" class="archive c1">
	<?php elseif($front_col == 'c2_left'): ?>
		<div id="l3" class="archive c2 left">
	<?php elseif($front_col == 'c2_right'): ?>
		<div id="l3" class="archive c2 right">
	<?php elseif($front_col == 'c3_left'): ?>
		<div id="l3" class="archive c3 left">
	<?php elseif($front_col == 'c3_center'): ?>
		<div id="l3" class="archive c3 center">
	<?php elseif($front_col == 'c3_right'): ?>
		<div id="l3" class="archive c3 right">
	<?php else: ?>
		<div id="l3" class="archive c2 right">
	<?php endif; ?>
			<?php if($front_col == 'c3_center'): ?><div id="l4"><?php endif; ?>
				<main class="<?php echo get_theme_mod('front_article_hover','article-hover-opacity'); ?> <?php echo get_theme_mod('front_article_click','article-click-none'); ?>">
					<?php if(get_theme_mod('front_ad_content_upper','none') !== 'none'): $front_ad_content_upper = get_theme_mod('front_ad_content_upper'); echo '<div class="ad">'.get_theme_mod($front_ad_content_upper).'</div>'; endif; ?>
					<?php $front_layout_pc = get_theme_mod('front_layout_pc','simple_portrait'); $front_layout_sp = get_theme_mod('front_layout_sp','simple_portrait'); ?>
					<?php if(is_mobile()): ?>
						<?php if ($front_layout_sp == 'simple_portrait'): ?><?php get_template_part('template-parts/archive/simple-portrait'); ?>
						<?php elseif ($front_layout_sp == 'simple_landscape'): ?><?php get_template_part('template-parts/archive/simple-landscape'); ?>
						<?php elseif ($front_layout_sp == 'card_portrait'): ?><?php get_template_part('template-parts/archive/card-portrait'); ?>
						<?php elseif ($front_layout_sp == 'card_landscape'): ?><?php get_template_part('template-parts/archive/card-landscape'); ?>
						<?php elseif($front_layout_sp == 'magazine'): ?><?php get_template_part('template-parts/archive/magazine'); ?>
						<?php endif;?>
					<?php else: ?>
						<?php if($front_layout_pc == 'simple_portrait'): ?><?php get_template_part('template-parts/archive/simple-portrait'); ?>
						<?php elseif($front_layout_pc == 'simple_landscape'): ?><?php get_template_part('template-parts/archive/simple-landscape'); ?>
						<?php elseif($front_layout_pc == 'card_portrait'): ?><?php get_template_part('template-parts/archive/card-portrait'); ?>
						<?php elseif($front_layout_pc == 'card_landscape'): ?><?php get_template_part('template-parts/archive/card-landscape'); ?>
						<?php elseif($front_layout_pc == 'magazine'): ?><?php get_template_part('template-parts/archive/magazine'); ?>
						<?php endif; ?>
					<?php endif;?>
					<?php pagination(); ?>
					<?php if(get_theme_mod('front_ad_content_under','none') !== 'none'): $front_ad_content_under = get_theme_mod('front_ad_content_under'); echo '<div class="ad">'.get_theme_mod($front_ad_content_under).'</div>'; endif; ?>
				</main>
				<?php if(!($front_col == 'c1')): ?><?php get_sidebar(); ?><?php endif; ?>
				<?php if($front_col == 'c3_center'): ?></div><?php endif; ?>
			<?php if(($front_col == 'c3_left') || ($front_col == 'c3_center') || ($front_col == 'c3_right')): get_sidebar('3col'); endif; ?>
		</div>
<?php get_footer(); ?>
