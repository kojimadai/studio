<?php get_header(); ?>
	<?php $archive_col = get_theme_mod('archive_col'); ?>
	<?php if($archive_col == 'archive_col_1'): ?>
		<div id="l3" class="archive c1">
	<?php elseif($archive_col == 'archive_col_2_left'): ?>
		<div id="l3" class="archive c2 left">
	<?php elseif($archive_col == 'archive_col_2_right'): ?>
		<div id="l3" class="archive c2 right">
	<?php elseif($archive_col == 'archive_col_3_left'): ?>
		<div id="l3" class="archive c3 left">
	<?php elseif($archive_col == 'archive_col_3_center'): ?>
		<div id="l3" class="archive c3 center">
	<?php elseif($archive_col == 'archive_col_3_right'): ?>
		<div id="l3" class="archive c3 right">
	<?php else: ?>
		<div id="l3" class="archive c2 right">
	<?php endif; ?>
			<?php if($archive_col == 'archive_col_3_center'): ?><div id="l4"><?php endif; ?>
				<main>
					<h1 class="archive"><span>検索結果</span><?php echo esc_attr(get_search_query()); ?></h1>
					<?php get_template_part('template-parts/part/content-upper'); ?>
					<?php $archive_layout_pc = get_theme_mod('archive_layout_pc'); $archive_layout_sp = get_theme_mod('archive_layout_sp'); ?>
					<?php if(is_mobile()): ?>
						<?php if ($archive_layout_sp == 'archive_layout_sp_simple_portrait'): ?><?php get_template_part('template-parts/archive/simple-portrait'); ?>
						<?php elseif ($archive_layout_sp == 'archive_layout_sp_simple_landscape'): ?><?php get_template_part('template-parts/archive/simple-landscape'); ?>
						<?php elseif ($archive_layout_sp == 'archive_layout_sp_card_portrait'): ?><?php get_template_part('template-parts/archive/card-portrait'); ?>
						<?php elseif ($archive_layout_sp == 'archive_layout_sp_card_landscape'): ?><?php get_template_part('template-parts/archive/card-landscape'); ?>
						<?php else: ?><?php get_template_part( 'template-parts/archive/card-landscape'); ?>
						<?php endif;?>
					<?php else: ?>
						<?php if($archive_layout_pc == 'archive_layout_pc_simple_portrait'): ?><?php get_template_part('template-parts/archive/simple-portrait'); ?>
						<?php elseif($archive_layout_pc == 'archive_layout_pc_simple_landscape'): ?><?php get_template_part('template-parts/archive/simple-landscape'); ?>
						<?php elseif($archive_layout_pc == 'archive_layout_pc_card_portrait'): ?><?php get_template_part('template-parts/archive/card-portrait'); ?>
						<?php elseif($archive_layout_pc == 'archive_layout_pc_card_landscape'): ?><?php get_template_part('template-parts/archive/card-landscape'); ?>
						<?php else: ?><?php get_template_part( 'template-parts/archive/card-landscape'); ?>
						<?php endif; ?>
					<?php endif;?>
					<?php pagination(); ?>
					<?php get_template_part('template-parts/part/content-under'); ?>
				</main>
				<?php if(!($archive_col == 'archive_col_1')): ?><?php get_sidebar(); ?><?php endif; ?>
				<?php if($archive_col == 'archive_col_3_center'): ?></div><?php endif; ?>
			<?php if(($archive_col == 'archive_col_3_left') || ($archive_col == 'archive_col_3_center') || ($archive_col == 'archive_col_3_right')): get_sidebar('3col'); endif; ?>
		</div>
<?php get_footer(); ?>
