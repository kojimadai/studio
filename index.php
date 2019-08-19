<?php get_header(); ?>
	<?php $archive_col = get_theme_mod('archive_col','c2_left'); ?>
	<?php if($archive_col == 'c1'): ?>
		<div id="l3" class="archive c1">
	<?php elseif($archive_col == 'c2_left'): ?>
		<div id="l3" class="archive c2 left">
	<?php elseif($archive_col == 'c2_right'): ?>
		<div id="l3" class="archive c2 right">
	<?php elseif($archive_col == 'c3_left'): ?>
		<div id="l3" class="archive c3 left">
	<?php elseif($archive_col == 'c3_center'): ?>
		<div id="l3" class="archive c3 center">
	<?php elseif($archive_col == 'c3_right'): ?>
		<div id="l3" class="archive c3 right">
	<?php else: ?>
		<div id="l3" class="archive c2 right">
	<?php endif; ?>
			<?php if($archive_col == 'c3_center'): ?><div id="l4"><?php endif; ?>
				<main class="<?php echo get_theme_mod('archive_article_hover','article-hover-opacity'); ?> <?php echo get_theme_mod('archive_article_click','article-click-none'); ?>">
					<?php if(get_theme_mod('archive_breadcrumbs_state','enabled') == 'enabled'): breadcrumb(); endif; ?>
					<?php if(get_theme_mod('archive_ad_content_upper','none') !== 'none'): $archive_ad_content_upper = get_theme_mod('archive_ad_content_upper'); echo '<div class="ad">'.get_theme_mod($archive_ad_content_upper).'</div>'; endif; ?>
					<?php $front_layout_pc = get_theme_mod('front_layout_pc','simple_portrait'); $front_layout_sp = get_theme_mod('front_layout_sp','simple_portrait'); ?>
					<?php if(is_mobile()): ?>
						<?php if ($front_layout_sp == 'simple_portrait'): ?><?php get_template_part('template-parts/front/simple-portrait'); ?>
						<?php elseif ($front_layout_sp == 'simple_landscape'): ?><?php get_template_part('template-parts/front/simple-landscape'); ?>
						<?php elseif ($front_layout_sp == 'card_portrait'): ?><?php get_template_part('template-parts/front/card-portrait'); ?>
						<?php elseif ($front_layout_sp == 'card_landscape'): ?><?php get_template_part('template-parts/front/card-landscape'); ?>
						<?php elseif($front_layout_sp == 'magazine'): ?><?php get_template_part('template-parts/archive/magazine'); ?>
						<?php endif;?>
					<?php else: ?>
						<?php if($front_layout_pc == 'simple_portrait'): ?><?php get_template_part('template-parts/front/simple-portrait'); ?>
						<?php elseif($front_layout_pc == 'simple_landscape'): ?><?php get_template_part('template-parts/front/simple-landscape'); ?>
						<?php elseif($front_layout_pc == 'card_portrait'): ?><?php get_template_part('template-parts/front/card-portrait'); ?>
						<?php elseif($front_layout_pc == 'card_landscape'): ?><?php get_template_part('template-parts/front/card-landscape'); ?>
						<?php elseif($front_layout_pc == 'magazine'): ?><?php get_template_part('template-parts/archive/magazine'); ?>
						<?php endif; ?>
					<?php endif;?>
					<?php pagination(); ?>
					<?php if(get_theme_mod('archive_ad_content_under','none') !== 'none'): $archive_ad_content_under = get_theme_mod('archive_ad_content_under'); echo '<div class="ad">'.get_theme_mod($archive_ad_content_under).'</div>'; endif; ?>
				</main>
				<?php if(!($archive_col == 'c1')): ?><?php get_sidebar(); ?><?php endif; ?>
				<?php if($archive_col == 'c3_center'): ?></div><?php endif; ?>
			<?php if(($archive_col == 'c3_left') || ($archive_col == 'c3_center') || ($archive_col == 'c3_right')): get_sidebar('3col'); endif; ?>
		</div>
<?php get_footer(); ?>
