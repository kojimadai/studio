<meta property="og:locale" content="ja_JP">
<meta property='og:site_name' content='<?php bloginfo('name'); ?>'>
<meta name="twitter:card" content="summary_large_image" />
<?php if(get_theme_mod('twitter_id')): ?><meta name="twitter:site" content="@<?php echo get_theme_mod('twitter_id') ?>"><?php endif; ?>
<?php if(get_theme_mod('app_id')): ?><meta property="fb:app_id" content="<?php echo get_theme_mod('app_id') ?>"><?php endif; ?>
<?php if(is_single() || is_page()): ?>
	<meta property='og:type' content='article'>
	<meta property='og:title' content='<?php the_title() ?>'>
	<meta property='og:url' content='<?php the_permalink() ?>'>
	<meta property='og:description' content='<?php echo mb_substr(get_the_excerpt(), 0, 100) ?>'>
<?php else: ?>
	<meta property='og:type' content='website'>
	<meta property='og:title' content='<?php bloginfo('name') ?>'>
	<meta property='og:url' content='<?php bloginfo('url') ?>'>
	<meta property='og:description' content='<?php bloginfo('description'); ?>'>
<?php endif; ?>
<meta property="og:image" content="<?php if(is_single() || is_page()): ?><?php if(has_post_thumbnail()): ?><?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); echo $image_url[0]; ?><?php endif; ?><?php else: ?><?php if(get_theme_mod('default_tmb')): ?><?php echo get_theme_mod('default_tmb'); ?><?php endif; ?><?php endif; ?>" />
