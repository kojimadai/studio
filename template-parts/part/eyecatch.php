<?php if(has_post_thumbnail()): ?>
	<figure class="eyecatch" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);"></figure>
<?php elseif(get_theme_mod('default_thumbnail')): ?>
	<figure class="eyecatch" style="background-image: url(<?php echo get_theme_mod('default_thumbnail'); ?>);"></figure>
<?php else: ?>
	<figure class="eyecatch" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/default/eyecatch.png);"></figure>
<?php endif; ?>