<?php $front_main_visual_state = get_theme_mod('front_main_visual_state'); ?>
<?php if($front_main_visual_state == 'enabled'): ?><!--表示ならば-->
	<?php $front_main_visual_type = get_theme_mod('front_main_visual_type'); ?>
	<?php if($front_main_visual_type == 'c'): ?><!--タイプCならば-->
		<?php if(get_theme_mod('front_main_visual_img')): ?>
			<div id="main-visual" class="type-c">
				<figure style="background-image: url(<?php echo get_theme_mod('front_main_visual_img');?>);"></figure>
				<?php if((get_theme_mod('front_main_visual_ttl')) || (get_theme_mod('front_main_visual_desc')) || ((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc'); ?></div><?php else: ?><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php elseif($front_main_visual_type == 'b'): ?><!--タイプBならば-->
		<?php if(get_theme_mod('front_main_visual_img')): ?>
			<div id="main-visual" class="type-b" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img');?>);">
				<?php if((get_theme_mod('front_main_visual_ttl')) || (get_theme_mod('front_main_visual_desc')) || ((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc'); ?></div><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php else: ?><!--それ以外ならば-->
		<?php if(get_theme_mod('front_main_visual_img')): ?>
			<div id="main-visual" class="type-a" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img');?>);">
				<?php if((get_theme_mod('front_main_visual_ttl')) || (get_theme_mod('front_main_visual_desc')) || ((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc'); ?></div><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php else: ?><!--非表示もしくは未選択ならば-->
<?php endif; ?>
