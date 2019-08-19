<?php $cat = get_the_category();$cat = $cat[0]; ?>
<?php if(is_home() || is_front_page()): ?>
	<?php $front_cat_state = get_theme_mod('front_cat_state','enabled'); ?>
	<?php if($front_cat_state == 'enabled'): ?>
		<?php $category = get_the_category(); if($category[0] ) { echo '<a class="cat ' . get_theme_mod('cat_design','square') . " " . get_theme_mod('cat_type','sticker') . '" href="' . get_category_link( $category[0]->term_id ) . '">' . '<i class="' . get_theme_mod('cat_icon','fas fa-inbox') . '"></i>' . $category[0]->cat_name . '</a>';}?>
	<?php elseif($front_cat_state == 'disabled'): ?>
	<?php else: ?>
		<?php $category = get_the_category(); if($category[0] ) { echo '<a class="cat ' . get_theme_mod('cat_design','square') . " " . get_theme_mod('cat_type','sticker') . '" href="' . get_category_link( $category[0]->term_id ) . '">' . '<i class="' . get_theme_mod('cat_icon','fas fa-inbox') . '"></i>' . $category[0]->cat_name . '</a>';}?>
	<?php endif; ?>
<?php elseif(is_single()): ?>
	<?php $post_cat_state = get_theme_mod('post_cat_state','enabled'); ?>
	<?php if($post_cat_state == 'enabled'): ?>
		<?php $category = get_the_category(); if($category[0] ) { echo '<a class="cat ' . get_theme_mod('cat_design','square') . " " . get_theme_mod('cat_type','sticker') . '" href="' . get_category_link( $category[0]->term_id ) . '">' . '<i class="' . get_theme_mod('cat_icon','fas fa-inbox') . '"></i>' . $category[0]->cat_name . '</a>';}?>
	<?php elseif($post_cat_state == 'disabled'): ?>
	<?php else: ?>
		<?php $category = get_the_category(); if($category[0] ) { echo '<a class="cat ' . get_theme_mod('cat_design','square') . " " . get_theme_mod('cat_type','sticker') . '" href="' . get_category_link( $category[0]->term_id ) . '">' . '<i class="' . get_theme_mod('cat_icon','fas fa-inbox') . '"></i>' . $category[0]->cat_name . '</a>';}?>
	<?php endif; ?>
<?php else: ?>
	<?php $archive_cat_state = get_theme_mod('archive_cat_state','enabled'); ?>
	<?php if($archive_cat_state == 'enabled'): ?>
		<?php $category = get_the_category(); if($category[0] ) { echo '<a class="cat ' . get_theme_mod('cat_design','square') . " " . get_theme_mod('cat_type','sticker') . '" href="' . get_category_link( $category[0]->term_id ) . '">' . '<i class="' . get_theme_mod('cat_icon','fas fa-inbox') . '"></i>' . $category[0]->cat_name . '</a>';}?>
	<?php elseif($archive_cat_state == 'disabled'): ?>
	<?php else: ?>
		<?php $category = get_the_category(); if($category[0] ) { echo '<a class="cat ' . get_theme_mod('cat_design','square') . " " . get_theme_mod('cat_type','sticker') . '" href="' . get_category_link( $category[0]->term_id ) . '">' . '<i class="' . get_theme_mod('cat_icon','fas fa-inbox') . '"></i>' . $category[0]->cat_name . '</a>';}?>
	<?php endif; ?>
<?php endif; ?>


