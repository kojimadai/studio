<main>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php if(get_theme_mod('post_class_state')): post_class(); endif; ?>>
			<?php if(!is_front_page()): ?>
				<?php if(has_post_thumbnail()): ?>
					<header class="article" style="background-image: url(<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); echo $image_url[0]; ?>);">
				<?php elseif(get_theme_mod('default_thumbnail')): ?>
					<header class="article" style="background-image: url(<?php echo get_theme_mod('default_thumbnail'); ?>);">
				<?php else: ?>
					<header class="article" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/default/eyecatch.png);">
				<?php endif; ?>
					<?php if(get_theme_mod('page_breadcrumbs_state','enabled') == 'enabled'): breadcrumb(); endif; ?>
					<div class="entry-meta single <?php echo get_theme_mod('page_eyecatch_1col_height','h10'); ?>">
						<?php get_template_part('template-parts/part/date'); ?>
						<?php get_template_part('template-parts/part/author'); ?>
					</div>
					<h1 class="article <?php echo get_theme_mod('page_eyecatch_1col_height','h10'); ?>" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
				</header>
			<?php endif; ?>
			<section class="article mceContentBody">
				<?php post_share_fixed(); ?>
				<?php if((get_theme_mod('toc_position','h2_1st_under') == 'ttl_under') && (get_theme_mod('page_toc_state','enabled') == 'enabled')): echo '<div id="toc-wrap"><div class="ttl">'.get_theme_mod('toc_ttl','目次').'</div><div id="toc"></div></div>'; endif; ?>
				<?php if(get_theme_mod('page_ad_content_upper','none') !== 'none'): $page_ad_content_upper = get_theme_mod('page_ad_content_upper'); echo '<div class="ad">'.get_theme_mod($page_ad_content_upper).'</div>'; endif; ?>
				<?php page_share_upper(); ?>
				<?php the_content(); ?>
				<?php if(get_theme_mod('page_ad_content_under','none') !== 'none'): $page_ad_content_under = get_theme_mod('page_ad_content_under'); echo '<div class="ad">'.get_theme_mod($page_ad_content_under).'</div>'; endif; ?>
				<?php page_share_under(); ?>
			</section>
			<footer class="article">
				<?php if(get_theme_mod('page_follow_state') == 'enabled'): get_template_part('template-parts/part/follow'); endif; ?>
				<?php comments_template(); ?>
				<?php if(get_theme_mod('page_cta_state') == 'enabled'): get_template_part('template-parts/part/cta'); endif; ?>
				<?php if(get_theme_mod('page_author_info_state','disabled') == 'enabled'): get_template_part('template-parts/part/author-info'); endif; ?>
				<?php if(get_theme_mod('page_author_posts_state','disabled') == 'enabled'): get_template_part('template-parts/part/author-posts'); endif; ?>
			</footer>
		</article>
	<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php wp_reset_query(); ?>
