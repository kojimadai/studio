<div id="author-posts" class="<?php echo get_theme_mod('author_posts_slider_state'); ?>">
	<h4>
		<?php if(get_theme_mod('author_posts_ttl')): echo get_theme_mod('author_posts_ttl'); else: echo 'MY NEW POSTS'; endif; ?>
		<span><?php if(get_theme_mod('author_posts_desc')): echo get_theme_mod('author_posts_desc'); else: echo 'この著者の最新記事'; endif; ?></span>
	</h4>
	<ul>
	<?php
	$author_id = get_the_author_meta('ID');
	$args = array(
	'post_type' => 'post',
	'author' => $author_id,
	'posts_per_page'=> get_theme_mod('author_posts_number','8'),
	);
	$query = new WP_Query($args); ?>
	<?php if( $query -> have_posts() ): ?>
	<?php while ($query -> have_posts()) : $query -> the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php if(get_theme_mod('author_posts_cat_state') == 'enabled'): ?><span class="cat"><?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></span><?php endif; ?>
				<?php get_template_part('template-parts/part/eyecatch'); ?>
				<?php if(get_theme_mod('author_posts_date_state') == 'enabled'): ?><time><?php the_time( 'Y.n.j' ); ?></time><?php endif; ?>
				<h5><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></h5>
			</a>
		</li>
	<?php endwhile; ?>
	</ul>
	<?php endif; wp_reset_postdata(); ?>
</div>
