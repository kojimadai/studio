<!DOCTYPE html>
<!-- Theme Ver. 1.7.7 -->
<!-- <?php get_template_part('template-parts/header/license'); ?> -->

<?php
$blogcard_cache = get_theme_mod('blogcard_cache');
delete_site_transient($blogcard_cache);
remove_theme_mod('blogcard_cache', "");
?>

<html <?php language_attributes(); ?> class="no-js <?php echo get_theme_mod('design'); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php global $post; setup_postdata($post) ; ?>
	<title><?php wp_title(''); ?></title>
	<meta name="description" content="<?php echo get_theme_mod('site_desc'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="canonical" href="<?php the_permalink(); ?>"/>
	<?php if(get_theme_mod('favicon_app')): ?><link rel="apple-touch-icon" href="<?php echo get_theme_mod('favicon_app'); ?>"><?php endif; ?>
	<?php if(get_theme_mod('favicon_png')): ?><link rel="icon" href="<?php echo get_theme_mod('favicon_png'); ?>"><?php endif; ?>
	<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/style.css' type='text/css' media='all'>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php get_template_part('template-parts/header/ogp'); ?>
	<?php get_template_part('template-parts/header/font'); ?>
	<?php get_template_part('template-parts/header/analytics'); ?>
	<?php echo get_theme_mod('head_meta',''); ?>
	<?php wp_head(); ?>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script>
	window.FontAwesomeConfig = {
	searchPseudoElements: true
	}
	</script>
</head>
<body <?php if(get_theme_mod('body_class_state')): body_class(); endif; ?> class="<?php echo get_theme_mod('blogcard_type','blogcard_type_d'); ?> <?php echo get_theme_mod('blogcard_clip','blogcard_clip_a'); ?>">
	<div id="l1" class="<?php echo get_theme_mod('header_position_type','static-100'); ?>">
			<header class="site">
				<div class="container">
					<?php if(get_theme_mod('header_site_desc_state') == 'enabled'): ?><p class="desc"><?php bloginfo('description'); ?></p><?php endif; ?>
					<?php get_template_part('template-parts/header/logo'); ?>
					<?php if(get_theme_mod('header_contact_state') == 'enabled'): get_template_part('template-parts/header/contact'); endif; ?>
				</div>
				<?php get_template_part('template-parts/header/nav'); ?>
			</header>

			<?php get_template_part('template-parts/header/sp-menu'); ?>
			<?php get_template_part('template-parts/header/search'); ?>

			<div id="l2">
				<?php if(get_theme_mod('news_state') == 'enabled'): get_template_part('template-parts/header/news'); endif; ?>
				<?php if(is_front_page() && !is_paged()): get_template_part('template-parts/front/main-visual'); get_template_part('template-parts/front/carousel'); get_template_part('template-parts/front/msg'); get_template_part('template-parts/front/items'); endif; ?>

				<?php if(get_theme_mod('header_position_type') == 'top'): ?>
					<?php if(is_admin_bar_showing()): ?><style>header.site {margin-top: 32px;}</style><?php endif; ?>
					<script>
					$(window).on('load resize', function(){
						var height = $('header.site').height();
						$('body').css('padding-top',height);
					});
					</script>
				<?php endif; ?>