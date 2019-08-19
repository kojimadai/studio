<?php
function theme_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => __( 'サイドバー（2カラム用・3カラム用）', 'bloco' ),
		'description' => __( 'レイアウト設定が2カラムもしくは3カラムのときに表示されるサイトバーです。', 'bloco' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'id' => 'sidebar_right',
		'name' => __( 'サイドバー（3カラム用）', 'bloco' ),
		'description' => __( 'レイアウト設定が3カラムのときに表示されるサイトバーです。', 'bloco' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));	
/*
	register_sidebar(array(
		'id' => 'sidebar_fixed',
		'name' => __( '追尾サイドバー', 'bloco' ),
		'description' => __( 'サイドバーの下部に追尾型のウィジェットを設置できます。', 'bloco' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'id' => 'sp_menu',
		'name' => __( 'ハンバーガーメニュー', 'bloco' ),
		'description' => __( 'スマートフォンのヘッダー部分のハンバーガーボタン（menu）を押したときに表示されるウィジェット', 'bloco' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
*/
	register_sidebar(array(
		'id' => 'footer_left',
		'name' => 'フッター（左）',
		'description' => 'フッターの左端',
		'before_widget' => '<div id="%1$s" class="widget footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'id' => 'footer_center',
		'name' => 'フッター（中央）',
		'description' => 'フッターの中央',
		'before_widget' => '<div id="%1$s" class="widget footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'id' => 'footer_right',
		'name' => 'フッター（右）',
		'description' => 'フッターの右端',
		'before_widget' => '<div id="%1$s" class="widget footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'id' => 'footer_all',
		'name' => 'フッター（横一列）',
		'description' => 'フッターの横一列',
		'before_widget' => '<div id="%1$s" class="widget footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'id' => 'content_under',
		'name' => 'コンテンツの下',
		'description' => '投稿ページのコンテンツの下',
		'before_widget' => '<div id="%1$s" class="widget content-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
/*
	register_sidebar(array(
		'id' => 'footer_sp',
		'name' => __( 'スマホ用フッター', 'bloco' ),
		'description' => __( 'スマートフォン用のフッターウィジェットです。通常はパソコン用で設定したフッターウィジェットが表示されますが、こちらのスマートフォン用を設定した場合は、こちらで置き換えられます。', 'bloco' ),
		'before_widget' => '<div id="%1$s" class="widget footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
	));
*/
}


//ウィジェット内でショートコードを使用可能に
add_filter('widget_text', 'do_shortcode');


// カテゴリの投稿数をaタグの中に
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\b\d{1,3}(,\d{3})*\b)\)/',' <span class="count">($1)</span></a>',$output);
  return $output;
}

// アーカイブの投稿数をaタグの中に
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
  return $output;
}



//画像付き新着記事ウィジェット追加
class New_Post_With_Image extends WP_Widget {
function __construct() {
parent::__construct(
'new_post_with_image',
'最新の記事（画像あり）',
array( 'description' => '最新の記事を画像つきで表示' )
);
}

function form($instance) {
$new_posts_with_image_title = esc_attr($instance['new_posts_with_image_title']);
$new_posts_with_image_number = esc_attr($instance['new_posts_with_image_number']);
?>
<p>
	<label for="<?php echo $this->get_field_id('new_posts_with_image_title'); ?>">タイトル</label>
	<input class="widefat" id="<?php echo $this->get_field_id('new_posts_with_image_title'); ?>" name="<?php echo $this->get_field_name('new_posts_with_image_title'); ?>" type="text" value="<?php echo $new_posts_with_image_title; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('new_posts_with_image_number'); ?>">表示数（半角数字）</label>
	<input class="widefat" id="<?php echo $this->get_field_id('new_posts_with_image_number'); ?>" name="<?php echo $this->get_field_name('new_posts_with_image_number'); ?>" type="text" value="<?php echo $new_posts_with_image_number; ?>">
</p>
<?php $new_posts_with_image_time_state = $instance['new_posts_with_image_time_state'] ? 'checked="checked"' : ''; ?>
<p>
	<input class="checkbox" type="checkbox" <?php echo $new_posts_with_image_time_state; ?> id="<?php echo $this->get_field_id('new_posts_with_image_time_state'); ?>" name="<?php echo $this->get_field_name('new_posts_with_image_time_state'); ?>" />
	<label for="<?php echo $this->get_field_id('new_posts_with_image_time_state'); ?>">投稿日を表示</label>
</p>
<?php $new_posts_with_image_category_state = $instance['new_posts_with_image_category_state'] ? 'checked="checked"' : ''; ?>
<p>
	<input class="checkbox" type="checkbox" <?php echo $new_posts_with_image_category_state; ?> id="<?php echo $this->get_field_id('new_posts_with_image_category_state'); ?>" name="<?php echo $this->get_field_name('new_posts_with_image_category_state'); ?>" />
	<label for="<?php echo $this->get_field_id('new_posts_with_image_category_state'); ?>">カテゴリーを表示</label>
</p>
<?php
}

function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['new_posts_with_image_title'] = strip_tags($new_instance['new_posts_with_image_title']);
$instance['new_posts_with_image_number'] = is_numeric($new_instance['new_posts_with_image_number']) ? $new_instance['new_posts_with_image_number'] : 5;
$instance['new_posts_with_image_time_state'] = $new_instance['new_posts_with_image_time_state'] ? 1 : 0;
$instance['new_posts_with_image_category_state'] = $new_instance['new_posts_with_image_category_state'] ? 1 : 0;
return $instance;
}

function widget($args, $instance) {
extract($args);
echo $before_widget;
$new_posts_with_image_title = apply_filters( 'widget_title', $instance['new_posts_with_image_title'] );
$new_posts_with_image_number = !empty($instance['new_posts_with_image_number']) ? $instance['new_posts_with_image_number'] : get_option('new_posts_with_image_number');
$new_posts_with_image_time_state = ! empty($instance['new_posts_with_image_time_state']) ? '1' : '0';
$new_posts_with_image_category_state = ! empty($instance['new_posts_with_image_category_state']) ? '1' : '0';
?>
<h4 class="widgettitle"><span><?php if ($new_posts_with_image_title) {
echo $new_posts_with_image_title;
} else {
echo '最近の投稿';
}
?></span></h4>
<ul>
	<?php query_posts('posts_per_page='.$new_posts_with_image_number); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<figure><?php if( has_post_thumbnail() ): ?><?php the_post_thumbnail('medium'); ?><?php endif; ?></figure>
				<div class="about">
					<?php if ($new_posts_with_image_category_state): ?>
					<span class="category"><?php if( has_category() ): ?><?php $postcat=get_the_category(); echo $postcat[0]->name; ?><?php endif; ?></span>
					<?php else: ?>
					<?php endif; ?>
					<h5><?php the_title(); ?></h5>
					<?php if ($new_posts_with_image_time_state): ?>
					<time class="pubdate"><?php the_time('Y.m.d'); ?></time>
					<?php else: ?>
					<?php endif; ?>
				</div>
			</a>
		</li>
	<?php endwhile; ?>
	<?php else: ?>
		<p>新着記事はありません。</p>
	<? endif; ?>
	<?php wp_reset_query(); ?>
</ul>
<?php echo $after_widget;
}
}
register_widget('New_Post_With_Image');


//翻訳ウィジェット
class Widget_Translation extends WP_Widget {
	function __construct() {
	parent::__construct(
	'widget_translation',
	'Google翻訳',
	array( 'description' => 'Google翻訳機能を追加できます。', )
	);
	}

	function form($instance) {
	$widget_translation_title = esc_attr($instance['widget_translation_title']);
	?>
	<p>
		<label for="<?php echo $this->get_field_id('widget_translation_title'); ?>">タイトル</label>
		<input class="widefat" id="<?php echo $this->get_field_id('widget_translation_title'); ?>" name="<?php echo $this->get_field_name('widget_translation_title'); ?>" type="text" value="<?php echo $widget_translation_title; ?>">
	</p>
	<?php
	}

	function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['widget_translation_title'] = strip_tags($new_instance['widget_translation_title']);
	return $instance;
	}

	function widget($args, $instance) {
	extract($args);
	echo $before_widget;
	$widget_translation_title = apply_filters('widget_title', $instance['widget_translation_title'] );
	?>
	<h4 class="widgettitle"><span><?php if ($widget_translation_title) {
	echo $widget_translation_title;
	} else {
	echo 'Translation';
	}
	?></span></h4>
	<?php echo "<div id='google_translate_element'></div></div><script type='text/javascript'>
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'ja', autoDisplay: false}, 'google_translate_element');
	}
	</script><script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>";
		}
	}
register_widget('Widget_Translation');


//プロフィールウィジェット
//参考URL：http://liginc.co.jp/web/wp/112370
class Widget_Author_Info extends WP_Widget {
	function __construct() {
	parent::__construct(
	'widget_author_info',
	'著者プロフィール',
	array( 'description' => '投稿ページと固定ページのみ著者のプロフィールを表示します。', )
	);
	}
	public function widget( $args, $instance ) {
	if(is_single()) {
		echo "<div id='widget-author-info'>";
		echo get_avatar(get_the_author_meta('ID'), 150);
		echo "<div class='name'>";
		echo the_author_posts_link();
		echo "</div>";
		echo "<div class='position'>";
		echo get_the_author_meta('position');
		echo "</div>";
		echo "<p class='desc'>";
		echo the_author_meta("description");
		echo "</p>";
		echo "<ul>";
		if(get_the_author_meta('user_url')) {
			echo "<li><a href='".get_the_author_meta('user_url')."' target='_blank'><i class='fa fa-globe'></i></a></li>";
		}
		if(get_the_author_meta('twitter')) {
			echo "<li><a href='".get_the_author_meta('twitter')."' rel='nofollow' target='_blank'><i class='fab fa-twitter'></i></a></li>";
		}
		if(get_the_author_meta('facebook')) {
			echo "<li><a href='".get_the_author_meta('facebook')."' rel='nofollow' target='_blank'><i class='fab fa-facebook-f'></i></a></li>";
		}
		if(get_the_author_meta('instagram')) {
			echo "<li><a href='".get_the_author_meta('instagram')."' rel='nofollow' target='_blank'><i class='fab fa-instagram'></i></a></li>";
		}
		if(get_the_author_meta('googleplus')) {
			echo "<li><a href='".get_the_author_meta('googleplus')."' rel='nofollow' target='_blank'><i class='fab fa-google-plus-g'></i></a></li>";
		}
		echo "</ul></div>";
	}
	}
}
register_widget('Widget_Author_Info');



//プラグインなしで画像付きの人気記事をWordPressのウィジェットに追加
//参考URL：https://plusers.net/wordpress_popular_posts
class Popular_Posts extends WP_Widget {
function __construct() {
parent::__construct(
'popular_posts',
'人気記事',
array( 'description' => 'アクセス数の多い順で人気記事を表示' )
);
}

function form($instance) {
$popular_posts_title = esc_attr($instance['popular_posts_title']);
$popular_posts_number = esc_attr($instance['popular_posts_number']);
?>
<p>
	<label for="<?php echo $this->get_field_id('popular_posts_title'); ?>">タイトル</label>
	<input class="widefat" id="<?php echo $this->get_field_id('popular_posts_title'); ?>" name="<?php echo $this->get_field_name('popular_posts_title'); ?>" type="text" value="<?php echo $popular_posts_title; ?>">
</p>
<p>
	<label for="<?php echo $this->get_field_id('popular_posts_number'); ?>">表示数（半角数字）</label>
	<input class="widefat" id="<?php echo $this->get_field_id('popular_posts_number'); ?>" name="<?php echo $this->get_field_name('popular_posts_number'); ?>" type="text" value="<?php echo $popular_posts_number; ?>" size="3">
</p>
<?php $popular_posts_time_state = $instance['popular_posts_time_state'] ? 'checked="checked"' : ''; ?>
<p>
	<input class="checkbox" type="checkbox" <?php echo $popular_posts_time_state; ?> id="<?php echo $this->get_field_id('popular_posts_time_state'); ?>" name="<?php echo $this->get_field_name('popular_posts_time_state'); ?>" />
	<label for="<?php echo $this->get_field_id('popular_posts_time_state'); ?>">投稿日を表示</label>
</p>
<?php $popular_posts_category_state = $instance['popular_posts_category_state'] ? 'checked="checked"' : ''; ?>
<p>
	<input class="checkbox" type="checkbox" <?php echo $popular_posts_category_state; ?> id="<?php echo $this->get_field_id('popular_posts_category_state'); ?>" name="<?php echo $this->get_field_name('popular_posts_category_state'); ?>" />
	<label for="<?php echo $this->get_field_id('popular_posts_category_state'); ?>">カテゴリーを表示</label>
</p>
<?php $popular_posts_view_state = $instance['popular_posts_view_state'] ? 'checked="checked"' : ''; ?>
<p>
	<input class="checkbox" type="checkbox" <?php echo $popular_posts_view_state; ?> id="<?php echo $this->get_field_id('popular_posts_view_state'); ?>" name="<?php echo $this->get_field_name('popular_posts_view_state'); ?>" />
	<label for="<?php echo $this->get_field_id('popular_posts_view_state'); ?>">アクセス数を表示</label>
</p>
<?php
}

function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['popular_posts_title'] = strip_tags($new_instance['popular_posts_title']);
$instance['popular_posts_number'] = is_numeric($new_instance['popular_posts_number']) ? $new_instance['popular_posts_number'] : 5;
$instance['popular_posts_time_state'] = $new_instance['popular_posts_time_state'] ? 1 : 0;
$instance['popular_posts_category_state'] = $new_instance['popular_posts_category_state'] ? 1 : 0;
$instance['popular_posts_view_state'] = $new_instance['popular_posts_view_state'] ? 1 : 0;
return $instance;
}

function widget($args, $instance) {
extract($args);
echo $before_widget;
$popular_posts_title = apply_filters('widget_title', $instance['popular_posts_title'] );
$popular_posts_number = !empty($instance['popular_posts_number']) ? $instance['popular_posts_number'] : get_option('popular_posts_number');
$popular_posts_time_state = ! empty($instance['popular_posts_time_state']) ? '1' : '0';
$popular_posts_category_state = ! empty($instance['popular_posts_category_state']) ? '1' : '0';
$popular_posts_view_state = ! empty($instance['popular_posts_view_state']) ? '1' : '0';
?>
<h4 class="widgettitle"><span><?php if ($popular_posts_title) {
echo $popular_posts_title;
} else {
echo '人気記事';
}
?></span></h4>
<ul>
	<?php get_the_ID();//記事のPV情報を取得する
	$args = array(
	'meta_key'=> 'post_views_count',//投稿数をカウントするカスタムフィールド名
	'orderby' => 'meta_value_num',
	'order' => 'DESC',
	'post_type' => any,
	'posts_per_page' => $popular_posts_number
	);
	$my_query = new WP_Query( $args );?>
	<?php while ( $my_query->have_posts() ) : $my_query->the_post(); $loopcounter++; ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php if(has_post_thumbnail()): ?>
					<figure class="eyecatch" ><img src="<?php the_post_thumbnail_url('thumbnail'); ?>"></figure>
				<?php elseif(get_theme_mod('default_thumbnail')): ?>
					<figure class="eyecatch" style="background-image: url(<?php $attachment_id = from_image_url_to_image_id(get_theme_mod('default_thumbnail')); $image_attributes = wp_get_attachment_image_src( $attachment_id,'large'); echo $image_attributes[0]; ?>);"></figure>
				<?php else: ?>
					<figure class="eyecatch" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/no-image.jpg);"></figure>
				<?php endif; ?>
				<div class="about">
					<?php if ($popular_posts_category_state): ?>
					<span class="category"><?php if( has_category() ): ?><?php $postcat=get_the_category(); echo $postcat[0]->name; ?><?php endif; ?></span>
					<?php else: ?>
					<?php endif; ?>
					<h5><?php the_title(); ?></h5>
					<?php if ($popular_posts_time_state): ?>
					<time class="pubdate"><?php the_time('Y.m.d'); ?></time>
					<?php else: ?>
					<?php endif; ?>
					<?php if ($popular_posts_view_state): ?>
					<span class="views"><?php echo get_post_meta(get_the_ID(), 'post_views_count', true); ?>views</span>
					<?php else: ?>
					<?php endif; ?>
				</div>
				<span class="rank r-count<?php echo $loopcounter; ?> color-accent-bg "><?php echo $loopcounter; ?></span>
			</a>
		</li>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</ul>
<?php echo $after_widget;
}
}
register_widget('Popular_Posts');
