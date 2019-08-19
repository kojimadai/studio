<?php
/*********************
Amazon
*********************/
function add_add_amazon_shortcode_button_plugin( $plugin_array ) {
	$plugin_array[ 'amazon_shortcode_button_plugin' ] = get_template_directory_uri() . '/assets/js/tinymce.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_amazon_shortcode_button_plugin' );
function add_amazon_shortcode_button( $buttons ) {
	$buttons[] = 'amazon';
	return $buttons;
}
add_filter( 'mce_buttons', 'add_amazon_shortcode_button' );

/*********************
ボタン
*********************/
function add_add_button_button_plugin( $plugin_array ) {
	$plugin_array[ 'button_button_plugin' ] = get_template_directory_uri() . '/assets/js/tinymce.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_button_button_plugin' );
function add_button_button( $buttons ) {
	$buttons[] = 'button';
	return $buttons;
}
add_filter( 'mce_buttons', 'add_button_button' );

/*********************
ボックス
*********************/
function add_add_box_button_plugin( $plugin_array ) {
	$plugin_array[ 'box_button_plugin' ] = get_template_directory_uri() . '/assets/js/tinymce.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_box_button_plugin' );
function add_box_button( $buttons ) {
	$buttons[] = 'box';
	return $buttons;
}
add_filter( 'mce_buttons', 'add_box_button' );

/*********************
回り込みを解除
*********************/
function add_add_clear_float_button_plugin( $plugin_array ) {
	$plugin_array[ 'clear_float_button_plugin' ] = get_template_directory_uri() . '/assets/js/tinymce.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_clear_float_button_plugin' );
function add_clear_float_button( $buttons ) {
	$buttons[] = 'clear_float';
	return $buttons;
}
add_filter( 'mce_buttons', 'add_clear_float_button' );

/*********************
点線
*********************/
function add_add_line_dotted_button_plugin( $plugin_array ) {
	$plugin_array[ 'line_dotted_button_plugin' ] = get_template_directory_uri() . '/assets/js/tinymce.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_line_dotted_button_plugin' );
function add_line_dotted_button( $buttons ) {
	$buttons[] = 'line_dotted';
	return $buttons;
}
add_filter( 'mce_buttons', 'add_line_dotted_button' );

/*********************
吹き出し
*********************/
function add_add_balloon_button_plugin( $plugin_array ) {
	$plugin_array[ 'balloon_button_plugin' ] = get_template_directory_uri() . '/assets/js/tinymce.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_balloon_button_plugin' );
function add_balloon_button( $buttons ) {
	$buttons[] = 'balloon';
	return $buttons;
}
add_filter( 'mce_buttons', 'add_balloon_button' );
function balloon_image_preset() {
if(get_theme_mod('balloon_image_1','/wp-content/themes/appartement-studio/assets/images/default/balloon.png')) {
	$balloon_image_1 = get_theme_mod('balloon_image_1','/wp-content/themes/appartement-studio/assets/images/default/balloon.png');
} else {
	$balloon_image_1 = "/wp-content/themes/appartement-studio/assets/images/default/balloon.png";
}

if(get_theme_mod('balloon_image_2','/wp-content/themes/appartement-studio/assets/images/default/balloon.png')) {
	$balloon_image_2 = get_theme_mod('balloon_image_2','/wp-content/themes/appartement-studio/assets/images/default/balloon.png');
} else {
	$balloon_image_2 = '/wp-content/themes/appartement-studio/assets/images/default/balloon.png';
}

if(get_theme_mod('balloon_image_3','/wp-content/themes/appartement-studio/assets/images/default/balloon.png')) {
	$balloon_image_3 = get_theme_mod('balloon_image_3','/wp-content/themes/appartement-studio/assets/images/default/balloon.png');
} else {
	$balloon_image_3 = '/wp-content/themes/appartement-studio/assets/images/default/balloon.png';
}
echo '
<div id="balloon-image-media" data-image="'.get_bloginfo('template_directory').'/assets/images/default/balloon.png" style="display: none;"></div>
<div id="balloon-image-1" data-image="'.$balloon_image_1.'" style="display: none;"></div>
<div id="balloon-image-2" data-image="'.$balloon_image_2.'" style="display: none;"></div>
<div id="balloon-image-3" data-image="'.$balloon_image_3.'" style="display: none;"></div>';
}
add_action('admin_footer','balloon_image_preset');

/*********************
引用
*********************/
function add_add_blockquote_button_plugin( $plugin_array ) {
	$plugin_array[ 'blockquote_button_plugin' ] = get_template_directory_uri() . '/assets/js/tinymce.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_blockquote_button_plugin' );
	
/********************
ショートコードの前後等にpやbrが自動挿入されるのを回避（http://www.sitespiral.jp/information/406/）
********************/
function shortcode_empty_paragraph_fix($content) {
	$array = array (
	'<p>[' => '[',
	']</p>' => ']',
	']<br />' => ']'
	);
	$content = strtr($content, $array);
	return $content;
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');

/*********************
テーマのバージョンを出力（隠れ機能）
*********************/
function theme_version() {
	$enabled_theme = wp_get_theme();
	return $enabled_theme->get('Version');
}
add_shortcode('theme_version', 'theme_version');
