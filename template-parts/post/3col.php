<div id="l4">
	<main>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article <?php if(get_theme_mod('post_class_state')): post_class(); endif; ?>>
				<?php dynamic_sidebar( 'all-title_top' ); ?>
				<header class="article">
					<?php if(get_theme_mod('post_breadcrumbs_state','enabled') == 'enabled'): breadcrumb(); endif; ?>
					<div class="entry-meta single">
						<?php get_template_part('template-parts/part/cat'); ?>
						<?php get_template_part('template-parts/part/date'); ?>
						<?php get_template_part('template-parts/part/author'); ?>
					</div>
					<h1 class="article" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

					<?php if(get_theme_mod('post_eyecatch_state','enabled') == 'enabled'): ?>
						<?php if(has_post_thumbnail()): ?>
							<figure class="eyecatch"><img src="<?php the_post_thumbnail_url('large'); ?>"></figure>
						<?php elseif(get_theme_mod('default_thumbnail')): ?>
							<figure class="eyecatch"><img src="<?php $attachment_id = from_image_url_to_image_id(get_theme_mod('default_thumbnail')); $image_attributes = wp_get_attachment_image_src( $attachment_id,'large'); echo $image_attributes[0]; ?>);"></figure>
						<?php else: ?>
							<figure class="eyecatch"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/default/eyecatch.png"></figure>
						<?php endif; ?>
					<?php endif; ?>
					
				</header>
				<section class="article mceContentBody">
					<?php post_share_fixed(); ?>
					<?php if((get_theme_mod('toc_position','h2_1st_under') == 'ttl_under') && (get_theme_mod('post_toc_state','enabled') == 'enabled')): echo '<div id="toc-wrap"><div class="ttl">'.get_theme_mod('toc_ttl','目次').'</div><div id="toc"></div></div>'; endif; ?>
					<?php if(get_theme_mod('post_ad_content_upper','none') !== 'none'): $post_ad_content_upper = get_theme_mod('post_ad_content_upper'); echo '<div class="ad">'.get_theme_mod($post_ad_content_upper).'</div>'; endif; ?>
					<?php post_share_upper(); ?>
					<?php the_content();
					wp_link_pages( array(
					'before'      => '<div class="page-links cf"><ul>',
					'after'       => '</ul></div>',
					'link_before' => '<li><span>',
					'link_after'  => '</span></li>',
					'next_or_number'   => 'next',
					'nextpagelink'     => __('次のページへ ≫'),
					'previouspagelink' => __('≪ 前のページへ'),
					) );
					?>
					<?php post_categories() ?>
					<?php post_tags(); ?>
					<?php if(get_theme_mod('post_ad_content_under','none') !== 'none'): $post_ad_content_under = get_theme_mod('post_ad_content_under'); echo '<div class="ad">'.get_theme_mod($post_ad_content_under).'</div>'; endif; ?>
					<?php post_share_under(); ?>
				</section>
				<?php get_template_part( 'template-parts/part/content-under' ); ?>
				<footer class="article">
					<?php if(is_active_sidebar('content_under')): ?><div class="content-under"><?php dynamic_sidebar('content_under'); ?></div><?php endif; ?>
					<?php if(get_theme_mod('post_follow_state') == 'enabled'): get_template_part('template-parts/part/follow'); endif; ?>
					<?php if(!get_theme_mod('post_comment_state')): ?><?php comments_template(); ?><?php endif; ?>
					<?php get_template_part('template-parts/part/pagination'); ?>
					<?php if(get_theme_mod('post_cta_state') == 'enabled'): get_template_part('template-parts/part/cta'); endif; ?>
					<?php if(get_theme_mod('post_related_state') !== 'disabled'): get_template_part('template-parts/part/related'); endif; ?>
					<?php if(get_theme_mod('post_author_info_state','disabled') == 'enabled'): get_template_part('template-parts/part/author-info'); endif; ?>
					<?php if(get_theme_mod('post_author_posts_state','disabled') == 'enabled'): get_template_part('template-parts/part/author-posts'); endif; ?>
				</footer>
		<?php endwhile; ?>
		<?php endif; ?>
	</main>
	<?php get_sidebar(); ?>
</div>
<?php get_sidebar('3col'); ?>
<?php wp_reset_query(); ?>
