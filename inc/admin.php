<?php
/********************
メニューにマニュアルのリンクを設置
********************/
function admin_manual_menu() {
	// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	//   $page_title: 設定ページの<title>部分 → メニュー名と同じでよいです。
	//   $menu_title: メニュー名
	//   $capability: 権限 ( 'manage_options' や 'administrator' など)
	//   $menu_slug : メニューのslug → 例では'analytics'ですが、必要に応じて好きな名前にしてください。
	//   $function  : 設定ページの出力を行う関数 → 不要
	//   $icon_url  : メニューに表示するアイコン → 今回の例では不要
	//   $position  : メニューの位置 ( 1 や 99 など ) → 今回の例では不要
	add_menu_page( 'マニュアル', 'マニュアル', 'manage_options', 'manual' );
}
add_action('admin_menu', 'admin_manual_menu', 1000);
// 外部リンク用のリンク設定を行います (add_menu_page()だけでは外部リンクの設定ができないため、JavaScriptで調整します。
function admin_manual_menu_link() {
	?><script>
		jQuery(function($){
			// 上で指定したメニューのスラッグ
			var menu_slug = 'manual';
			$('a.toplevel_page_' + menu_slug).prop({
				// 外部URL
				href: "https://studio.appartement.in/ja/manual",
				// 新しいタブで開く
				target: "_blank"
			});
		});
	</script><?php
}
add_action('admin_print_footer_scripts', 'admin_manual_menu_link');

/********************
自動更新
********************/
if(get_theme_mod('update_major_state','checked')) {
	add_filter('allow_major_auto_core_updates','__return_true');
}
if(get_theme_mod('update_themer_state','checked')) {
	add_filter('auto_update_theme','__return_true');
}
if(get_theme_mod('update_pluguin_state','checked')) {
	add_filter('auto_update_plugin','__return_true');
}

/********************
管理バー項目の非表示
********************/
function remove_admin_bar_menus( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'view-site' );
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 100 );

/********************
管理画面フッターを変更
********************/
function custom_admin_footer () {
	echo '';
}
add_filter( 'admin_footer_text', 'custom_admin_footer' );




function remove_dashboard_widget() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');//概要
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');//クイックドラフト
	remove_meta_box('dashboard_primary', 'dashboard', 'side');//WordPressニュース
 
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');



remove_action('welcome_panel','wp_welcome_panel');
add_action('welcome_panel','add_links_welcome_panel');
function add_links_welcome_panel() {
?>
<style>
#welcome-panel a.welcome-panel-close {
	display: none;
}
#welcome-panel .version {

}
#welcome-panel .version a {
	display: block;
	margin: 0 auto;
	padding: .6em 1em;
	width: 240px;
	line-height: 1.5;
	text-align: center;
	color: #fff;
	background-color: #a82e2d;
	border-radius: 3px;
}
#welcome-panel .version a:hover {
	opacity: .8;
}
#welcome-panel iframe {
	width: 100%;
	height: 80vh;
}
.blinking{
	-webkit-animation:blink .5s ease-in-out infinite alternate;
	-moz-animation:blink .5s ease-in-out infinite alternate;
	animation:blink .5s ease-in-out infinite alternate;
}
@-webkit-keyframes blink{
	0% {opacity:0;}
	100% {opacity:1;}
}
@-moz-keyframes blink{
	0% {opacity:0;}
	100% {opacity:1;}
}
@keyframes blink{
	0% {opacity:0;}
	100% {opacity:1;}
}
</style>
<?php
$new_version = file_get_contents('https://studio.appartement.in/ja/version'); 
$theme_data		= wp_get_theme(get_template());
$name			= $theme_data->Name;
$version		= $theme_data->Version;
if($version !== $new_version) {
	echo "<div class='version blinking'><a href='./update-core.php'>テーマの最新バージョンがあります。<br>更新はこちら</a></div>";
}
?>
<iframe src="https://studio.appartement.in/ja/dashboard"></iframe>
<?php
}
	
/********************
管理画面の記事一覧に投稿IDを表示
********************/
function add_posts_columns_postid($columns) {
	$columns['postid'] = '投稿ID'; return $columns;
}
add_filter( 'manage_posts_columns', 'add_posts_columns_postid' );
function add_posts_columns_postid_row($column_name, $post_id) {
	if( 'postid' == $column_name ) { echo $post_id; }
}
add_action( 'manage_posts_custom_column', 'add_posts_columns_postid_row', 10, 2 );

/********************
管理画面の記事一覧に記事のアクセス数を表示（plusers.net/wordpress_application_access）
**********/
function manage_posts_columns($columns) {
$columns['post_views_count'] = 'アクセス数';
return $columns;
}
function add_column($column_name, $post_id) {
if ( $column_name == 'post_views_count' ) {
	$stitle = get_post_meta($post_id, 'post_views_count', true);
}
if ( isset($stitle) && $stitle ) {
	echo attribute_escape($stitle);
}
else {
echo __('');
}
}
add_filter( 'manage_posts_columns', 'manage_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );


/**********************
管理画面の投稿一覧に最終更新日を追加してソート機能を実装する
**********************/
function last_modified_admin_column( $columns ) {
	$columns['modified-last'] ='最終更新日';
	return $columns;
}
add_filter( 'manage_posts_columns', 'last_modified_admin_column' );
	function sortable_last_modified_column( $columns ) {
	$columns['modified-last'] = 'modified';
	return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'sortable_last_modified_column' );
function last_modified_admin_column_content( $column_name, $post_id ) {
	if ( 'modified-last' != $column_name )
	return; 
	$modified_date = the_modified_date( 'Y年Md日' );
	echo $modified_date;
}
add_action( 'manage_posts_custom_column', 'last_modified_admin_column_content', 10, 2 );


/********************
管理画面の記事一覧に並び順をソート（sandalot.com/?p=904）
**********/
function custom_posts_columns_sort($columns) {
$sort_number = array(
'cb' => 0,
'postid' => 9,
'title' => 2,
'author' => 5,
'categories' => 3,
'tags' => 4,
'comments' => 7,
'date' => 5,
'modified-last' => 6,
'post_views_count' => 8
);
$sort = array();
foreach($columns as $key => $value) {
$sort[] = $sort_number{$key};
}
array_multisort($sort,$columns);
return $columns;
}
add_filter('manage_posts_columns','custom_posts_columns_sort');



/********************
バージョン情報を削除
********************/
if (!function_exists('vc_remove_wp_ver_css_js')) {
	function vc_remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
		return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
}

/********************
管理画面に独自ccsを反映
********************/
function custom_admin_style(){
	wp_enqueue_style( 'custom_admin_style', get_template_directory_uri().'/assets/css/admin.css' );
	}
add_action( 'admin_enqueue_scripts', 'custom_admin_style' );

/********************
ユーザー項目の追加と削除
********************/
if (!function_exists('update_profile_fields')) {
	function update_profile_fields( $contactmethods ) {
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	$contactmethods['position'] = '肩書き';
	$contactmethods['twitter'] = 'TwitterのURL';
	$contactmethods['facebook'] = 'FacebookのURL';
	$contactmethods['instagram'] = 'InstagramのURL';
	$contactmethods['googleplus'] = 'Google+のURL';
	return $contactmethods;
	}
add_filter('user_contactmethods','update_profile_fields',10,1);
}

/********************
更新通知機能を実装
********************/
require 'theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
'appartement-studio',
'https://appartement.in/update-info.json'
);

/********************
スマホの場合に管理バーを非表示
********************/
if(is_mobile()) {
	add_filter('show_admin_bar','__return_false');
}

// 投稿ページ以外でhentryクラスを除去
function remove_hentry( $classes ) {
	if (!is_single()) $classes = array_diff($classes, array('hentry'));
	return $classes;
}
add_filter('post_class', 'remove_hentry');


