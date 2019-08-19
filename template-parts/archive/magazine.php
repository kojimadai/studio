<div id="magazine" class="list">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="item" role="article">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="article">
				<?php if(has_post_thumbnail()): ?>
					<figure class="eyecatch"><img src="<?php the_post_thumbnail_url('medium'); ?>"></figure>
				<?php elseif(get_theme_mod('default_thumbnail')): ?>
					<figure class="eyecatch"><img src="<?php $attachment_id = from_image_url_to_image_id(get_theme_mod('default_thumbnail')); $image_attributes = wp_get_attachment_image_src( $attachment_id,'large'); echo $image_attributes[0]; ?>);"></figure>
				<?php else: ?>
					<figure class="eyecatch"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/default/eyecatch.png"></figure>
				<?php endif; ?>
				<section class="article">
					<h2 class="entry-title"><?php new_mark(); ?><?php the_title(); ?></h2>
					<div class="entry-meta">
						<?php get_template_part('template-parts/part/date'); ?>
						<?php get_template_part('template-parts/part/author'); ?>
					</div>
					<?php get_template_part('template-parts/part/desc'); ?>
				</section>
			</a>
			<?php get_template_part('template-parts/part/cat'); ?>
		</article>
	<?php endwhile; ?>
	<?php elseif(is_search()): ?>
		<article id="post-not-found">
			<header class="article-header">
				<h1>記事が見つかりませんでした。</h1>
			</header>
			<section class="article">
				<p>お探しのキーワードで記事が見つかりませんでした。別のキーワードで再度お探しいただくか、カテゴリ一覧からお探し下さい。</p>
				<div class="search">
					<h2>キーワード検索</h2>
					<?php get_search_form(); ?>
				</div>
				<div class="cat-list cf">
					<h2>カテゴリーから探す</h2>
					<ul>
					<?php $args = array(
					'title_li' => '',
					); ?>
					<?php wp_list_categories($args); ?>
					</ul>
				</div>
			</section>
		</article>
	<?php else: ?>
    <article id="post-not-found">
      <header class="article-header">
        <h1>まだ投稿がありません！</h1>
      </header>
      <section class="article">
        <p>表示する記事がまだありません。</p>
      </section>
    </article>
	<?php endif; ?>
</div>

<script type="text/javascript">
var $container = $('#magazine');
jQuery(function( $ ) {
	$container.imagesLoaded(function(){
		$('#magazine').masonry({
		  itemSelector: '.item'
		});
	});
});
</script>