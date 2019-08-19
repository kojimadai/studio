<?php $front_main_visual_state = get_theme_mod('front_main_visual_state','disabled'); ?>
<?php if($front_main_visual_state == 'enabled'): ?><!--表示ならば-->
	<div id="main-visual" class="main-visual-slider">
	<?php $front_main_visual_type = get_theme_mod('front_main_visual_type','a'); ?>
	<?php if($front_main_visual_type == 'c'): ?><!--タイプCならば-->
		<?php if(get_theme_mod('front_main_visual_img')): ?>
			<div class="type-c">
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
			<div class="type-b" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img');?>);">
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
			<div class="type-a" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img');?>);">
				<?php if((get_theme_mod('front_main_visual_ttl')) || (get_theme_mod('front_main_visual_desc')) || ((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc'); ?></div><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt')) && (get_theme_mod('front_main_visual_btn_url'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if(get_theme_mod('front_main_visual_img_2')): ?>
			<div class="type-a" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img_2');?>);">
				<?php if((get_theme_mod('front_main_visual_ttl_2')) || (get_theme_mod('front_main_visual_desc_2')) || ((get_theme_mod('front_main_visual_btn_txt_2')) && (get_theme_mod('front_main_visual_btn_url_2')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl_2')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl_2'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc_2')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc_2'); ?></div><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt_2')) && (get_theme_mod('front_main_visual_btn_url_2'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url_2'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt_2'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if(get_theme_mod('front_main_visual_img_3')): ?>
			<div class="type-a" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img_3');?>);">
				<?php if((get_theme_mod('front_main_visual_ttl_3')) || (get_theme_mod('front_main_visual_desc_3')) || ((get_theme_mod('front_main_visual_btn_txt_3')) && (get_theme_mod('front_main_visual_btn_url_3')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl_3')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl_3'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc_3')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc_3'); ?></div><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt_3')) && (get_theme_mod('front_main_visual_btn_url_3'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url_3'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt_3'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if(get_theme_mod('front_main_visual_img_4')): ?>
			<div class="type-a" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img_4');?>);">
				<?php if((get_theme_mod('front_main_visual_ttl_4')) || (get_theme_mod('front_main_visual_desc_4')) || ((get_theme_mod('front_main_visual_btn_txt_4')) && (get_theme_mod('front_main_visual_btn_url_4')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl_4')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl_4'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc_4')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc_4'); ?></div><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt_4')) && (get_theme_mod('front_main_visual_btn_url_4'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url_4'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt_4'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if(get_theme_mod('front_main_visual_img_5')): ?>
			<div class="type-a" style="background-image: url(<?php echo get_theme_mod('front_main_visual_img_5');?>);">
				<?php if((get_theme_mod('front_main_visual_ttl_5')) || (get_theme_mod('front_main_visual_desc_5')) || ((get_theme_mod('front_main_visual_btn_txt_5')) && (get_theme_mod('front_main_visual_btn_url_5')))): ?>
					<div class="catchcopy">
						<?php if(get_theme_mod('front_main_visual_ttl_5')): ?><h2><?php echo get_theme_mod('front_main_visual_ttl_5'); ?></h2><?php endif; ?>
						<?php if(get_theme_mod('front_main_visual_desc_5')): ?><div class="desc"><?php echo get_theme_mod('front_main_visual_desc_5'); ?></div><?php endif; ?>
						<?php if((get_theme_mod('front_main_visual_btn_txt_5')) && (get_theme_mod('front_main_visual_btn_url_5'))): ?><a href="<?php echo get_theme_mod('front_main_visual_btn_url_5'); ?>" class="color-main-bg color-menu ripple"><?php echo get_theme_mod('front_main_visual_btn_txt_5'); ?></a><?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>



	<?php endif; ?>
	</div>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function(){
$('.main-visual-slider').slick({
arrows: false,
autoplay:true,
fade:true,
});
});
</script>
