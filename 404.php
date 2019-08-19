<?php get_header(); ?>
	<div id="l3" class="single c1">
		<main>
			<article>
				<header class="article">
					<h1>ページが見つかりませんでした。</h1>
					<?php $not_found_img_state = get_theme_mod('not_found_img_state'); ?>
					<?php if($not_found_img_state == 'not_found_img_state_enabled'): ?>
						<?php if(get_theme_mod('not_found_img')): ?>
							<figure><img src="<?php $attachment_id = from_image_url_to_image_id(get_theme_mod('default_thumbnail')); $image_attributes = wp_get_attachment_image_src( $attachment_id,'large'); echo $image_attributes[0]; ?>"></figure>
						<?php else: ?>
							<figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.jpg"></figure>
						<?php endif; ?>
					<?php elseif($not_found_img_state == 'not_found_img_state_disabled'): ?>
					<?php else: ?>
						<?php if(get_theme_mod('not_found_img')): ?>
							<figure><img src="<?php $attachment_id = from_image_url_to_image_id(get_theme_mod('default_thumbnail')); $image_attributes = wp_get_attachment_image_src( $attachment_id,'large'); echo $image_attributes[0]; ?>"></figure>
						<?php else: ?>
							<figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.jpg"></figure>
						<?php endif; ?>
					<?php endif; ?>
				</header>
				<section class="article">
					<p>お探しのページが見つかりませんでした。下記カテゴリーから記事をお探しになるか、キーワードで検索してみてください。</p>
					<div class="search">
						<h2>キーワード検索</h2>
						<?php get_search_form(); ?>
					</div>
					<div class="category">
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
		</main>
	</div>
<?php get_footer(); ?>
