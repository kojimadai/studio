<?php
/*
Template Name: プロフィール
*/
?>
<?php get_header(); ?>
	<div id="l3" class="profile">
		<main>
			<article <?php if(get_theme_mod('post_class_state')): post_class(); endif; ?>>
				<header class="article">
					<h1 class="article" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
				</header>
				<section class="article mceContentBody">
					<?php post_share_fixed(); ?>
					<?php post_share_upper(); ?>
					<?php the_content(); ?>
					<?php post_share_under(); ?>
				</section>
				<footer class="article">
					<?php if(get_theme_mod('post_follow_state') == 'enabled'): get_template_part('template-parts/part/follow'); endif; ?>
					<?php comments_template(); ?>
					<?php get_template_part('template-parts/part/pagination'); ?>
					<?php if(get_theme_mod('post_cta_state') == 'enabled'): get_template_part('template-parts/part/cta'); endif; ?>
					<?php if(get_theme_mod('post_related_state') !== 'disabled'): get_template_part('template-parts/part/related'); endif; ?>
					<?php if(get_theme_mod('post_author_info_state','disabled') == 'enabled'): get_template_part('template-parts/part/author-info'); endif; ?>
					<?php if(get_theme_mod('post_author_posts_state','disabled') == 'enabled'): get_template_part('template-parts/part/author-posts'); endif; ?>
				</footer>
			</article>
		</main>
	</div>
<?php get_footer(); ?>
