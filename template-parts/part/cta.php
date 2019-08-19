<div id="cta">
	<div class="container" style="background-image: url(<?php echo get_theme_mod('cta_img'); ?>);">
		<?php if(get_theme_mod('cta_ttl')): ?><h4><?php echo get_theme_mod('cta_ttl'); ?></h4><?php endif; ?>
		<?php if(get_theme_mod('cta_desc')): ?><p class="desc"><?php echo get_theme_mod('cta_desc'); ?></p><?php endif; ?>
		<?php if(get_theme_mod('cta_btn_txt') && get_theme_mod('cta_btn_url')): ?><a href="<?php echo get_theme_mod('cta_btn_url'); ?>"><?php echo get_theme_mod('cta_btn_txt'); ?></a><?php endif; ?>
	</div>
</div>
