<?php
$categories = get_the_category($post->ID);
$category_ID = array();
foreach($categories as $category):
array_push( $category_ID, $category -> cat_ID);
endforeach ;
$args = array(
'post__not_in' => array($post -> ID),
'posts_per_page'=> get_theme_mod('related_number','8'),
'category__in' => $category_ID,
'orderby' => 'rand',
);
$query = new WP_Query($args); ?>
<?php if( $query -> have_posts() ): ?>
	<div id="recommend" class="<?php echo get_theme_mod('related_slider_state'); ?>">
		<h4>
			<?php if(get_theme_mod('related_ttl')): ?><?php echo get_theme_mod('related_ttl'); ?><?php else: ?>RECOMMEND<?php endif; ?>
			<span><?php if(get_theme_mod('related_desc')): ?><?php echo get_theme_mod('related_desc'); ?><?php else: ?>こちらの記事も人気です。<?php endif; ?></span>
		</h4>
		<ul>
			<?php while ($query -> have_posts()) : $query -> the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php if(get_theme_mod('related_cat_state') == 'enabled'): ?><span class="cat"><?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></span><?php endif; ?>
					<?php get_template_part('template-parts/part/eyecatch'); ?>
					<?php if(get_theme_mod('related_date_state') == 'enabled'): ?><time><?php the_time( 'Y.n.j' ); ?></time><?php endif; ?>
					<h5><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></h5>
				</a>
			</li>
			<?php endwhile;?>
		</ul>
	</div>
<?php else: ?>
	<div id="recommend">
		<h4>RECOMMEND<span>こちらの記事も人気です。</span></h4>
		<p>関連記事は見つかりませんでした。</p>
	</div>
<?php endif; wp_reset_postdata(); ?>

