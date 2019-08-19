<div id="logo" class="<?php echo get_theme_mod('header_logo_position','center'); ?>">
	<?php if ( is_home() || is_front_page() ): ?>
		<?php if((get_theme_mod('header_logo_type','txt_ja') == 'img') && (get_theme_mod('site_logo_img'))): ?>
			<h1 class="header"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_theme_mod( 'site_logo_img' ); ?>" alt="<?php bloginfo('name'); ?>"></a></h1>
		<?php else: ?>
			<h1><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
		<?php endif; ?>
	<?php else: ?>
		<?php if((get_theme_mod('header_logo_type','txt_ja') == 'img') && (get_theme_mod('site_logo_img'))): ?>
			<div><a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_mod( 'site_logo_img' ); ?>" alt="<?php bloginfo('name'); ?>"></a></div>
		<?php else: ?>
			<div><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
		<?php endif; ?>
	<?php endif; ?>
</div>
