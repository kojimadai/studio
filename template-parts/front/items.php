<?php if(get_theme_mod('front_items_state','disabled') == 'enabled'): ?>
<div id="items">
	<div class="container">
		<h2><?php echo get_theme_mod('front_items_ttl','サービス一覧'); ?></h2>
		<div class="item">
			<figure style="background-image: url(<?php echo get_theme_mod('front_items_1_img',get_bloginfo('template_directory').'/assets/images/no-img.png'); ?>)";></figure>
			<h3><?php echo get_theme_mod('front_items_1_ttl','伝わるタイトル'); ?></h3>
			<div class="desc"><?php echo get_theme_mod('front_items_1_desc','ここにわかりやすく要点をまとめた説明文を記入します。デザイン上の推奨文字数は50文字前後です。'); ?></div>
			<?php if( get_theme_mod('front_items_1_btn_txt','詳しくみる') && get_theme_mod('front_items_1_btn_url','https://appartement.in')): ?>
				<a href="<?php echo get_theme_mod('front_items_1_btn_url','https://appartement.in'); ?>" class="btn"><?php echo get_theme_mod('front_items_1_btn_txt','詳しくみる'); ?></a>
			<?php endif; ?>
		</div>
		<div class="item">
			<figure style="background-image: url(<?php echo get_theme_mod('front_items_2_img',get_bloginfo('template_directory').'/assets/images/no-img.png'); ?>)";></figure>
			<h3><?php echo get_theme_mod('front_items_2_ttl','伝わるタイトル'); ?></h3>
			<div class="desc"><?php echo get_theme_mod('front_items_2_desc','ここにわかりやすく要点をまとめた説明文を記入します。デザイン上の推奨文字数は50文字前後です。'); ?></div>
			<?php if( get_theme_mod('front_items_2_btn_txt','詳しくみる') && get_theme_mod('front_items_2_btn_url','https://appartement.in')): ?>
				<a href="<?php echo get_theme_mod('front_items_2_btn_url','https://appartement.in'); ?>" class="btn"><?php echo get_theme_mod('front_items_2_btn_txt','詳しくみる'); ?></a>
			<?php endif; ?>
		</div>
		<div class="item">
			<figure style="background-image: url(<?php echo get_theme_mod('front_items_3_img',get_bloginfo('template_directory').'/assets/images/no-img.png'); ?>)";></figure>
			<h3><?php echo get_theme_mod('front_items_3_ttl','伝わるタイトル'); ?></h3>
			<div class="desc"><?php echo get_theme_mod('front_items_3_desc','ここにわかりやすく要点をまとめた説明文を記入します。デザイン上の推奨文字数は50文字前後です。'); ?></div>
			<?php if( get_theme_mod('front_items_3_btn_txt','詳しくみる') && get_theme_mod('front_items_3_btn_url','https://appartement.in')): ?>
				<a href="<?php echo get_theme_mod('front_items_3_btn_url','https://appartement.in'); ?>" class="btn"><?php echo get_theme_mod('front_items_3_btn_txt','詳しくみる'); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>
