<div id="author-info">
	<h4>
		<?php if(get_theme_mod('author_info_ttl')): echo get_theme_mod('author_info_ttl'); else: echo 'AUTHOR'; endif; ?>
		<span><?php if(get_theme_mod('author_info_desc')): echo get_theme_mod('author_info_desc'); else: echo 'この記事をかいた著者'; endif; ?></span>
	</h4>
		<?php if(get_theme_mod('author_info_avatar_state','enabled') == 'enabled'): echo get_avatar(get_the_author_meta('ID'), 150); endif; ?>
		<div class="name"><?php the_author_posts_link(); ?></div>
		<p class="desc"><?php the_author_meta("description" ); ?></p>
		<ul>
			<?php if(get_the_author_meta('user_url')) : ?><li><a href="<?php the_author_meta('user_url'); ?>" target="_blank"><i class="fa fa-globe"></i>WebSite</a></li><?php endif ;?>
			<?php if(get_the_author_meta('twitter')) : ?><li><a href="<?php the_author_meta('twitter'); ?>" rel="nofollow" target="_blank"><i class="fab fa-twitter"></i>Twitter</a></li><?php endif ;?>
			<?php if(get_the_author_meta('facebook')) : ?><li><a href="<?php the_author_meta('facebook'); ?>" rel="nofollow" target="_blank"><i class="fab fa-facebook-f"></i>Facebook</a></li><?php endif ;?>
			<?php if(get_the_author_meta('instagram')) : ?><li><a href="<?php the_author_meta('instagram'); ?>" rel="nofollow" target="_blank"><i class="fab fa-instagram"></i>Instagram</a></li><?php endif ;?>
			<?php if(get_the_author_meta('googleplus')) : ?><li><a href="<?php the_author_meta('googleplus'); ?>" rel="nofollow" target="_blank"><i class="fab fa-google-plus-g"></i>Google+</a></li><?php endif ;?>
		</ul>
</div>
