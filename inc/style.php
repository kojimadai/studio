<?php
/********************
「スタイル」を追加
********************/
function style_editor_setting($init) {
	$style_formats = array(
		array(
		'title' => '画像のデザイン',
		'items' => array(
			array(
				'title' => '影',
				'selector' => 'img',
				'classes' => 'img-shadow'
			),
			array(
				'title' => '角丸',
				'selector' => 'img',
				'classes' => 'img-roundes-corners'
			),
			array(
				'title' => '枠線',
				'selector' => 'img',
				'classes' => 'img-border'
			),
			array(
				'title' => 'ポラロイド',
				'selector' => 'img',
				'classes' => 'img-polaroid'
			),
			array(
				'title' => 'モノクロ',
				'selector' => 'img',
				'classes' => 'img-monochrome'
			),
			array(
				'title' => 'セピア',
				'selector' => 'img',
				'classes' => 'img-sepia'
			))
		),
		array(
		'title' => '文字のデザイン',
		'items' => array(
			array(
				'title' => '文字サイズ極小',
				'inline' => 'span',
				'classes' => 'font-size-ss'
			),
			array(
				'title' => '文字サイズ小',
				'inline' => 'span',
				'classes' => 'font-size-s'
			),
			array(
				'title' => '文字サイズ大',
				'inline' => 'span',
				'classes' => 'font-size-l'
			),
			array(
				'title' => '文字サイズ極大',
				'inline' => 'span',
				'classes' => 'font-size-ll'
			),
			array(
				'title' => '蛍光ペン（青）',
				'inline' => 'span',
				'classes' => 'highlighter-blue'
			),
			array(
				'title' => '蛍光ペン（黄）',
				'inline' => 'span',
				'classes' => 'highlighter-yellow'
			),
			array(
				'title' => '蛍光ペン（緑）',
				'inline' => 'span',
				'classes' => 'highlighter-green'
			),
			array(
				'title' => '蛍光ペン（赤）',
				'inline' => 'span',
				'classes' => 'highlighter-red'
			))
		)
	);
	$init['style_formats'] = json_encode( $style_formats );

	return $init;
	}
add_filter('tiny_mce_before_init', 'style_editor_setting');
