<?php
// タイトルのリアルタイム文字数カウンター機能を実装
add_action('admin_head-post.php','title_counter');
add_action('admin_head-post-new.php','title_counter');
// 処理内容
function title_counter() {
?>
<!-- ここからJavaScriptとCSSのためPHPを一旦閉じる -->
<script type="text/javascript">
jQuery(document).ready(function($) {
	function count_characters(in_sel, out_sel) {
		$(out_sel).html( $(in_sel).val().length );
	}
// 	ページ表示時に文字カウンターを表示
	$('#titlewrap').after('<div class="title-counter">タイトル文字数: <span class="count">0</span></div>');
// 	ページ表示時に計測
	count_characters('#title','.count');
// 	入力フォーム変更時に計測
	$('#title').bind("keydown keyup keypress change",function(){
		count_characters('#title','.count');
	});
});
</script>
<style type='text/css'>
	.title-counter {
	position:absolute;
	top: -25px;
	right: 5px;
	color: #666;
	}
</style>
<?php
}


/********************
独自関数を呼び出し
********************/
require_once('inc/customizer.php');
require_once('inc/shortcode.php');
require_once('inc/widget.php');
require_once('inc/custom-post-type.php');
require_once('inc/custom-field.php');
require_once('inc/admin.php');
require_once('inc/image-rotation-repair.php');
require_once('inc/license.php');
require_once('inc/editor.php');
require_once('inc/breadcrumb.php');
require_once('inc/style.php');
require_once('inc/amazon/amazon.php');


/********************
スクリプトを読み込み
********************/
if (!is_admin()) {
	function register_script(){
	//IE判定
	$ieua = $_SERVER['HTTP_USER_AGENT'];
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js', array(), '1.12.2' );
		wp_register_script('slick', get_bloginfo('template_directory'). '/assets/js/slick.min.js', array('jquery'), '1.5.9', true );
		wp_register_script('ripple', get_bloginfo('template_directory'). '/assets/js/ripple.js', array('jquery'), '1.0.0', true );
		wp_register_script('page-top-button', get_bloginfo('template_directory'). '/assets/js/page-top-button.js', array('jquery'), '1.0.0', true );
		wp_register_script('toc', get_bloginfo('template_directory'). '/assets/js/toc.js', array('jquery'), '1.0.0', true );
		wp_register_script('remodal', get_bloginfo('template_directory'). '/assets/js/remodal.min.js', array('jquery'), '1.0.0', true );
		wp_register_script('masonry.pkgd.min', get_bloginfo('template_directory'). '/assets/js/masonry.pkgd.min.js', array('jquery'), '4.0.0', true );
		wp_register_script('imagesloaded', get_bloginfo('template_directory'). '/assets/js/imagesloaded.js', array('jquery'), '4.1.0', true );
	}
	function add_script() {
		register_script();
			wp_enqueue_script('jquery');
			wp_enqueue_script('slick');
			wp_enqueue_script('ripple');
			wp_enqueue_script('page-top-button');
			wp_enqueue_script('toc');
			wp_enqueue_script('remodal');
			wp_enqueue_script('masonry.pkgd.min');
			wp_enqueue_script('imagesloaded');
	}
	add_action('wp_enqueue_scripts', 'add_script');
}

/********************
CSSを読み込み
********************/
function register_style() {
	wp_register_style('editor', get_bloginfo('template_directory').'/assets/css/editor-style.css');
	wp_register_style('slick', get_bloginfo('template_directory').'/assets/css/slick.css');
	wp_register_style('amazon', get_bloginfo('template_directory').'/assets/css/amazon.css');
	wp_register_style('remodal', get_bloginfo('template_directory').'/assets/css/remodal.css');
	wp_register_style('awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}
	function add_stylesheet() {
		register_style();
			wp_enqueue_style('editor');
			wp_enqueue_style('slick');
			wp_enqueue_style('amazon');
			wp_enqueue_style('remodal');
			wp_enqueue_style('awesome');
	}
add_action('wp_enqueue_scripts', 'add_stylesheet');

/********************
アイキャッチを有効化
********************/
add_theme_support('post-thumbnails');

/********************
自動フィードリンクを有効化
********************/
add_theme_support('automatic-feed-links');

/********************
メニューを有効化
********************/
add_theme_support('menus');
register_nav_menus(
	array(
	'header' => 'ヘッダーメニュー',
	'footer' => 'フッターメニュー',
	)
);

/********************
固定ページでタグを有効化
********************/
function add_tag_to_page() {
	register_taxonomy_for_object_type('post_tag','page');
	}
add_action('init','add_tag_to_page');

/********************
is_mobile関数を追加
********************/
function is_mobile(){
$useragents = array(
'iPhone',
'iPod',
'Android.*Mobile',
'Windows.*Phone',
'dream',
'CUPCAKE',
'blackberry9500',
'blackberry9530',
'blackberry9520',
'blackberry9550',
'blackberry9800',
'webOS',
'incognito',
'webmate'
);
$pattern = '/'.implode('|', $useragents).'/i';
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}




/*********************
title tags
*********************/
if (!function_exists('rw_title')) {
	function rw_title( $title, $sep, $seplocation ) {
	  global $page, $paged;

	  if ( is_feed() ) return $title;

	  $sep = " | ";
	  if ( 'right' == $seplocation ) {
	    $title .= get_bloginfo( 'name' );
	  } elseif ( is_home() || is_front_page() ){
		$title = $title . get_bloginfo( 'name' );
	  } else {
	    $title = $title . "{$sep}" . get_bloginfo( 'name' );
	  }
	  $site_description = get_bloginfo( 'description', 'display' );
	  if ( $site_description && ( is_home() || is_front_page() ) ) {
	    $title .= "{$sep}{$site_description}";
	  }
	  if ( $paged >= 2 || $page >= 2 ) {
	    $title .= " {$sep} " . sprintf( __( '%sページ目', 'dbt' ), max( $paged, $page ) );
	  }
	  return $title;
	}
}

function bloco_rss_version() { return ''; }

function bloco_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

function bloco_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

function bloco_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}



/*********************
ページネーション
*********************/
if (!function_exists('pagination')) {
	function pagination($pages = '', $range = 2){
	     global $wp_query, $paged;
		$big = 999999999;
		echo "<nav class=\"pagination\">\n";
	 	echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'current' => max( 1, get_query_var('paged') ),
			'prev_text'    => __('<'),
			'next_text'    => __('>'),
			'type'    => 'list',
			'total' => $wp_query->max_num_pages
		) );
		echo "</nav>\n";
	}
}

// サーチフォームのソースコード
if (!function_exists('my_search_form')) {
	function my_search_form( $form ) {
		$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
		<input type="search" placeholder="サイト内検索" value="' . get_search_query() . '" name="s" id="s" />
		<button type="submit" id="searchsubmit" ><i class="fa fa-search"></i></button>
		</form>';
		return $form;
	}
	add_filter( 'get_search_form', 'my_search_form' );
}


//カテゴリー説明文でHTMLタグを使う
remove_filter( 'pre_term_description', 'wp_filter_kses' );

// 更新日を表示する
function get_mtime($format) {
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return null;
    } else {
        return get_the_modified_time($format);
    }
}


// 埋め込みコンテンツサイズ
if ( ! isset( $content_width ) ) {
	$content_width = 728;
}

//iframeのレスポンシブ対応
function wrap_iframe_in_div($the_content) {
if ( is_singular() ) {
//YouTube
$the_content = preg_replace('/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is', '<div class="youtube-container">${0}</div>', $the_content);
}
return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');


//サイト内検索で固定ページを省く
if (!function_exists('SearchFilter')) {
	function SearchFilter($query) {
	if ($query->is_search && !is_admin()) {
	$query->set('post_type', 'post');
	}
	return $query;
	}
	add_filter('pre_get_posts','SearchFilter');
}

//ユーザーページでHTMLを保存可能にする
remove_filter('pre_user_description', 'wp_filter_kses');



//セルフピンバック禁止
function no_self_pingst( &$links ) {
    $home = home_url();
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_pingst' );


function bloco_ahoy() {

// THEME CSS EDITOR INCLUDE
add_editor_style( get_bloginfo('template_url') . '/assets/css/editor-style.css' );
add_editor_style( '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

add_filter( 'wp_title', 'rw_title', 10, 3 );
add_filter( 'the_generator', 'bloco_rss_version' );
add_filter( 'wp_head', 'bloco_remove_wp_widget_recent_comments_style', 1 );
add_action( 'wp_head', 'bloco_remove_recent_comments_style', 1 );
add_action( 'widgets_init', 'theme_register_sidebars' );
}
add_action( 'after_setup_theme', 'bloco_ahoy' );


//アクセス数を取得
//参考URL：https://plusers.net/wordpress_application_access
function get_post_views($postID){
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
return '0 View';
}
return $count.' Views';
}
//アクセス数を保存
function set_post_views($postID) {
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
$count = 0;
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
}else{
$count++;
update_post_meta($postID, $count_key, $count);
}
}
//headに出力されるダグを削除
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


//クローラーのアクセス判別
//参考URL：https://plusers.net/wordpress_application_access
function is_bot() {
$ua = $SERVER[HTTP_USER_AGENT];
$bot = array(
"googlebot",
"msnbot",
"yahoo"
);
foreach( $bot as $bot ) {
if (stripos( $ua, $bot ) !== false){
return true;
}
}
return false;
}


/*********************
画像のURLから、その画像のIDを取得する（//kachibito.net/wp-code/retrieve-attachment-id-from-image-url）
*********************/
function from_image_url_to_image_id($image_url) {
global $wpdb;
$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
return $attachment[0];
}




function add_ads_before_1st_h2($the_content) {
  if (is_single()) {
    //広告（AdSense）タグを記入
    $ads = <<< EOF


EOF;
    $h2 = '/<h2.*?>/i';//H2見出しのパターン
    if ( preg_match( $h2, $the_content, $h2s )) {//H2見出しが本文中にあるかどうか
      $the_content  = preg_replace($h2, $ads.$h2s[0], $the_content, 1);//最初のH2を置換
    }
  }
  return $the_content;
}
add_filter('the_content','add_ads_before_1st_h2');