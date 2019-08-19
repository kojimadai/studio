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
	<?php endif; ?>
			<?php if($archive_col == 'c3_center'): ?><div id="l4"><?php endif; ?>
				<main class="<?php echo get_theme_mod('archive_article_hover','article-hover-opacity'); ?> <?php echo get_theme_mod('archive_article_click','article-click-none'); ?>">
					<?php if(get_theme_mod('archive_breadcrumbs_state','enabled') == 'enabled'): breadcrumb(); endif; ?>
					<?php if(is_category()): ?>
						<h1 class="archive"><span>カテゴリーアーカイブ</span><?php single_cat_title(); ?></h1>
					<?php elseif(is_tag()): ?>
						<h1 class="archive"><span>タグアーカイブ</span><?php single_tag_title(); ?></h1>
					<?php elseif(is_day()): ?>
						<h1 class="archive"><span>日付アーカイブ</span><?php the_time('l, F j, Y'); ?></h1>
					<?php elseif(is_month()): ?>
						<h1 class="archive"><span>日付アーカイブ</span><?php the_time('F Y'); ?></h1>
					<?php elseif(is_year()): ?>
						<h1 class="archive"><span>日付アーカイブ</span><?php the_time('Y'); ?></h1>
					<?php endif; ?>

					<?php if(get_theme_mod('archive_ad_content_upper','none') !== 'none'): $archive_ad_content_upper = get_theme_mod('archive_ad_content_upper'); echo '<div class="ad">'.get_theme_mod($archive_ad_content_upper).'</div>'; endif; ?>
					<?php $archive_layout_pc = get_theme_mod('archive_layout_pc','simple_portrait'); $archive_layout_sp = get_theme_mod('archive_layout_sp','simple_portrait'); ?>
					<?php if(is_mobile()): ?>
						<?php if ($archive_layout_sp == 'simple_portrait'): ?><?php get_template_part('template-parts/archive/simple-portrait'); ?>
						<?php elseif ($archive_layout_sp == 'simple_landscape'): ?><?php get_template_part('template-parts/archive/simple-landscape'); ?>
						<?php elseif ($archive_layout_sp == 'card_portrait'): ?><?php get_template_part('template-parts/archive/card-portrait'); ?>
						<?php elseif ($archive_layout_sp == 'card_landscape'): ?><?php get_template_part('template-parts/archive/card-landscape'); ?>
						<?php elseif($archive_layout_sp == 'magazine'): ?><?php get_template_part('template-parts/archive/magazine'); ?>
						<?php endif;?>
					<?php else: ?>
						<?php if($archive_layout_pc == 'simple_portrait'): ?><?php get_template_part('template-parts/archive/simple-portrait'); ?>
						<?php elseif($archive_layout_pc == 'simple_landscape'): ?><?php get_template_part('template-parts/archive/simple-landscape'); ?>
						<?php elseif($archive_layout_pc == 'card_portrait'): ?><?php get_template_part('template-parts/archive/card-portrait'); ?>
						<?php elseif($archive_layout_pc == 'card_landscape'): ?><?php get_template_part('template-parts/archive/card-landscape'); ?>
						<?php elseif($archive_layout_pc == 'magazine'): ?><?php get_template_part('template-parts/archive/magazine'); ?>
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
