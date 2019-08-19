<?php
add_action('customize_register', 'customize_register_remove');
function customize_register_remove( $wp_customize ) {
$wp_customize->remove_section('colors');
$wp_customize->remove_section('bg_image');
}
function bloco_customize_register($wp_customize) {
/********************
既存セクションに追加
********************/
	$wp_customize->add_section('title_tagline', array(
	'title'          =>'サイト基本設定',
	'priority'       => 30,
	'description' => '',
	'panel' => 'common_panel',
	));
		$wp_customize->add_setting('site_desc', array(
		));
		$wp_customize->add_control('site_desc', array(
		'settings' => 'site_desc',
		'label' =>'サイトの詳しい説明',
		'description' => 'ページの内容をあらわす概要を記述します。110文字くらいで記述するのがいいですが、少々オーバーしても問題ありません。検索結果のスニペットの説明文で使われる事があります。検索者がクリックしたくなるような概要を記述しておけば、クリック率の向上が期待できます。',
		'type' => 'textarea',
		'section' => 'title_tagline',
		));
	$wp_customize->add_section('static_front_page', array(
	'title'          =>'ホームページ設定',
	'priority'       => 30,
	'description' => '投稿の逆順表示 (従来のブログ) または固定・静的なページから、サイトのホームページの表示内容を選択することができます。静的なホームページを設定するには、まず2つの固定ページを作成します。1つはホームページになり、もうひとつは投稿が表示される場所になります。',
	'panel' => 'front_panel',
	));
/********************
共通設定
********************/
$wp_customize->add_panel('common_panel', array(
'title' => '共通設定',
'description' => '共通設定です。',
'priority' => 30,
));
	/* フォント設定 */
	$wp_customize->add_section('common_font_section', array(
	'title'          =>'フォント設定',
	'priority'       => 30,
	'description' => 'フォントサイズやフォントの種類が設定できます。',
	'panel' => 'common_panel',
	));
		$wp_customize->add_setting('font_size', array(
		'default' => 's16',
		));
		$wp_customize->add_control('font_size', array(
		'settings' => 'font_size',
		'label' =>'フォントサイズ',
		'description' => 'ここで設定したフォントサイズが記事本文のフォントサイズとなります。また、その数値を基準として各パーツのフォントサイズが相対的に変更されます。',
		'section' => 'common_font_section',
		'type' => 'radio',
		'choices' => array(
		's14' => '14px',
		's15' => '15px',
		's16' => '16px',
		's17' => '17px',
		's18' => '18px',
		),
		));
		$wp_customize->add_setting('line_height', array(
		'default' => 'l16',
		));
		$wp_customize->add_control('line_height', array(
		'settings' => 'line_height',
		'label' =>'行間設定',
		'description' => '行間を変更できます。',
		'section' => 'common_font_section',
		'type' => 'radio',
		'choices' => array(
		'l10' => '1.0',
		'l11' => '1.1',
		'l12' => '1.2',
		'l13' => '1.3',
		'l14' => '1.4',
		'l15' => '1.5',
		'l16' => '1.6',
		'l17' => '1.7',
		'l18' => '1.8',
		'l19' => '1.9',
		'l20' => '2.0',
		),
		));
		$wp_customize->add_setting('font_family_ja', array(
		'default' => 'noto_sans_japanese',
		));
		$wp_customize->add_control('font_family_ja', array(
		'settings' => 'font_family_ja',
		'label' =>'フォント種類',
		'description' => '記事本文などにつかわれるフォントの種類を変更できます。「ゴシック体」「明朝体」「メイリオ」については、デバイスにより表示が異なる場合があります。',
		'section' => 'common_font_section',
		'type' => 'radio',
		'choices' => array(
		'gothic' => 'ゴシック体',
		'mincho' => '明朝体',
		'meiryo' => 'メイリオ',
		'mplus_1p' => 'M+ 1p',
		'rounded_mplus_1c' => 'Rounded M+ 1c',
		'sawarabi_mincho' => 'さわらび明朝',
		'sawarabi_gothic' => 'さわらびゴシック',
		'noto_sans_japanese' => 'Noto Sans Japanese',
		),
		));
	/* 分析設定 */
	$wp_customize->add_section('common_analytics_section', array(
	'title'          =>'分析設定',
	'priority'       => 30,
	'description' => 'Googleアナリティクスなどの分析ツールの設定ができます。',
	'panel' => 'common_panel',
	));
		$wp_customize->add_setting('google_analytics', array(
		));
		$wp_customize->add_control('google_analytics', array(
		'label' =>'Google Analytics',
		'description' => '入力例：「UA-xxxxxxxx-xx」※プラグインなどですでに設定している場合には、正常なアクセス解析ができないなどの不具合の原因になりますので設定しないようご注意ください。',
		'settings' => 'google_analytics',
		'section' => 'common_analytics_section',
		));
		$wp_customize->add_setting('google_analytics_filter', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('google_analytics_filter', array(
		'settings' => 'google_analytics_filter',
		'label' =>'管理者アクセスをフィルター',
		'description' => 'ログイン中の管理者のアクセスを除外させることができます。',
		'section' => 'common_analytics_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '管理者アクセスを除外しない',
		'disabled' => '管理者アクセスを除外',
		),
		));
	/* デフォルト設定 */
	$wp_customize->add_section('common_default_section', array(
	'title'          =>'デフォルト設定',
	'priority'       => 30,
	'description' => 'デフォルトの画像設定ができます。',
	'panel' => 'common_panel',
	));
		$wp_customize->add_setting('default_tmb');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'default_tmb', array(
		'label'        => 'デフォルトのサムネイル画像',
		'description' => '記事一覧や関連記事などで、アイキャッチ画像が未登録の場合につかわれるサムネイル画像です。また、この画像とアイキャッチ画像がともに未登録の記事の場合には、デフォルト画像がサムネイル画像としてつかわれます。',
		'section'    => 'common_default_section',
		'settings'   => 'default_tmb',
		)));
/********************
色設定
********************/
$wp_customize->add_panel('color_panel', array(
'title' => '色設定',
'description' => '色設定です。',
'priority' => 30,
));
	/* 基本カラー */
	$wp_customize->add_section('color_basic_section', array(
	'title'          =>'基本カラー',
	'priority'       => 30,
	'description' => 'サイトの色変更が可能です。',
	'panel' => 'color_panel',
	));
		$wp_customize->add_setting('base_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'base_color', array(
		'label' => 'ベースカラー',
		'description' => '背景となる色なので白や薄めの色など可読性を高めるために無彩色を利用する場合が多いです。',
		'section' => 'color_basic_section',
		'settings' => 'base_color',
		)));
		$wp_customize->add_setting('main_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
		'label' => 'メインカラー',
		'description' => '',
		'section' => 'color_basic_section',
		'settings' => 'main_color',
		)));
		$wp_customize->add_setting('accent_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'label' => 'アクセントカラー',
		'description' => '',
		'section' => 'color_basic_section',
		'settings' => 'accent_color',
		)));
	/* ヘッダーカラー */
	$wp_customize->add_section('color_header_section', array(
	'title'          =>'ヘッダーカラー',
	'priority'       => 30,
	'description' => 'サイトの色変更が可能です。',
	'panel' => 'color_panel',
	));
		$wp_customize->add_setting('header_logo_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_logo_color', array(
		'label' => 'ヘッダーロゴ色',
		'description' => 'ヘッダーのテキストロゴやキャッチフレーズにつかわれる文字色を変更できます。',
		'section' => 'color_header_section',
		'settings' => 'header_logo_color',
		)));
		$wp_customize->add_setting('header_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
		'label' => 'ヘッダー背景色',
		'description' => 'ヘッダーの背景色を変更できます。',
		'section' => 'color_header_section',
		'settings' => 'header_bg_color',
		)));
		$wp_customize->add_setting('header_menu_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_color', array(
		'label' => 'ヘッダーメニュー色',
		'description' => 'ヘッダーメニューの文字色を変更できます。',
		'section' => 'color_header_section',
		'settings' => 'header_menu_color',
		)));
		$wp_customize->add_setting('header_menu_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_bg_color', array(
		'label' => 'ヘッダーメニュー背景色',
		'description' => 'ヘッダーメニューの背景色を変更できます。',
		'section' => 'color_header_section',
		'settings' => 'header_menu_bg_color',
		)));
	/* フッターカラー */
	$wp_customize->add_section('color_footer_section', array(
	'title'          =>'フッターカラー',
	'priority'       => 30,
	'description' => 'サイトの色変更が可能です。',
	'panel' => 'color_panel',
	));
		$wp_customize->add_setting('footer_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'label' => 'フッター背景色',
		'description' => 'フッターの背景色を変更できます。',
		'section' => 'color_footer_section',
		'settings' => 'footer_bg_color',
		)));
		$wp_customize->add_setting('footer_menu_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_menu_color', array(
		'label' => 'フッター文字色',
		'description' => 'フッターの文字色を変更できます。',
		'section' => 'color_footer_section',
		'settings' => 'footer_menu_color',
		)));
	/* メインコンテンツカラー */
	$wp_customize->add_section('color_main_section', array(
	'title'          =>'メインコンテンツカラー',
	'priority'       => 30,
	'description' => 'サイトの色変更が可能です。',
	'panel' => 'color_panel',
	));
		$wp_customize->add_setting('main_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bg_color', array(
		'label' => 'メインコンテンツ背景色',
		'description' => 'メインコンテンツの背景色を変更できます。',
		'section' => 'color_main_section',
		'settings' => 'main_bg_color',
		)));
		$wp_customize->add_setting('body_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_color', array(
		'label' => 'テキストカラー',
		'description' => '記事本文などの文字色を変更できます。',
		'section' => 'color_main_section',
		'settings' => 'body_color',
		)));
		$wp_customize->add_setting('a_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'a_color', array(
		'label' => 'リンクカラー',
		'description' => 'リンクの文字色を変更できます。',
		'section' => 'color_main_section',
		'settings' => 'a_color',
		)));
	/* サイドバーウィジェット色設定 */
	$wp_customize->add_section('color_sidebar_widget_section', array(
	'title'          =>'サイドバーウィジェットカラー',
	'priority'       => 30,
	'description' => 'サイドバーウィジェットの色変更が可能です。',
	'panel' => 'color_panel',
	));
		$wp_customize->add_setting('sidebar_widget_ttl_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_widget_ttl_color', array(
		'label' => 'ウィジェットタイトル文字色',
		'description' => 'ウィジェットタイトルの文字色を変更できます。',
		'section' => 'color_sidebar_widget_section',
		'settings' => 'sidebar_widget_ttl_color',
		)));
		$wp_customize->add_setting('sidebar_widget_ttl_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_widget_ttl_bg_color', array(
		'label' => 'ウィジェットタイトル背景色',
		'description' => 'ウィジェットタイトルの背景色を変更できます。',
		'section' => 'color_sidebar_widget_section',
		'settings' => 'sidebar_widget_ttl_bg_color',
		)));
		$wp_customize->add_setting('sidebar_widget_ttl_border_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_widget_ttl_border_color', array(
		'label' => 'ウィジェットタイトル枠線色',
		'description' => 'ウィジェットタイトルの枠線色を変更できます。',
		'section' => 'color_sidebar_widget_section',
		'settings' => 'sidebar_widget_ttl_border_color',
		)));
	/* フッターウィジェット色設定 */
	$wp_customize->add_section('color_footer_widget_section', array(
	'title'          =>'フッターウィジェットカラー',
	'priority'       => 30,
	'description' => 'フッターウィジェットの色変更が可能です。',
	'panel' => 'color_panel',
	));
		$wp_customize->add_setting('footer_widget_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_color', array(
		'label' => 'フッターウィジェット文字色',
		'description' => 'フッターウィジェットの文字色を変更できます。',
		'section' => 'color_footer_widget_section',
		'settings' => 'footer_widget_color',
		)));
		$wp_customize->add_setting('footer_widget_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_bg_color', array(
		'label' => 'フッターウィジェット背景色',
		'description' => 'フッターウィジェットの背景色を変更できます。',
		'section' => 'color_footer_widget_section',
		'settings' => 'footer_widget_bg_color',
		)));
/********************
パーツ設定
********************/
$wp_customize->add_panel('part_panel', array(
'title' => 'パーツ設定',
'description' => 'パーツの設定です。',
'priority' => 30,
));
	/* ヘッダー */
	$wp_customize->add_section('part_header_section', array(
	'title'          =>'ヘッダー',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('header_position_type', array(
		'default' => 'static-100',
		));
		$wp_customize->add_control('header_position_type', array(
		'settings' => 'header_position_type',
		'label' =>'ヘッダーレイアウト設定',
		'description' => 'ヘッダーのレイアウトを設定します。',
		'section' => 'part_header_section',
		'type' => 'radio',
		'choices' => array(
		'static-100' => 'スクロール（全幅）',
		'static-auto' => 'スクロール（横幅制限）',
		'top' => '上部に固定',
		'left' => '左側に固定（ベータ版）',
		),
		));
		$wp_customize->add_setting('header_padding_top_pc', array(
		'default' => '50',
		));
		$wp_customize->add_control('header_padding_top_pc', array(
		'settings' => 'header_padding_top_pc',
		'label' =>'ヘッダー上部スペース',
		'description' => 'ヘッダー上部のスペースの大きさを変更できます。',
		'section' => 'part_header_section',
		'type' => 'number',
		));
		$wp_customize->add_setting('header_logo_position', array(
		'default' => 'center',
		));
		$wp_customize->add_control('header_logo_position', array(
		'settings' => 'header_logo_position',
		'label' =>'ロゴレイアウト',
		'description' => 'ロゴの位置を変更することが可能です。',
		'section' => 'part_header_section',
		'type' => 'radio',
		'choices' => array(
		'left' => '左側に配置',
		'center' => '中央に配置',
		),
		));
		$wp_customize->add_setting('header_logo_type', array(
		'default' => 'txt_ja',
		));
		$wp_customize->add_control('header_logo_type', array(
		'settings' => 'header_logo_type',
		'label' =>'ロゴタイプ',
		'description' => 'ロゴの表示をテキストもしくは画像で選択できます。画像を選択の場合、サイト基本設定からロゴ画像を設定する必要があります。',
		'section' => 'part_header_section',
		'type' => 'radio',
		'choices' => array(
		'txt_ja' => '日本語テキスト',
		'txt_en' => '英語テキスト',
		'img' => 'ロゴ画像',
		),
		));
		$wp_customize->add_setting('site_logo_img');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo_img', array(
		'label'        => 'ロゴ画像をアップロード',
		'description' => 'ロゴタイプでロゴ画像を選択時のみ、こちらからロゴ画像をアップロードしてください。画像の推奨サイズはロゴのレイアウトにより異なります。',
		'section'    => 'part_header_section',
		'settings'   => 'site_logo_img',
		)));
		$wp_customize->add_setting('header_logo_font_family_en', array(
		'default' => 'Archivo_Black',
		));
		$wp_customize->add_control('header_logo_font_family_en', array(
		'settings' => 'header_logo_font_family_en',
		'label' =>'英語テキストのロゴフォント',
		'description' => 'ロゴタイプで英語テキストを選択時のみ下記から英文字フォントを変更できます。',
		'section' => 'part_header_section',
		'type' => 'radio',
		'choices' => array(
		'Abril_Fatface' => 'Abril Fatface',
		'Archivo_Black' => 'Archivo Black',
		'Bungee_Inline' => 'Bungee Inline',
		'Comfortaa' => 'Comfortaa',
		'Lobster' => 'Lobster',
		'Limelight' => 'Limelight',
		'Syncopate' => 'Syncopate',
		'Codystar' => 'Codystar',
		),
		));
		$wp_customize->add_setting('header_logo_size_pc', array(
		'default' => '32',
		));
		$wp_customize->add_control('header_logo_size_pc', array(
		'settings' => 'header_logo_size_pc',
		'label' =>'ロゴサイズ（パソコン用）',
		'description' => 'ロゴの大きさを変更できます。',
		'section' => 'part_header_section',
		'type' => 'number',
		));
		$wp_customize->add_setting('header_logo_size_sp', array(
		'default' => '24',
		));
		$wp_customize->add_control('header_logo_size_sp', array(
		'settings' => 'header_logo_size_sp',
		'label' =>'ロゴサイズ（スマホ用）',
		'description' => 'ロゴの大きさを変更できます。',
		'section' => 'part_header_section',
		'type' => 'number',
		));
		$wp_customize->add_setting('header_site_desc_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('header_site_desc_state', array(
		'settings' => 'header_site_desc_state',
		'label' =>'「キャッチフレーズ」表示設定',
		'description' => 'ロゴ上部に「キャッチフレーズ」の表示を設定します。',
		'section' => 'part_header_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('header_contact_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('header_contact_state', array(
		'settings' => 'header_contact_state',
		'label' =>'お問い合わせ情報表示設定',
		'description' => 'ヘッダー右上に電話番号やお問い合わせページへのボタンを設置できます。「表示」の場合でも、画面の横幅が1200px未満では表示されませんのでご注意ください。',
		'section' => 'part_header_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('header_contact_tel', array(
		'default' => '0120-123-456',
		));
		$wp_customize->add_control('header_contact_tel', array(
		'label' =>'電話番号',
		'description' => '電話番号を記入してください。',
		'section' => 'part_header_section',
		'settings' => 'header_contact_tel',
		));
		$wp_customize->add_setting('header_contact_tel_desc', array(
		'default' => '【営業時間】平日10時〜18時',
		));
		$wp_customize->add_control('header_contact_tel_desc', array(
		'label' =>'営業時間などの説明など',
		'description' => '営業時間などの説明などを記入してください。',
		'section' => 'part_header_section',
		'settings' => 'header_contact_tel_desc',
		));
		$wp_customize->add_setting('header_contact_btn_txt', array(
		'default' => 'お問い合わせ',
		));
		$wp_customize->add_control('header_contact_btn_txt', array(
		'label' =>'ボタンテキスト',
		'description' => 'ボタンを設置する場合は、ボタンテキストを記入してください。',
		'section' => 'part_header_section',
		'settings' => 'header_contact_btn_txt',
		));
		$wp_customize->add_setting('header_contact_btn_url', array(
		));
		$wp_customize->add_control('header_contact_btn_url', array(
		'label' =>'リンクURL',
		'description' => 'ボタンのリンク先をURLで記入してください。',
		'section' => 'part_header_section',
		'settings' => 'header_contact_btn_url',
		));
		$wp_customize->add_setting('header_contact_btn_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_contact_btn_color', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタンの文字色を変更できます。',
		'section' => 'part_header_section',
		'settings' => 'header_contact_btn_color',
		)));
		$wp_customize->add_setting('header_contact_btn_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_contact_btn_bg_color', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'part_header_section',
		'settings' => 'header_contact_btn_bg_color',
		)));
	/* フッター */
	$wp_customize->add_section('part_footer_section', array(
	'title'          =>'フッター',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('copyright_text', array(
		));
		$wp_customize->add_control('copyright_text', array(
		'label' =>'Copyright表記',
		'description' => 'Copyrightの表記名を変更できます。未入力の場合、サイト名が反映されます。',
		'section' => 'part_footer_section',
		'settings' => 'copyright_text',
		));
	/* お知らせ */
	$wp_customize->add_section('part_news_section', array(
	'title'          =>'お知らせ',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('news_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('news_state', array(
		'settings' => 'news_state',
		'label' =>'お知らせ表示設定',
		'description' => 'お知らせの表示を選択できます。',		
		'section' => 'part_news_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('news_text', array(
		));
		$wp_customize->add_control('news_text', array(
		'label' =>'お知らせ文',
		'description' => 'ヘッダーのすぐ下の目立つ位置にお知らせ文を挿入することができます。挿入したい文章を記入してください。',
		'section' => 'part_news_section',
		'settings' => 'news_text',
		'type' => 'textarea',
		));
		$wp_customize->add_setting('news_url', array(
		));
		$wp_customize->add_control('news_url', array(
		'label' =>'リンク先URL',
		'description' => 'お知らせ文を別ページにリンクさせたい場合にはリンク先のURLを記入してください。',
		'section' => 'part_news_section',
		'settings' => 'news_url',
		));
		$wp_customize->add_setting('news_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'news_color', array(
		'label' => 'お知らせの文字色',
		'description' => 'お知らせの文字色を変更できます。',
		'section' => 'part_news_section',
		'settings' => 'news_color',
		)));
		$wp_customize->add_setting('news_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'news_bg_color', array(
		'label' => 'お知らせ欄の背景色',
		'description' => 'お知らせの背景色を変更できます。',
		'section' => 'part_news_section',
		'settings' => 'news_bg_color',
		)));
	/* 目次 */
	$wp_customize->add_section('part_toc_section', array(
	'title'          =>'目次',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('toc_position', array(
		'default' => 'h2_1st_under',
		));
		$wp_customize->add_control('toc_position', array(
		'settings' => 'toc_position',
		'label' =>'目次設置箇所',
		'description' => '記事内での目次の設置箇所を変更できます。',
		'section' => 'part_toc_section',
		'type' => 'radio',
		'choices' => array(
		'ttl_under' => 'タイトル下',
		'h2_1st_under' => '最初の見出し2の直前',
		),
		));
		$wp_customize->add_setting('toc_ttl', array(
		));
		$wp_customize->add_control('toc_ttl', array(
		'label' =>'タイトル',
		'description' => '目次のタイトルを変更できます。',
		'section' => 'part_toc_section',
		'settings' => 'toc_ttl',
		));
		$wp_customize->add_setting('toc_main_color', array('default' => '#333333', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'toc_main_color', array(
		'label' => '目次のメインカラー',
		'description' => 'お知らせの文字色を変更できます。',
		'section' => 'part_toc_section',
		'settings' => 'toc_main_color',
		)));
		$wp_customize->add_setting('toc_bg_color', array('default' => '#f7f7f7', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'toc_bg_color', array(
		'label' => '目次の背景色',
		'description' => 'お知らせの背景色を変更できます。',
		'section' => 'part_toc_section',
		'settings' => 'toc_bg_color',
		)));
	/* NEW!アイコン */
	$wp_customize->add_section('advanced_new_mark_section' , array(
	'title'       =>'「NEW」アイコン設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('new_mark_date', array(
		'default' => '3',
		));
		$wp_customize->add_control('new_mark_date', array(
		'label' =>'「NEW」アイコンの表示日数',
		'description' => '「NEW」アイコンが表示されている日数を変更できます。',
		'section' => 'advanced_new_mark_section',
		'settings' => 'new_mark_date',
		'type' => 'number',
		));
	/* カテゴリ */
	$wp_customize->add_section('part_cat_section', array(
	'title'          =>'カテゴリ',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('cat_design', array(
		'default' => 'square',
		));
		$wp_customize->add_control('cat_design', array(
		'settings' => 'cat_design',
		'label' =>'デザイン',
		'description' => 'カテゴリ表示のデザインを変更できます。',
		'section' => 'part_cat_section',
		'type' => 'radio',
		'choices' => array(
		'square' => 'スクエア',
		'oval' => 'オーバル',
		),
		));
		$wp_customize->add_setting('cat_type', array(
		'default' => 'sticker',
		));
		$wp_customize->add_control('cat_type', array(
		'settings' => 'cat_type',
		'label' =>'タイプ',
		'description' => 'カテゴリ表示のタイプを変更できます。',
		'section' => 'part_cat_section',
		'type' => 'radio',
		'choices' => array(
		'simple' => 'シンプル',
		'sticker' => 'ステッカー',
		),
		));
		$wp_customize->add_setting('cat_icon', array(
		'default' => 'fas fa-inbox',
		));
		$wp_customize->add_control('cat_icon', array(
		'label' =>'アイコン',
		'description' => 'カテゴリ表示のアイコンを変更できます。アイコン一覧は<a href="https://fontawesome.com/icons?d=gallery" target="_blank">こちら</a>を参照ください。アイコンが不要な場合には、空白にしてください。',
		'section' => 'part_cat_section',
		'settings' => 'cat_icon',
		));
		$wp_customize->add_setting('cat_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cat_color', array(
		'label' => '文字色',
		'description' => 'カテゴリーの文字色を変更できます。',
		'section' => 'part_cat_section',
		'settings' => 'cat_color',
		)));
		$wp_customize->add_setting('cat_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cat_bg_color', array(
		'label' => '背景色',
		'description' => 'カテゴリーの背景色を変更できます。',
		'section' => 'part_cat_section',
		'settings' => 'cat_bg_color',
		)));
		$wp_customize->add_setting('cat_border_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cat_border_color', array(
		'label' => '枠線色',
		'description' => 'カテゴリーの枠線色を変更できます。',
		'section' => 'part_cat_section',
		'settings' => 'cat_border_color',
		)));
	/* タグ */
	$wp_customize->add_section('part_tag_section', array(
	'title'          =>'タグ',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('tag_design', array(
		'default' => 'oval',
		));
		$wp_customize->add_control('tag_design', array(
		'settings' => 'tag_design',
		'label' =>'デザイン',
		'description' => 'タグ表示のデザインを変更できます。',
		'section' => 'part_tag_section',
		'type' => 'radio',
		'choices' => array(
		'square' => 'スクエア',
		'oval' => 'オーバル',
		),
		));
		$wp_customize->add_setting('tag_icon', array(
		'default' => 'fas fa-map-marker',
		));
		$wp_customize->add_control('tag_icon', array(
		'label' =>'アイコン',
		'description' => 'タグ表示のアイコンを変更できます。アイコン一覧は<a href="https://fontawesome.com/icons?d=gallery" target="_blank">こちら</a>を参照ください。アイコンが不要な場合には、空白にしてください。',
		'section' => 'part_tag_section',
		'settings' => 'tag_icon',
		));
		$wp_customize->add_setting('tag_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_color', array(
		'label' => '文字色',
		'description' => 'タグの文字色を変更できます。',
		'section' => 'part_tag_section',
		'settings' => 'tag_color',
		)));
		$wp_customize->add_setting('tag_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_bg_color', array(
		'label' => '背景色',
		'description' => 'タグの背景色を変更できます。',
		'section' => 'part_tag_section',
		'settings' => 'tag_bg_color',
		)));
		$wp_customize->add_setting('tag_border_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_border_color', array(
		'label' => '枠線色',
		'description' => 'タグの枠線色を変更できます。',
		'section' => 'part_tag_section',
		'settings' => 'tag_border_color',
		)));
	/* 公開日・更新日 */
	$wp_customize->add_section('part_date_section', array(
	'title'          =>'公開日・更新日',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('pubdate_icon', array(
		'default' => 'fas fa-clock',
		));
		$wp_customize->add_control('pubdate_icon', array(
		'label' =>'公開日アイコン',
		'description' => '公開日表示のアイコンを変更できます。アイコン一覧は<a href="https://fontawesome.com/icons?d=gallery" target="_blank">こちら</a>を参照ください。アイコンが不要な場合には、空白にしてください。アイコンが不要な場合には、空白にしてください。',
		'section' => 'part_date_section',
		'settings' => 'pubdate_icon',
		));
		$wp_customize->add_setting('updated_icon', array(
		'default' => 'fas fa-redo-alt',
		));
		$wp_customize->add_control('updated_icon', array(
		'label' =>'更新日アイコン',
		'description' => '更新日表示のアイコンを変更できます。アイコン一覧は<a href="https://fontawesome.com/icons?d=gallery" target="_blank">こちら</a>を参照ください。アイコンが不要な場合には、空白にしてください。アイコンが不要な場合には、空白にしてください。',
		'section' => 'part_date_section',
		'settings' => 'updated_icon',
		));
		$wp_customize->add_setting('date_font_family', array(
		'default' => 'Roboto',
		));
		$wp_customize->add_control('date_font_family', array(
		'settings' => 'date_font_family',
		'label' =>'フォント',
		'description' => '数字フォントを変更できます。',
		'section' => 'part_date_section',
		'type' => 'radio',
		'choices' => array(
		'Lobster' => 'Lobster',
		'Merriweather' => 'Merriweather',
		'Roboto' => 'Roboto',
		'Montserrat' => 'Montserrat',
		),
		));
	/* 著者名 */
	$wp_customize->add_section('part_author_section', array(
	'title'          =>'著者名',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('author_design', array(
		'default' => 'a',
		));
		$wp_customize->add_control('author_design', array(
		'settings' => 'author_design',
		'label' =>'デザイン',
		'description' => 'アバター表示もしくはアイコン表示を設定できます。',
		'section' => 'part_author_section',
		'type' => 'radio',
		'choices' => array(
		'a' => 'アバター',
		'b' => 'アイコン',
		),
		));
		$wp_customize->add_setting('author_icon', array(
		'default' => 'fas fa-user',
		));
		$wp_customize->add_control('author_icon', array(
		'label' =>'著者名アイコン',
		'description' => '著者名表示のアイコンを変更できます。アイコン一覧は<a href="https://fontawesome.com/icons?d=gallery" target="_blank">こちら</a>を参照ください。アイコンが不要な場合には、空白にしてください。',
		'section' => 'part_author_section',
		'settings' => 'author_icon',
		));
	/* 関連記事 */
	$wp_customize->add_section('part_related_section' , array(
	'title'       =>'関連記事',
	'priority'    => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('related_ttl', array(
		'default' => 'RECOMMEND',
		));
		$wp_customize->add_control('related_ttl', array(
		'label' =>'タイトル',
		'description' => 'タイトルを変更できます。',
		'section' => 'part_related_section',
		'settings' => 'related_ttl',
		));
		$wp_customize->add_setting('related_desc', array(
		'default' => 'こちらの記事も人気です。',
		));
		$wp_customize->add_control('related_desc', array(
		'label' =>'サブタイトル',
		'description' => 'サブタイトルを変更できます。',
		'section' => 'part_related_section',
		'settings' => 'related_desc',
		));
		$wp_customize->add_setting('related_number', array(
		'default' => '8',
		));
		$wp_customize->add_control('related_number', array(
		'settings' => 'related_number',
		'label' =>'記事の表示数',
		'description' => '記事の表示数を変更できます。',
		'section' => 'part_related_section',
		'type' => 'number',
		));
		$wp_customize->add_setting('related_cat_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('related_cat_state', array(
		'settings' => 'related_cat_state',
		'label' =>'カテゴリーを表示しない',
		'description' => 'カテゴリーの表示を選択できます。',
		'section' => 'part_related_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('related_date_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('related_date_state', array(
		'settings' => 'related_date_state',
		'label' =>'公開日表示設定',
		'description' => '公開日の表示を選択できます。',
		'section' => 'part_related_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('related_slider_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('related_slider_state', array(
		'settings' => 'related_slider_state',
		'label' =>'スライダー有効化設定',
		'description' => 'スマホ表示でスライダー設定を選択できます。',
		'section' => 'part_related_section',
		'type' => 'radio',
		'choices' => array(
		'slider' => '有効',
		'static' => '無効',
		),
		));
	/* 著者情報 */
	$wp_customize->add_section('part_author_info_section' , array(
	'title'       =>'著者情報',
	'priority'    => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('author_info_ttl', array(
		'default' => 'AUTHOR',
		));
		$wp_customize->add_control('author_info_ttl', array(
		'label' =>'タイトル',
		'description' => 'タイトルの変更ができます。',
		'section' => 'part_author_info_section',
		'settings' => 'author_info_ttl',
		));
		$wp_customize->add_setting('author_info_desc', array(
		'default' => 'この記事を書いた著者',
		));
		$wp_customize->add_control('author_info_desc', array(
		'label' =>'サブタイトル',
		'description' => 'サブタイトルの変更ができます。',
		'section' => 'part_author_info_section',
		'settings' => 'author_info_desc',
		));
		$wp_customize->add_setting('author_info_avatar_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('author_info_avatar_state', array(
		'settings' => 'author_info_avatar_state',
		'label' =>'アバター表示',
		'description' => 'アバター表示を選択できます。',
		'section' => 'part_author_info_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
	/* 著者最新記事 */
	$wp_customize->add_section('part_author_posts_section' , array(
	'title'       =>'著者最新記事',
	'priority'    => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('author_posts_ttl', array(
		'default' => 'MY NEW POSTS',
		));
		$wp_customize->add_control('author_posts_ttl', array(
		'label' =>'タイトル',
		'description' => 'タイトルの変更ができます。',
		'section' => 'part_author_posts_section',
		'settings' => 'author_posts_ttl',
		));
		$wp_customize->add_setting('author_posts_desc', array(
		'default' => 'この著者の最新記事',
		));
		$wp_customize->add_control('author_posts_desc', array(
		'label' =>'サブタイトル',
		'description' => 'サブタイトルの変更ができます。',
		'section' => 'part_author_posts_section',
		'settings' => 'author_posts_desc',
		));
		$wp_customize->add_setting('author_posts_number', array(
		'default' => '8',
		));
		$wp_customize->add_control('author_posts_number', array(
		'settings' => 'author_posts_number',
		'label' =>'記事の表示数',
		'description' => '記事の表示数を変更できます。',
		'section' => 'part_author_posts_section',
		'type' => 'number',
		));
		$wp_customize->add_setting('author_posts_cat_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('author_posts_cat_state', array(
		'settings' => 'author_posts_cat_state',
		'label' =>'カテゴリーを表示しない',
		'description' => 'カテゴリーの表示を選択できます。',
		'section' => 'part_author_posts_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('author_posts_date_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('author_posts_date_state', array(
		'settings' => 'author_posts_date_state',
		'label' =>'公開日表示設定',
		'description' => '公開日の表示を選択できます。',
		'section' => 'part_author_posts_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('author_posts_slider_state', array(
		'default' => 'slider',
		));
		$wp_customize->add_control('author_posts_slider_state', array(
		'settings' => 'author_posts_slider_states',
		'label' =>'スライダー有効化設定',
		'description' => 'スマホ表示でスライダーを有効にする。',
		'section' => 'part_author_posts_section',
		'type' => 'radio',
		'choices' => array(
		'slider' => '有効',
		'static' => '無効',
		),
		));
	/* ブログカード */
	$wp_customize->add_section('blogcard_section', array(
	'title'          =>'ブログカード',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('blogcard_type', array(
		'default' => 'blogcard_type_d',
		));
		$wp_customize->add_control('blogcard_type', array(
		'settings' => 'blogcard_type',
		'label' =>'ブログカードのデザイン',
		'description' => 'ブログカードのデザインを変更できます。',
		'section' => 'blogcard_section',
		'type' => 'radio',
		'choices' => array(
		'blogcard_type_a' => 'シンプル（縦長）タイプ',
		'blogcard_type_b' => 'シンプル（横長）タイプ',
		'blogcard_type_c' => 'カード（縦長）タイプ',
		'blogcard_type_d' => 'カード（横長）タイプ',
		'blogcard_type_e' => 'はてな風タイプ',
		'blogcard_type_f' => 'note風タイプ',
		),
		));
		$wp_customize->add_setting('blogcard_clip', array(
		'default' => 'blogcard_clip_a',
		));
		$wp_customize->add_control('blogcard_clip', array(
		'settings' => 'blogcard_clip',
		'label' =>'ブログカードのクリップ',
		'description' => 'ブログカードのクリップを変更できます。',		
		'section' => 'blogcard_section',
		'type' => 'radio',
		'choices' => array(
		'none' => 'なし',
		'blogcard_clip_a' => 'セロテープ',
		),
		));
		$wp_customize->add_setting('blogcard_cache', array(
		));
		$wp_customize->add_control('blogcard_cache', array(
		'label' =>'ブログカードのキャッシュクリア',
		'description' => 'キャッシュをクリアしたいブログカードURLを入力し登録してください。',
		'section' => 'blogcard_section',
		'settings' => 'blogcard_cache',
		));
	/* SNSシェアボタン */
	$wp_customize->add_section('part_share_section' , array(
	'title'       =>'SNSシェアボタン',
	'priority'    => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('share_twitter_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('share_twitter_state', array(
		'settings' => 'share_twitter_state',
		'label' => 'Twitter',
		'section' => 'part_share_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('share_facebook_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('share_facebook_state', array(
		'settings' => 'share_facebook_state',
		'label' => 'Facebook',
		'section' => 'part_share_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('share_google_plus_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('share_google_plus_state', array(
		'settings' => 'share_google_plus_state',
		'label' => 'Google+',
		'section' => 'part_share_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('share_hatebu_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('share_hatebu_state', array(
		'settings' => 'share_hatebu_state',
		'label' => 'はてなブックマーク',
		'section' => 'part_share_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('share_pocket_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('share_pocket_state', array(
		'settings' => 'share_pocket_state',
		'label' => 'Pocket',
		'section' => 'part_share_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('share_feedly_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('share_feedly_state', array(
		'settings' => 'share_feedly_state',
		'label' => 'Feedly',
		'section' => 'part_share_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('share_line_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('share_line_state', array(
		'settings' => 'share_line_state',
		'label' => 'LINE',
		'section' => 'part_share_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('share_design', array(
		'default' => 'circle',
		));
		$wp_customize->add_control('share_design', array(
		'settings' => 'share_design',
		'label' =>'デザイン',
		'description' => 'デザインの変更ができます。',
		'section' => 'part_share_section',
		'type' => 'radio',
		'choices' => array(
		'simple' => 'シンプル',
		'circle' => '丸',
		'landscape' => '横長',
		),
		));
		$wp_customize->add_setting('share_color', array(
		'default' => 'brand',
		));
		$wp_customize->add_control('share_color', array(
		'settings' => 'share_color',
		'label' =>'カラーリング',
		'description' => 'カラーリングの変更ができます。',
		'section' => 'part_share_section',
		'type' => 'radio',
		'choices' => array(
		'monochrome ' => 'モノクロ',
		'brand' => 'ブランドカラー',
		),
		));
	/* SNSフォローボタン */
	$wp_customize->add_section('part_follow_section' , array(
	'title'       =>'SNSフォローボタン',
	'priority'    => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
/*
		$wp_customize->add_setting('twitter_id', array(
		));
		$wp_customize->add_control('twitter_id', array(
		'label' =>'TwitterのID',
		'description' => 'TwitterのIDを記入してください。（@は含めない）',
		'section' => 'part_follow_section',
		'settings' => 'twitter_id',
		));
*/
/*
		$wp_customize->add_setting('instagram_id', array(
		));
		$wp_customize->add_control('instagram_id', array(
		'label' =>'InstagramのユーザーID',
		'description' => 'InstagramのユーザーIDを記入してください。',
		'section' => 'part_follow_section',
		'settings' => 'instagram_id',
		));
*/
		$wp_customize->add_setting('facebook_page_id', array(
		));
		$wp_customize->add_control('facebook_page_id', array(
		'label' =>'FacebookページのURL',
		'description' => 'FacebookページのURLを記入してください。',
		'section' => 'part_follow_section',
		'settings' => 'facebook_page_id',
		));
/*
		$wp_customize->add_setting('feedly_id', array(
		));
		$wp_customize->add_control('feedly_id', array(
		'label' =>'FeedlyのURL',
		'description' => 'FeedlyのURLを記入してください。',
		'section' => 'part_follow_section',
		'settings' => 'feedly_id',
		));
*/
		$wp_customize->add_setting('follow_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'follow_color', array(
		'label' => '文字色',
		'description' => '文字色を変更できます。',
		'section' => 'part_follow_section',
		'settings' => 'follow_color',
		)));
		$wp_customize->add_setting('follow_bg_color', array('default' => '#cccccc', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'follow_bg_color', array(
		'label' => '背景色',
		'description' => '背景色を変更できます。',
		'section' => 'part_follow_section',
		'settings' => 'follow_bg_color',
		)));
	/* CTA */
	$wp_customize->add_section('part_cta_section' , array(
	'title'       =>'CTA',
	'priority'    => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('cta_ttl', array(
		));
		$wp_customize->add_control('cta_ttl', array(
		'label' =>'見出し',
		'description' => '見出しを記入してください。',
		'section' => 'part_cta_section',
		'settings' => 'cta_ttl',
		));
		$wp_customize->add_setting('cta_desc', array(
		));
		$wp_customize->add_control('cta_desc', array(
		'label' =>'説明文',
		'description' => '説明文を記入してください。',
		'section' => 'part_cta_section',
		'type' => 'textarea',
		'settings' => 'cta_desc',
		));
		$wp_customize->add_setting('cta_img');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cta_img', array(
		'label' =>'画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'part_cta_section',
		'settings'   => 'cta_img',
		)));
		$wp_customize->add_setting('cta_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_color', array(
		'label' => '文字色',
		'description' => '見出しと説明文の文字色を変更できます。',
		'section' => 'part_cta_section',
		'settings' => 'cta_color',
		)));
		$wp_customize->add_setting('cta_bg_color', array('default' => '#cccccc', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bg_color', array(
		'label' => '背景色',
		'description' => '見出しと説明文の背景色を変更できます。',
		'section' => 'part_cta_section',
		'settings' => 'cta_bg_color',
		)));
		$wp_customize->add_setting('cta_btn_txt', array(
		));
		$wp_customize->add_control('cta_btn_txt', array(
		'label' =>'ボタンテキスト',
		'description' => 'ボタンを設置する場合は、ボタンテキストを記入してください。',
		'section' => 'part_cta_section',
		'settings' => 'cta_btn_txt',
		));
		$wp_customize->add_setting('cta_btn_url', array(
		));
		$wp_customize->add_control('cta_btn_url', array(
		'label' =>'リンクURL',
		'description' => 'ボタンのリンク先をURLで記入してください。',
		'section' => 'part_cta_section',
		'settings' => 'cta_btn_url',
		));
		$wp_customize->add_setting('cta_btn_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_btn_color', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタンの文字色を変更できます。',
		'section' => 'part_cta_section',
		'settings' => 'cta_btn_color',
		)));
		$wp_customize->add_setting('cta_btn_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_btn_bg_color', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'part_cta_section',
		'settings' => 'cta_btn_bg_color',
		)));
	/* ページネーション */
	$wp_customize->add_section('pagination', array(
	'title'          =>'ページネーション',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('pagination_current_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_current_color', array(
		'label' => '現在のページボタン文字色',
		'description' => '現在のページボタンの文字色を変更できます。',
		'section' => 'pagination',
		'settings' => 'pagination_current_color',
		)));
		$wp_customize->add_setting('pagination_current_bg_color', array('default' => '#999999', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_current_bg_color', array(
		'label' => '現在のページボタン背景色',
		'description' => '現在のページボタンの背景色です。',
		'section' => 'pagination',
		'settings' => 'pagination_current_bg_color',
		)));
		$wp_customize->add_setting('pagination_a_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_a_color', array(
		'label' => 'リンク可能なページボタン文字色',
		'description' => 'リンク可能なページボタンの文字色を変更できます。',
		'section' => 'pagination',
		'settings' => 'pagination_a_color',
		)));
		$wp_customize->add_setting('pagination_a_bg_color', array('default' => '#cccccc', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_a_bg_color', array(
		'label' => 'リンク可能なページボタン背景色',
		'description' => 'リンク可能なページボタンの背景色です。',
		'section' => 'pagination',
		'settings' => 'pagination_a_bg_color',
		)));
		$wp_customize->add_setting('pagination_dots_color', array('default' => '#cccccc', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_dots_color', array(
		'label' => 'ドット表示の文字色',
		'description' => 'ページ数が増えた場合にのみ表示されるドットの文字色を変更できます。',
		'section' => 'pagination',
		'settings' => 'pagination_dots_color',
		)));
		$wp_customize->add_setting('pagination_dots_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_dots_bg_color', array(
		'label' => 'ドット表示の背景色',
		'description' => 'ページ数が増えた場合にのみ表示されるドットの背景色です。',
		'section' => 'pagination',
		'settings' => 'pagination_dots_bg_color',
		)));
	/* トップへ戻るボタン */
	$wp_customize->add_section('page_top_btn_section', array(
	'title'          =>'トップへ戻るボタン',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('page_top_btn_type', array(
		'default' => 'circle',
		));
		$wp_customize->add_control('page_top_btn_type', array(
		'settings' => 'page_top_btn_type',
		'label' =>'トップへ戻るボタンの形',
		'description' => 'トップへ戻るボタンの形を選択できます。',
		'section' => 'page_top_btn_section',
		'type' => 'radio',
		'choices' => array(
		'circle' => '丸',
		'square' => '正方形',
		),
		));
		$wp_customize->add_setting('page_top_btn_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_top_btn_color', array(
		'label' => 'トップへ戻るボタンの文字色',
		'description' => 'トップへ戻るボタンの文字色を変更できます。',
		'section' => 'page_top_btn_section',
		'settings' => 'page_top_btn_color',
		)));
		$wp_customize->add_setting('page_top_btn_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_top_btn_bg_color', array(
		'label' => 'トップへ戻るボタンの背景色',
		'description' => 'トップへ戻るボタンの背景色を変更できます。',
		'section' => 'page_top_btn_section',
		'settings' => 'page_top_btn_bg_color',
		)));
	/* 見出し */
	$wp_customize->add_section('heading_section', array(
	'title'          =>'見出し',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('h2_type', array(
		'default' => 'h_type_a',
		));
		$wp_customize->add_control('h2_type', array(
		'settings' => 'h2_type',
		'label' =>'見出し2',
		'description' => '見出し２のデザインを変更できます。',
		'section' => 'heading_section',
		'type' => 'select',
		'choices' => array(
		'h_type_a' => '装飾のないフォントのみのデザイン',
		'h_type_b' => 'タイトル下に細線をひいたデザイン',
		'h_type_c' => 'タイトル下に細線をひき、先頭の文字のみ大きくなるデザイン',
		'h_type_d' => 'タイトル下に2本線をひいたデザイン',
		'h_type_e' => 'タイトル上下に細線をひいたデザイン',
		'h_type_f' => 'タイトル上下に2本線をひいたデザイン',
		'h_type_g' => 'タイトル左に太線をひいたデザイン',
		'h_type_h' => 'タイトル左に太線とタイトル下に細線をひいたデザイン',
		'h_type_i' => 'タイトル全体を細線で囲ったデザイン',
		'h_type_j' => 'タイトル全体を細線で囲い、角丸にしたデザイン',
		'h_type_k' => 'タイトル全体を細線で囲い、タイトル左にアクセントを入れたデザイン',
		'h_type_l' => 'タイトル全体に背景色を指定したデザイン',
		'h_type_m' => 'タイトル全体に背景色を指定し、角丸にしたデザイン',
		'h_type_n' => 'タイトル全体に背景色を指定し、タイトル下に細線をひいたデザイン',
		'h_type_o' => 'タイトル全体に背景色を指定し、タイトル上下に細線をひいたデザイン',
		'h_type_p' => 'タイトル全体に背景色を指定し、タイトル左に太線をひいたデザイン',
		'h_type_q' => 'タイトル全体に背景色を指定し、2本線で囲ったデザイン',
		'h_type_r' => 'タイトル下に色の異なる太線をひいたデザイン',
		'h_type_s' => '吹き出しのデザイン',
		'h_type_t' => '内側に影がかかった吹き出しのデザイン',
		'h_type_u' => '立体的な箱風のデザイン',
		'h_type_v' => '折り返し位置が左右ともに下側にあるリボンのデザイン',
		'h_type_w' => '折り返し位置が左右で異なるリボンのデザイン',
		'h_type_x' => '紙の片端を折り返したドッグイヤーのフラットデザイン',
		'h_type_y' => '紙の片端を折り返したドッグイヤーのリッチデザイン',
		'h_type_ad' => 'ステッチ風のデザイン',
		'h_type_ae' => 'テキストにマーカーでアンダーラインをひいたようなデザイン',
		'h_type_af' => 'タイトル全体にグラデーションの背景を指定したデザイン',
		'h_type_ag' => 'タイトル全体にストライプの背景を指定したデザイン',
		'h_type_ah' => 'タイトル全体にグラデーションの背景を指定し、タイトル上の太線とタイトル左右下の細線と組み合わせたデザイン',
		),
		));
		$wp_customize->add_setting('h3_type', array(
		'default' => 'h_type_a',
		));
		$wp_customize->add_control('h3_type', array(
		'settings' => 'h3_type',
		'label' =>'見出し3',	
		'description' => '見出し3のデザインを変更できます。',
		'section' => 'heading_section',
		'type' => 'select',
		'choices' => array(
		'h_type_a' => '装飾のないフォントのみのデザイン',
		'h_type_b' => 'タイトル下に細線をひいたデザイン',
		'h_type_c' => 'タイトル下に細線をひき、先頭の文字のみ大きくなるデザイン',
		'h_type_d' => 'タイトル下に2本線をひいたデザイン',
		'h_type_e' => 'タイトル上下に細線をひいたデザイン',
		'h_type_f' => 'タイトル上下に2本線をひいたデザイン',
		'h_type_g' => 'タイトル左に太線をひいたデザイン',
		'h_type_h' => 'タイトル左に太線とタイトル下に細線をひいたデザイン',
		'h_type_i' => 'タイトル全体を細線で囲ったデザイン',
		'h_type_j' => 'タイトル全体を細線で囲い、角丸にしたデザイン',
		'h_type_k' => 'タイトル全体を細線で囲い、タイトル左にアクセントを入れたデザイン',
		'h_type_l' => 'タイトル全体に背景色を指定したデザイン',
		'h_type_m' => 'タイトル全体に背景色を指定し、角丸にしたデザイン',
		'h_type_n' => 'タイトル全体に背景色を指定し、タイトル下に細線をひいたデザイン',
		'h_type_o' => 'タイトル全体に背景色を指定し、タイトル上下に細線をひいたデザイン',
		'h_type_p' => 'タイトル全体に背景色を指定し、タイトル左に太線をひいたデザイン',
		'h_type_q' => 'タイトル全体に背景色を指定し、2本線で囲ったデザイン',
		'h_type_r' => 'タイトル下に色の異なる太線をひいたデザイン',
		'h_type_s' => '吹き出しのデザイン',
		'h_type_t' => '内側に影がかかった吹き出しのデザイン',
		'h_type_u' => '立体的な箱風のデザイン',
		'h_type_v' => '折り返し位置が左右ともに下側にあるリボンのデザイン',
		'h_type_w' => '折り返し位置が左右で異なるリボンのデザイン',
		'h_type_x' => '紙の片端を折り返したドッグイヤーのフラットデザイン',
		'h_type_y' => '紙の片端を折り返したドッグイヤーのリッチデザイン',
		'h_type_ad' => 'ステッチ風のデザイン',
		'h_type_ae' => 'テキストにマーカーでアンダーラインをひいたようなデザイン',
		'h_type_af' => 'タイトル全体にグラデーションの背景を指定したデザイン',
		'h_type_ag' => 'タイトル全体にストライプの背景を指定したデザイン',
		'h_type_ah' => 'タイトル全体にグラデーションの背景を指定し、タイトル上の太線とタイトル左右下の細線と組み合わせたデザイン',
		),
		));
		$wp_customize->add_setting('h4_type', array(
		'default' => 'h_type_a',
		));
		$wp_customize->add_control('h4_type', array(
		'settings' => 'h4_type',
		'label' =>'見出し4',
		'description' => '見出し4のデザインを変更できます。',		
		'section' => 'heading_section',
		'type' => 'select',
		'choices' => array(
		'h_type_a' => '装飾のないフォントのみのデザイン',
		'h_type_b' => 'タイトル下に細線をひいたデザイン',
		'h_type_c' => 'タイトル下に細線をひき、先頭の文字のみ大きくなるデザイン',
		'h_type_d' => 'タイトル下に2本線をひいたデザイン',
		'h_type_e' => 'タイトル上下に細線をひいたデザイン',
		'h_type_f' => 'タイトル上下に2本線をひいたデザイン',
		'h_type_g' => 'タイトル左に太線をひいたデザイン',
		'h_type_h' => 'タイトル左に太線とタイトル下に細線をひいたデザイン',
		'h_type_i' => 'タイトル全体を細線で囲ったデザイン',
		'h_type_j' => 'タイトル全体を細線で囲い、角丸にしたデザイン',
		'h_type_k' => 'タイトル全体を細線で囲い、タイトル左にアクセントを入れたデザイン',
		'h_type_l' => 'タイトル全体に背景色を指定したデザイン',
		'h_type_m' => 'タイトル全体に背景色を指定し、角丸にしたデザイン',
		'h_type_n' => 'タイトル全体に背景色を指定し、タイトル下に細線をひいたデザイン',
		'h_type_o' => 'タイトル全体に背景色を指定し、タイトル上下に細線をひいたデザイン',
		'h_type_p' => 'タイトル全体に背景色を指定し、タイトル左に太線をひいたデザイン',
		'h_type_q' => 'タイトル全体に背景色を指定し、2本線で囲ったデザイン',
		'h_type_r' => 'タイトル下に色の異なる太線をひいたデザイン',
		'h_type_s' => '吹き出しのデザイン',
		'h_type_t' => '内側に影がかかった吹き出しのデザイン',
		'h_type_u' => '立体的な箱風のデザイン',
		'h_type_v' => '折り返し位置が左右ともに下側にあるリボンのデザイン',
		'h_type_w' => '折り返し位置が左右で異なるリボンのデザイン',
		'h_type_x' => '紙の片端を折り返したドッグイヤーのフラットデザイン',
		'h_type_y' => '紙の片端を折り返したドッグイヤーのリッチデザイン',
		'h_type_ad' => 'ステッチ風のデザイン',
		'h_type_ae' => 'テキストにマーカーでアンダーラインをひいたようなデザイン',
		'h_type_af' => 'タイトル全体にグラデーションの背景を指定したデザイン',
		'h_type_ag' => 'タイトル全体にストライプの背景を指定したデザイン',
		'h_type_ah' => 'タイトル全体にグラデーションの背景を指定し、タイトル上の太線とタイトル左右下の細線と組み合わせたデザイン',
		),
		));
		$wp_customize->add_setting('h5_type', array(
		'default' => 'h_type_a',
		));
		$wp_customize->add_control('h5_type', array(
		'settings' => 'h5_type',
		'label' =>'見出し5',
		'description' => '見出し5のデザインを変更できます。',
		'section' => 'heading_section',
		'type' => 'select',
		'choices' => array(
		'h_type_a' => '装飾のないフォントのみのデザイン',
		'h_type_b' => 'タイトル下に細線をひいたデザイン',
		'h_type_c' => 'タイトル下に細線をひき、先頭の文字のみ大きくなるデザイン',
		'h_type_d' => 'タイトル下に2本線をひいたデザイン',
		'h_type_e' => 'タイトル上下に細線をひいたデザイン',
		'h_type_f' => 'タイトル上下に2本線をひいたデザイン',
		'h_type_g' => 'タイトル左に太線をひいたデザイン',
		'h_type_h' => 'タイトル左に太線とタイトル下に細線をひいたデザイン',
		'h_type_i' => 'タイトル全体を細線で囲ったデザイン',
		'h_type_j' => 'タイトル全体を細線で囲い、角丸にしたデザイン',
		'h_type_k' => 'タイトル全体を細線で囲い、タイトル左にアクセントを入れたデザイン',
		'h_type_l' => 'タイトル全体に背景色を指定したデザイン',
		'h_type_m' => 'タイトル全体に背景色を指定し、角丸にしたデザイン',
		'h_type_n' => 'タイトル全体に背景色を指定し、タイトル下に細線をひいたデザイン',
		'h_type_o' => 'タイトル全体に背景色を指定し、タイトル上下に細線をひいたデザイン',
		'h_type_p' => 'タイトル全体に背景色を指定し、タイトル左に太線をひいたデザイン',
		'h_type_q' => 'タイトル全体に背景色を指定し、2本線で囲ったデザイン',
		'h_type_r' => 'タイトル下に色の異なる太線をひいたデザイン',
		'h_type_s' => '吹き出しのデザイン',
		'h_type_t' => '内側に影がかかった吹き出しのデザイン',
		'h_type_u' => '立体的な箱風のデザイン',
		'h_type_v' => '折り返し位置が左右ともに下側にあるリボンのデザイン',
		'h_type_w' => '折り返し位置が左右で異なるリボンのデザイン',
		'h_type_x' => '紙の片端を折り返したドッグイヤーのフラットデザイン',
		'h_type_y' => '紙の片端を折り返したドッグイヤーのリッチデザイン',
		'h_type_ad' => 'ステッチ風のデザイン',
		'h_type_ae' => 'テキストにマーカーでアンダーラインをひいたようなデザイン',
		'h_type_af' => 'タイトル全体にグラデーションの背景を指定したデザイン',
		'h_type_ag' => 'タイトル全体にストライプの背景を指定したデザイン',
		'h_type_ah' => 'タイトル全体にグラデーションの背景を指定し、タイトル上の太線とタイトル左右下の細線と組み合わせたデザイン',
		),
		));
		$wp_customize->add_setting('h6_type', array(
		'default' => 'h_type_a',
		));
		$wp_customize->add_control('h6_type', array(
		'settings' => 'h6_type',
		'label' =>'見出し6',
		'description' => '見出し6のデザインを変更できます。',
		'section' => 'heading_section',
		'type' => 'select',
		'choices' => array(
		'h_type_a' => '装飾のないフォントのみのデザイン',
		'h_type_b' => 'タイトル下に細線をひいたデザイン',
		'h_type_c' => 'タイトル下に細線をひき、先頭の文字のみ大きくなるデザイン',
		'h_type_d' => 'タイトル下に2本線をひいたデザイン',
		'h_type_e' => 'タイトル上下に細線をひいたデザイン',
		'h_type_f' => 'タイトル上下に2本線をひいたデザイン',
		'h_type_g' => 'タイトル左に太線をひいたデザイン',
		'h_type_h' => 'タイトル左に太線とタイトル下に細線をひいたデザイン',
		'h_type_i' => 'タイトル全体を細線で囲ったデザイン',
		'h_type_j' => 'タイトル全体を細線で囲い、角丸にしたデザイン',
		'h_type_k' => 'タイトル全体を細線で囲い、タイトル左にアクセントを入れたデザイン',
		'h_type_l' => 'タイトル全体に背景色を指定したデザイン',
		'h_type_m' => 'タイトル全体に背景色を指定し、角丸にしたデザイン',
		'h_type_n' => 'タイトル全体に背景色を指定し、タイトル下に細線をひいたデザイン',
		'h_type_o' => 'タイトル全体に背景色を指定し、タイトル上下に細線をひいたデザイン',
		'h_type_p' => 'タイトル全体に背景色を指定し、タイトル左に太線をひいたデザイン',
		'h_type_q' => 'タイトル全体に背景色を指定し、2本線で囲ったデザイン',
		'h_type_r' => 'タイトル下に色の異なる太線をひいたデザイン',
		'h_type_s' => '吹き出しのデザイン',
		'h_type_t' => '内側に影がかかった吹き出しのデザイン',
		'h_type_u' => '立体的な箱風のデザイン',
		'h_type_v' => '折り返し位置が左右ともに下側にあるリボンのデザイン',
		'h_type_w' => '折り返し位置が左右で異なるリボンのデザイン',
		'h_type_x' => '紙の片端を折り返したドッグイヤーのフラットデザイン',
		'h_type_y' => '紙の片端を折り返したドッグイヤーのリッチデザイン',
		'h_type_ad' => 'ステッチ風のデザイン',
		'h_type_ae' => 'テキストにマーカーでアンダーラインをひいたようなデザイン',
		'h_type_af' => 'タイトル全体にグラデーションの背景を指定したデザイン',
		'h_type_ag' => 'タイトル全体にストライプの背景を指定したデザイン',
		'h_type_ah' => 'タイトル全体にグラデーションの背景を指定し、タイトル上の太線とタイトル左右下の細線と組み合わせたデザイン',
		),
		));
		$wp_customize->add_setting('heading_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_color', array(
		'label' => '見出し文字色',
		'description' => '記事のなかでつかわれる見出しの文字色を変更できます。',
		'section' => 'heading_section',
		'settings' => 'heading_color',
		)));
		$wp_customize->add_setting('heading_base_color', array('default' => '#f0f0f0', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_base_color', array(
		'label' => '見出し背景色',
		'description' => '記事のなかでつかわれる見出しの背景色を変更できます。',
		'section' => 'heading_section',
		'settings' => 'heading_base_color',
		)));
		$wp_customize->add_setting('heading_main_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_main_color', array(
		'label' => '見出しメインカラー',
		'description' => '記事のなかでつかわれる見出しの線や枠線の色を変更できます。',
		'section' => 'heading_section',
		'settings' => 'heading_main_color',
		)));
		$wp_customize->add_setting('heading_accent_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_accent_color', array(
		'label' => '見出しアクセントカラー',
		'description' => '記事のなかでつかわれる見出しの線や枠線の色を変更できます。',
		'section' => 'heading_section',
		'settings' => 'heading_accent_color',
		)));
	/* 引用文 */
	$wp_customize->add_section('blockquote_section', array(
	'title'          =>'引用文',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('blockquote_type', array(
		'default' => 'blockquote_type_a',
		));
		$wp_customize->add_control('blockquote_type', array(
		'settings' => 'blockquote_type',
		'label' =>'デザイン',
		'description' => 'デザインを変更できます。',
		'section' => 'blockquote_section',
		'type' => 'radio',
		'choices' => array(
		'blockquote_type_a' => 'シンプルなデザイン',
		'blockquote_type_b' => '左に太線をひいたデザイン',
		'blockquote_type_c' => '上下左右に細線をひいたデザイン',
		'blockquote_type_d' => '上から紙が折り込まれているデザイン',
		'blockquote_type_e' => '横から紙が折り込まれているデザイン',
		),
		));
		$wp_customize->add_setting('blockquote_font_style', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('blockquote_font_style', array(
		'settings' => 'blockquote_font_style',
		'label' => 'テキストスタイル',
		'description' => 'テキストスタイルを変更できます。',
		'section' => 'blockquote_section',
		'type' => 'radio',
		'choices' => array(
		'normal' => '標準',
		'italic' => 'イタリック',
		),
		));
		$wp_customize->add_setting('blockquote_shadow', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('blockquote_shadow', array(
		'settings' => 'blockquote_shadow',
		'label' => '影表示',
		'description' => '影表示を選択できます。',
		'section' => 'blockquote_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('blockquote_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote_color', array(
		'label' => '引用文文字色',
		'description' => '記事のなかでつかわれる引用の文字色を変更できます。',
		'section' => 'blockquote_section',
		'settings' => 'blockquote_color',
		)));
		$wp_customize->add_setting('blockquote_base_color', array('default' => '#f0f0f0', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote_base_color', array(
		'label' => '引用文背景色',
		'description' => '記事のなかでつかわれる引用の背景色を変更できます。',
		'section' => 'blockquote_section',
		'settings' => 'blockquote_base_color',
		)));
		$wp_customize->add_setting('blockquote_main_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote_main_color', array(
		'label' => '引用文メインカラー',
		'description' => '記事のなかでつかわれる引用の線色を変更できます。',
		'section' => 'blockquote_section',
		'settings' => 'blockquote_main_color',
		)));
		$wp_customize->add_setting('blockquote_accent_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote_accent_color', array(
		'label' => '引用文アクセントカラー',
		'description' => '記事のなかでつかわれる引用のアクセントカラーを変更できます。',
		'section' => 'blockquote_section',
		'settings' => 'blockquote_accent_color',
		)));
	/* ボックス */
	$wp_customize->add_section('box_section', array(
	'title'          =>'ボックス',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('box1_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box1_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box1_bg_color',
		)));
		$wp_customize->add_setting('box1_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box1_border_color', array(
		'label' => '枠線色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box1_border_color',
		)));
		$wp_customize->add_setting('box1_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box1_border_width', array(
		'settings' => 'box1_border_width',
		'label' => '線の太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'thin' => '細',
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box1_border_radius', array(
		'default' => 'none',
		));
		$wp_customize->add_control('box1_border_radius', array(
		'settings' => 'box1_border_radius',
		'label' => '角丸',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'none' => 'なし',
		'small' => '小',
		'medium' => '標準',
		'large' => '大',
		),
		));
		$wp_customize->add_setting('box1_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box1_shadow', array(
		'settings' => 'box1_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box2_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box2_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box2_bg_color',
		)));
		$wp_customize->add_setting('box2_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box2_border_color', array(
		'label' => '枠線色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box2_border_color',
		)));
		$wp_customize->add_setting('box2_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box2_border_width', array(
		'settings' => 'box2_border_width',
		'label' => '線の太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'thin' => '細',
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box2_border_radius', array(
		'default' => 'none',
		));
		$wp_customize->add_control('box2_border_radius', array(
		'settings' => 'box2_border_radius',
		'label' => '角丸',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'none' => 'なし',
		'small' => '小',
		'medium' => '標準',
		'large' => '大',
		),
		));
		$wp_customize->add_setting('box2_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box2_shadow', array(
		'settings' => 'box2_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box3_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box3_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box3_bg_color',
		)));
		$wp_customize->add_setting('box3_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box3_border_color', array(
		'label' => '枠線色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box3_border_color',
		)));
		$wp_customize->add_setting('box3_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box3_border_width', array(
		'settings' => 'box3_border_width',
		'label' => '線の太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box3_border_radius', array(
		'default' => 'none',
		));
		$wp_customize->add_control('box3_border_radius', array(
		'settings' => 'box3_border_radius',
		'label' => '角丸',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'none' => 'なし',
		'small' => '小',
		'medium' => '標準',
		'large' => '大',
		),
		));
		$wp_customize->add_setting('box3_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box3_shadow', array(
		'settings' => 'box3_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box4_bg_color', array('default' => '#edf6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box4_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box4_bg_color',
		)));
		$wp_customize->add_setting('box4_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box4_border_color', array(
		'label' => '枠線色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box4_border_color',
		)));
		$wp_customize->add_setting('box4_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box4_border_width', array(
		'settings' => 'box4_border_width',
		'label' => '線の太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'thin' => '細',
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box4_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box4_shadow', array(
		'settings' => 'box4_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box5_bg_color', array('default' => '#edf6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box5_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box5_bg_color',
		)));
		$wp_customize->add_setting('box5_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box5_border_color', array(
		'label' => '枠線色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box5_border_color',
		)));
		$wp_customize->add_setting('box5_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box5_border_width', array(
		'settings' => 'box5_border_width',
		'label' => '線の太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'thin' => '細',
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box5_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box5_shadow', array(
		'settings' => 'box5_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box6_bg_color', array('default' => '#edf6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box6_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box6_bg_color',
		)));
		$wp_customize->add_setting('box6_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box6_border_color', array(
		'label' => '枠線色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box6_border_color',
		)));
		$wp_customize->add_setting('box6_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box6_border_width', array(
		'settings' => 'box6_border_width',
		'label' => '線の太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'thin' => '細',
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box6_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box6_shadow', array(
		'settings' => 'box6_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box7_bg_color', array('default' => '#edf6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box7_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box7_bg_color',
		)));
		$wp_customize->add_setting('box7_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box7_border_color', array(
		'label' => '枠線色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box7_border_color',
		)));
		$wp_customize->add_setting('box7_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box7_border_width', array(
		'settings' => 'box7_border_width',
		'label' => '線の太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'thin' => '細',
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box7_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box7_shadow', array(
		'settings' => 'box7_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box8_bg_color', array('default' => '#edf6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box8_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box8_bg_color',
		)));
		$wp_customize->add_setting('box8_border_radius', array(
		'default' => 'none',
		));
		$wp_customize->add_control('box8_border_radius', array(
		'settings' => 'box8_border_radius',
		'label' => '角丸',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'none' => 'なし',
		'small' => '小',
		'medium' => '標準',
		'large' => '大',
		),
		));
		$wp_customize->add_setting('box8_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box8_shadow', array(
		'settings' => 'box8_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box9_stripe_a_color', array('default' => '#f0f8ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box9_stripe_a_color', array(
		'label' => 'ストライプカラーA',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box9_stripe_a_color',
		)));
		$wp_customize->add_setting('box9_stripe_b_color', array('default' => '#e9f4ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box9_stripe_b_color', array(
		'label' => 'ストライプカラーB',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box9_stripe_b_color',
		)));
		$wp_customize->add_setting('box9_border_radius', array(
		'default' => 'none',
		));
		$wp_customize->add_control('box9_border_radius', array(
		'settings' => 'box9_border_radius',
		'label' => '角丸',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'none' => 'なし',
		'small' => '小',
		'medium' => '標準',
		'large' => '大',
		),
		));
		$wp_customize->add_setting('box9_shadow', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('box9_shadow', array(
		'settings' => 'box9_shadow',
		'label' => '影',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '影あり',
		'disabled' => '影なし',
		),
		));
		$wp_customize->add_setting('box10_bg_color', array('default' => '#edf6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box10_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box10_bg_color',
		)));
		$wp_customize->add_setting('box10_flap_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box10_flap_color', array(
		'label' => '折り返しの色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box10_flap_color',
		)));
		$wp_customize->add_setting('box11_bg_color', array('default' => '#edf6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box11_bg_color', array(
		'label' => '背景色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box11_bg_color',
		)));
		$wp_customize->add_setting('box11_border_color', array('default' => '#6bb6ff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box11_border_color', array(
		'label' => 'ステッチの色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box11_border_color',
		)));
		$wp_customize->add_setting('box11_border_width', array(
		'default' => 'normal',
		));
		$wp_customize->add_control('box11_border_width', array(
		'settings' => 'box11_border_width',
		'label' => 'ステッチの太さ',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'thin' => '細',
		'normal' => '標準',
		'bold' => '太',
		'black' => '極太',
		),
		));
		$wp_customize->add_setting('box11_border_radius', array(
		'default' => 'none',
		));
		$wp_customize->add_control('box11_border_radius', array(
		'settings' => 'box11_border_radius',
		'label' => '角丸',
		'description' => '',
		'section' => 'box_section',
		'type' => 'radio',
		'choices' => array(
		'none' => 'なし',
		'small' => '小',
		'medium' => '標準',
		'large' => '大',
		),
		));
		$wp_customize->add_setting('box12_border_color', array('default' => '#333333', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box12_border_color', array(
		'label' => '交差線の色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box12_border_color',
		)));
		$wp_customize->add_setting('box13_border_color', array('default' => '#333333', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'box13_border_color', array(
		'label' => 'カギカッコの色',
		'description' => '',
		'section' => 'box_section',
		'settings' => 'box13_border_color',
		)));
	/* 吹き出し */
	$wp_customize->add_section('balloon_section', array(
	'title'          =>'吹き出し',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('balloon_type', array(
		'default' => 'balloon_type_a',
		));
		$wp_customize->add_control('balloon_type', array(
		'settings' => 'balloon_type',
		'label' =>'吹き出しのデザイン',
		'description' => '吹き出しのデザインを変更できます。',
		'section' => 'balloon_section',
		'type' => 'radio',
		'choices' => array(
		'balloon_type_a' => 'スタンダード',
		'balloon_type_b' => '考えるタイプ',
		),
		));
		$wp_customize->add_setting('balloon_icon_type', array(
		'default' => 'balloon_icon_type_a',
		));
		$wp_customize->add_control('balloon_icon_type', array(
		'settings' => 'balloon_icon_type',
		'label' =>'アイコンの形',
		'description' => 'アイコンの形を変更できます。',
		'section' => 'balloon_section',
		'type' => 'radio',
		'choices' => array(
		'balloon_icon_type_a' => '丸',
		'balloon_icon_type_b' => '四角',
		),
		));
		$wp_customize->add_setting('balloon_image_1');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'balloon_image_1', array(
		'label'        => '画像1',
		'description' => '吹き出しでよくつかう画像を最大3つまで登録しておくことができます。',
		'section'    => 'balloon_section',
		'settings'   => 'balloon_image_1',
		)));
		$wp_customize->add_setting('balloon_image_2');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'balloon_image_2', array(
		'label'        => '画像2',
		'description' => '吹き出しでよくつかう画像を最大3つまで登録しておくことができます。',
		'section'    => 'balloon_section',
		'settings'   => 'balloon_image_2',
		)));
		$wp_customize->add_setting('balloon_image_3');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'balloon_image_3', array(
		'label'        => '画像3',
		'description' => '吹き出しでよくつかう画像を最大3つまで登録しておくことができます。',
		'section'    => 'balloon_section',
		'settings'   => 'balloon_image_3',
		)));
	/* Amazonアソシエイト */
	$wp_customize->add_section('part_amazon_section', array(
	'title'          =>'Amazonアソシエイト',
	'priority'       => 30,
	'description' => '',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('amazon_id', array(
		));
		$wp_customize->add_control('amazon_id', array(
		'label' =>'AmazonアソシエイトID',
		'description' => '（例）**********-22',
		'section' => 'part_amazon_section',
		'settings' => 'amazon_id',
		));
	/* 広告 */
	$wp_customize->add_section('part_ad_section', array(
	'title'          =>'広告',
	'priority'       => 30,
	'description' => 'Googleアドセンスなどの広告を掲載するための事前設定ができます。広告は最大10種類まで登録できます。表示設定は【トップページ設定＞広告】【アーカイブページ設定＞広告】【固定ページ設定＞広告】【固定ページ設定＞広告】からページごとに設定できます。',
	'panel' => 'part_panel',
	));
		$wp_customize->add_setting('ad_1', array(
		));
		$wp_customize->add_control('ad_1', array(
		'label' =>'広告1',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_1',
		));
		$wp_customize->add_setting('ad_2', array(
		));
		$wp_customize->add_control('ad_2', array(
		'label' =>'広告2',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_2',
		));
		$wp_customize->add_setting('ad_3', array(
		));
		$wp_customize->add_control('ad_3', array(
		'label' =>'広告3',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_3',
		));
		$wp_customize->add_setting('ad_4', array(
		));
		$wp_customize->add_control('ad_4', array(
		'label' =>'広告4',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_4',
		));
		$wp_customize->add_setting('ad_5', array(
		));
		$wp_customize->add_control('ad_5', array(
		'label' =>'広告5',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_5',
		));
		$wp_customize->add_setting('ad_6', array(
		));
		$wp_customize->add_control('ad_6', array(
		'label' =>'広告6',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_6',
		));
		$wp_customize->add_setting('ad_7', array(
		));
		$wp_customize->add_control('ad_7', array(
		'label' =>'広告7',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_7',
		));
		$wp_customize->add_setting('ad_8', array(
		));
		$wp_customize->add_control('ad_8', array(
		'label' =>'広告8',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_8',
		));
		$wp_customize->add_setting('ad_9', array(
		));
		$wp_customize->add_control('ad_9', array(
		'label' =>'広告9',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_9',
		));
		$wp_customize->add_setting('ad_10', array(
		));
		$wp_customize->add_control('ad_10', array(
		'label' =>'広告10',
		'type' => 'textarea',
		'section' => 'part_ad_section',
		'settings' => 'ad_10',
		));
/********************
トップページ設定
********************/
$wp_customize->add_panel('front_panel', array(
'title' => 'トップページ設定',
'description' => 'トップページの設定です。',
'priority' => 30,
));
	/* メインビジュアル */
	$wp_customize->add_section('front_main_visual_section' , array(
	'title'       =>'メインビジュアル',
	'priority'    => 30,
	'description' => '',
	'panel' => 'front_panel',
	));
		$wp_customize->add_setting('front_main_visual_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('front_main_visual_state', array(
		'settings' => 'front_main_visual_state',
		'label' =>'表示設定',
		'description' => 'メインビジュアルの表示を変更できます。',
		'section' => 'front_main_visual_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_main_visual_type', array(
		'default' => 'a',
		));
		$wp_customize->add_control('front_main_visual_type', array(
		'settings' => 'front_main_visual_type',
		'label' =>'デザインタイプ',
		'description' => 'デザインを変更できます。',
		'section' => 'front_main_visual_section',
		'type' => 'radio',
		'choices' => array(
		'a' => 'タイプA（全幅表示）',
		'b' => 'タイプB（横幅制限表示）',
		'c' => 'タイプC（二分割表示）',
		),
		));
		$wp_customize->add_setting('front_main_visual_img');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_main_visual_img', array(
		'label' =>'画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_main_visual_section',
		'settings'   => 'front_main_visual_img',
		)));
		$wp_customize->add_setting('front_main_visual_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_bg_color', array(
		'label' => '背景色',
		'description' => 'タイプC（二分割表示）選択時の背景色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_bg_color',
		)));
		$wp_customize->add_setting('front_main_visual_ttl', array(
		));
		$wp_customize->add_control('front_main_visual_ttl', array(
		'label' =>'見出し',
		'description' => '見出しを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_ttl',
		));
		$wp_customize->add_setting('front_main_visual_desc', array(
		));
		$wp_customize->add_control('front_main_visual_desc', array(
		'label' =>'説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_main_visual_section',
		'type' => 'textarea',
		'settings' => 'front_main_visual_desc',
		));
		$wp_customize->add_setting('front_main_visual_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_color', array(
		'label' => '見出しと説明文の文字色',
		'description' => '見出しと説明文の文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_color',
		)));
		$wp_customize->add_setting('front_main_visual_btn_txt', array(
		));
		$wp_customize->add_control('front_main_visual_btn_txt', array(
		'label' =>'ボタンテキスト',
		'description' => 'ボタンを設置する場合は、ボタンテキストを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_txt',
		));
		$wp_customize->add_setting('front_main_visual_btn_url', array(
		));
		$wp_customize->add_control('front_main_visual_btn_url', array(
		'label' =>'リンクURL',
		'description' => 'ボタンのリンク先をURLで記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_url',
		));
		$wp_customize->add_setting('front_main_visual_btn_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_color', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタン文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_color',
		)));
		$wp_customize->add_setting('front_main_visual_btn_bg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_bg_color', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_bg_color',
		)));

		$wp_customize->add_setting('front_main_visual_img_2');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_main_visual_img_2', array(
		'label' =>'画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_main_visual_section',
		'settings'   => 'front_main_visual_img_2',
		)));
		$wp_customize->add_setting('front_main_visual_ttl_2', array(
		));
		$wp_customize->add_control('front_main_visual_ttl_2', array(
		'label' =>'見出し',
		'description' => '見出しを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_ttl_2',
		));
		$wp_customize->add_setting('front_main_visual_desc_2', array(
		));
		$wp_customize->add_control('front_main_visual_desc_2', array(
		'label' =>'説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_main_visual_section',
		'type' => 'textarea',
		'settings' => 'front_main_visual_desc_2',
		));
		$wp_customize->add_setting('front_main_visual_color_2', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_color_2', array(
		'label' => '見出しと説明文の文字色',
		'description' => '見出しと説明文の文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_color_2',
		)));
		$wp_customize->add_setting('front_main_visual_btn_txt_2', array(
		));
		$wp_customize->add_control('front_main_visual_btn_txt_2', array(
		'label' =>'ボタンテキスト',
		'description' => 'ボタンを設置する場合は、ボタンテキストを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_txt_2',
		));
		$wp_customize->add_setting('front_main_visual_btn_url_2', array(
		));
		$wp_customize->add_control('front_main_visual_btn_url_2', array(
		'label' =>'リンクURL',
		'description' => 'ボタンのリンク先をURLで記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_url_2',
		));
		$wp_customize->add_setting('front_main_visual_btn_color_2', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_color_2', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタン文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_color_2',
		)));
		$wp_customize->add_setting('front_main_visual_btn_bg_color_2', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_bg_color_2', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_bg_color_2',
		)));

		$wp_customize->add_setting('front_main_visual_img_3');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_main_visual_img_3', array(
		'label' =>'画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_main_visual_section',
		'settings'   => 'front_main_visual_img_3',
		)));
		$wp_customize->add_setting('front_main_visual_ttl_3', array(
		));
		$wp_customize->add_control('front_main_visual_ttl_3', array(
		'label' =>'見出し',
		'description' => '見出しを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_ttl_3',
		));
		$wp_customize->add_setting('front_main_visual_desc_3', array(
		));
		$wp_customize->add_control('front_main_visual_desc_3', array(
		'label' =>'説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_main_visual_section',
		'type' => 'textarea',
		'settings' => 'front_main_visual_desc_3',
		));
		$wp_customize->add_setting('front_main_visual_color_3', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_color_3', array(
		'label' => '見出しと説明文の文字色',
		'description' => '見出しと説明文の文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_color_3',
		)));
		$wp_customize->add_setting('front_main_visual_btn_txt_3', array(
		));
		$wp_customize->add_control('front_main_visual_btn_txt_3', array(
		'label' =>'ボタンテキスト',
		'description' => 'ボタンを設置する場合は、ボタンテキストを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_txt_3',
		));
		$wp_customize->add_setting('front_main_visual_btn_url_3', array(
		));
		$wp_customize->add_control('front_main_visual_btn_url_3', array(
		'label' =>'リンクURL',
		'description' => 'ボタンのリンク先をURLで記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_url_3',
		));
		$wp_customize->add_setting('front_main_visual_btn_color_3', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_color_3', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタン文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_color_3',
		)));
		$wp_customize->add_setting('front_main_visual_btn_bg_color_3', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_bg_color_3', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_bg_color_3',
		)));

		$wp_customize->add_setting('front_main_visual_img_4');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_main_visual_img_4', array(
		'label' =>'画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_main_visual_section',
		'settings'   => 'front_main_visual_img_4',
		)));
		$wp_customize->add_setting('front_main_visual_ttl_4', array(
		));
		$wp_customize->add_control('front_main_visual_ttl_4', array(
		'label' =>'見出し',
		'description' => '見出しを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_ttl_4',
		));
		$wp_customize->add_setting('front_main_visual_desc_4', array(
		));
		$wp_customize->add_control('front_main_visual_desc_4', array(
		'label' =>'説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_main_visual_section',
		'type' => 'textarea',
		'settings' => 'front_main_visual_desc_4',
		));
		$wp_customize->add_setting('front_main_visual_color_4', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_color_4', array(
		'label' => '見出しと説明文の文字色',
		'description' => '見出しと説明文の文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_color_4',
		)));
		$wp_customize->add_setting('front_main_visual_btn_txt_4', array(
		));
		$wp_customize->add_control('front_main_visual_btn_txt_4', array(
		'label' =>'ボタンテキスト',
		'description' => 'ボタンを設置する場合は、ボタンテキストを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_txt_4',
		));
		$wp_customize->add_setting('front_main_visual_btn_url_4', array(
		));
		$wp_customize->add_control('front_main_visual_btn_url_4', array(
		'label' =>'リンクURL',
		'description' => 'ボタンのリンク先をURLで記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_url_4',
		));
		$wp_customize->add_setting('front_main_visual_btn_color_4', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_color_4', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタン文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_color_4',
		)));
		$wp_customize->add_setting('front_main_visual_btn_bg_color_4', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_bg_color_4', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_bg_color_4',
		)));

		$wp_customize->add_setting('front_main_visual_img_5');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_main_visual_img_5', array(
		'label' =>'画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_main_visual_section',
		'settings'   => 'front_main_visual_img_5',
		)));
		$wp_customize->add_setting('front_main_visual_ttl_5', array(
		));
		$wp_customize->add_control('front_main_visual_ttl_5', array(
		'label' =>'見出し',
		'description' => '見出しを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_ttl_5',
		));
		$wp_customize->add_setting('front_main_visual_desc_5', array(
		));
		$wp_customize->add_control('front_main_visual_desc_5', array(
		'label' =>'説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_main_visual_section',
		'type' => 'textarea',
		'settings' => 'front_main_visual_desc_5',
		));
		$wp_customize->add_setting('front_main_visual_color_5', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_color_5', array(
		'label' => '見出しと説明文の文字色',
		'description' => '見出しと説明文の文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_color_5',
		)));
		$wp_customize->add_setting('front_main_visual_btn_txt_5', array(
		));
		$wp_customize->add_control('front_main_visual_btn_txt_5', array(
		'label' =>'ボタンテキスト',
		'description' => 'ボタンを設置する場合は、ボタンテキストを記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_txt_5',
		));
		$wp_customize->add_setting('front_main_visual_btn_url_5', array(
		));
		$wp_customize->add_control('front_main_visual_btn_url_5', array(
		'label' =>'リンクURL',
		'description' => 'ボタンのリンク先をURLで記入してください。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_url_5',
		));
		$wp_customize->add_setting('front_main_visual_btn_color_5', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_color_5', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタン文字色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_color_5',
		)));
		$wp_customize->add_setting('front_main_visual_btn_bg_color_5', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_main_visual_btn_bg_color_5', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'front_main_visual_section',
		'settings' => 'front_main_visual_btn_bg_color_5',
		)));

	/* カルーセル */
	$wp_customize->add_section('front_carousel_section' , array(
	'title'       =>'カルーセル',
	'priority'    => 30,
	'description' => '',
	'panel' => 'front_panel',
	));
		$wp_customize->add_setting('carousel_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('carousel_state', array(
		'settings' => 'carousel_state',
		'label' =>'スライダー設定',
		'description' => '記事一覧の上部に、おすすめの記事をスライダーで表示させることができます。',
		'section' => 'front_carousel_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('carousel_pattern', array(
		'default' => 'random',
		));
		$wp_customize->add_control('carousel_pattern', array(
		'settings' => 'carousel_pattern',
		'label' =>'表示パターン',
		'description' => 'ランダム表示か投稿IDを指定して表示かを選択できます。投稿IDを選択時には次項の入力が必須です。',
		'section' => 'front_carousel_section',
		'type' => 'radio',
		'choices' => array(
		'random' => 'ランダム',
		'id' => '投稿IDで指定',
		),
		));
		$wp_customize->add_setting('carousel_post_id', array(
		));
		$wp_customize->add_control('carousel_post_id', array(
		'label' =>'投稿ID',
		'description' => 'スライダーに表示させたい記事の投稿IDを5記事以上入力してください。「10,14,178,210,255」のように半角カンマで区切って記入します。未入力の場合には、ランダム表示となります。',
		'section' => 'front_carousel_section',
		'settings' => 'carousel_post_id',
		));
	/* メッセージ */
	$wp_customize->add_section('front_msg_section' , array(
	'title'       =>'メッセージ',
	'priority'    => 30,
	'description' => '',
	'panel' => 'front_panel',
	));
		$wp_customize->add_setting('front_msg_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('front_msg_state', array(
		'settings' => 'front_msg_state',
		'label' =>'メッセージ設定',
		'description' => 'メッセージを表示させることができます。',
		'section' => 'front_msg_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_msg_ttl', array(
		'default' => 'まったく新しいブログサービス',
		));
		$wp_customize->add_control('front_msg_ttl', array(
		'label' =>'タイトル',
		'description' => 'タイトルを記入してください。',
		'section' => 'front_msg_section',
		'settings' => 'front_msg_ttl',
		));
		$wp_customize->add_setting('front_msg_sub_ttl', array(
		'default' => '一人では続きにくいブログ運営も<br>コンシェルジュとコミュニティで楽しく続く',
		));
		$wp_customize->add_control('front_msg_sub_ttl', array(
		'label' =>'サブタイトル',
		'description' => 'サブタイトルを記入してください。',
		'section' => 'front_msg_section',
		'settings' => 'front_msg_sub_ttl',
		));
		$wp_customize->add_setting('front_msg_desc', array(
		'default' => '"コンシェルジュ"という言葉から何を思い浮かべますか？<br>ホテルや高級マンション、クレジットカードなどのサービスが思い浮かぶかもしれません。<br>APPARTEMENT（アパルトマン）はまさにそんなサービス。<br>孤独になりがちなブログ運営を、開設するところから「育てる」「広げる」ところまでサポートします。<br>一緒にがんばる仲間が集う、まさにAPPARTEMENTのようなコミュニティの存在。<br>「つながる」「集まる」コミュニティの力で、ブログ運営をさらに楽しくするサービスです。',
		));
		$wp_customize->add_control('front_msg_desc', array(
		'label' => '文章',
		'description' => '文章を記入してください。&lt;br&gt;を入力することで改行できます。',
		'section' => 'front_msg_section',
		'type' => 'textarea',
		'settings' => 'front_msg_desc',
		));
		$wp_customize->add_setting('front_msg_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_msg_bg_color', array(
		'label' => '背景色',
		'description' => '背景色を変更できます。',
		'section' => 'front_msg_section',
		'settings' => 'front_msg_bg_color',
		)));
		$wp_customize->add_setting('front_msg_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_msg_color', array(
		'label' => '文字色',
		'description' => '文字色を変更できます。',
		'section' => 'front_msg_section',
		'settings' => 'front_msg_color',
		)));
	/* アイテム一覧 */
	$wp_customize->add_section('front_items_section' , array(
	'title'       =>'アイテム一覧',
	'priority'    => 30,
	'description' => '',
	'panel' => 'front_panel',
	));
		$wp_customize->add_setting('front_items_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('front_items_state', array(
		'settings' => 'front_items_state',
		'label' =>'表示設定',
		'description' => 'アイテム一覧を表示させることができます。',
		'section' => 'front_items_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_items_ttl', array(
		'default' => 'サービス一覧',
		));
		$wp_customize->add_control('front_items_ttl', array(
		'label' => 'タイトル',
		'description' => 'タイトルを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_ttl',
		));
		$wp_customize->add_setting('front_items_btn_bg_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_items_btn_bg_color', array(
		'label' => 'ボタン背景色',
		'description' => 'ボタンの背景色を変更できます。',
		'section' => 'front_items_section',
		'settings' => 'front_items_btn_bg_color',
		)));
		$wp_customize->add_setting('front_items_btn_border_color', array('default' => '#000000', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_items_btn_border_color', array(
		'label' => 'ボタン枠線色',
		'description' => 'ボタンの枠線色を変更できます。',
		'section' => 'front_items_section',
		'settings' => 'front_items_btn_border_color',
		)));		
		$wp_customize->add_setting('front_items_btn_color', array('default' => '#ffffff', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_items_btn_color', array(
		'label' => 'ボタン文字色',
		'description' => 'ボタンの文字色を変更できます。',
		'section' => 'front_items_section',
		'settings' => 'front_items_btn_color',
		)));
		$wp_customize->add_setting('front_items_1_img', array(
		'default' => get_bloginfo('template_directory').'/assets/images/no-img.png',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_items_1_img', array(
		'label' => '画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_items_section',
		'settings'   => 'front_items_1_img',
		)));
		$wp_customize->add_setting('front_items_1_ttl', array(
		'default' => '伝わるタイトル',
		));
		$wp_customize->add_control('front_items_1_ttl', array(
		'label' => 'タイトル',
		'description' => 'タイトルを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_1_ttl',
		));
		$wp_customize->add_setting('front_items_1_desc', array(
		'default' => 'ここにわかりやすく要点をまとめた説明文を記入します。デザイン上の推奨文字数は50文字前後です。',
		));
		$wp_customize->add_control('front_items_1_desc', array(
		'label' => '説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_1_desc',
		));
		$wp_customize->add_setting('front_items_1_btn_txt', array(
		'default' => '詳しくみる',
		));
		$wp_customize->add_control('front_items_1_btn_txt', array(
		'label' => 'ボタンテキスト',
		'description' => 'ボタンテキストを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_1_btn_txt',
		));
		$wp_customize->add_setting('front_items_1_btn_url', array(
		'default' => 'https://appartement.in',
		));
		$wp_customize->add_control('front_items_1_btn_url', array(
		'label' => 'リンク先URL',
		'description' => 'ボタンのリンク先をURLを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_1_btn_url',
		));
		$wp_customize->add_setting('front_items_2_img', array(
		'default' => get_bloginfo('template_directory').'/assets/images/no-img.png',
		));	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_items_2_img', array(
		'label' => '画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_items_section',
		'settings'   => 'front_items_2_img',
		)));
		$wp_customize->add_setting('front_items_2_ttl', array(
		'default' => '伝わるタイトル',
		));
		$wp_customize->add_control('front_items_2_ttl', array(
		'label' => 'タイトル',
		'description' => 'タイトルを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_2_ttl',
		));
		$wp_customize->add_setting('front_items_2_desc', array(
		'default' => 'ここにわかりやすく要点をまとめた説明文を記入します。デザイン上の推奨文字数は50文字前後です。',
		));
		$wp_customize->add_control('front_items_2_desc', array(
		'label' => '説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_2_desc',
		));
		$wp_customize->add_setting('front_items_2_btn_txt', array(
		'default' => '詳しくみる',
		));
		$wp_customize->add_control('front_items_2_btn_txt', array(
		'label' => 'ボタンテキスト',
		'description' => 'ボタンテキストを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_2_btn_txt',
		));
		$wp_customize->add_setting('front_items_2_btn_url', array(
		'default' => 'https://appartement.in',
		));
		$wp_customize->add_control('front_items_2_btn_url', array(
		'label' => 'リンク先URL',
		'description' => 'ボタンのリンク先をURLを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_2_btn_url',
		));
		$wp_customize->add_setting('front_items_3_img', array(
		'default' => get_bloginfo('template_directory').'/assets/images/no-img.png',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_items_3_img', array(
		'label' => '画像アップロード',
		'description' => '画像をアップロードしてください。',
		'section'    => 'front_items_section',
		'settings'   => 'front_items_3_img',
		)));
		$wp_customize->add_setting('front_items_3_ttl', array(
		'default' => '伝わるタイトル',
		));
		$wp_customize->add_control('front_items_3_ttl', array(
		'label' => 'タイトル',
		'description' => 'タイトルを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_3_ttl',
		));
		$wp_customize->add_setting('front_items_3_desc', array(
		'default' => 'ここにわかりやすく要点をまとめた説明文を記入します。デザイン上の推奨文字数は50文字前後です。',
		));
		$wp_customize->add_control('front_items_3_desc', array(
		'label' => '説明文',
		'description' => '説明文を記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_3_desc',
		));
		$wp_customize->add_setting('front_items_3_btn_txt', array(
		'default' => '詳しくみる',
		));
		$wp_customize->add_control('front_items_3_btn_txt', array(
		'label' => 'ボタンテキスト',
		'description' => 'ボタンテキストを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_3_btn_txt',
		));
		$wp_customize->add_setting('front_items_3_btn_url', array(
		'default' => 'https://appartement.in',
		));
		$wp_customize->add_control('front_items_3_btn_url', array(
		'label' => 'リンク先URL',
		'description' => 'ボタンのリンク先をURLを記入してください。',
		'section' => 'front_items_section',
		'settings' => 'front_items_3_btn_url',
		));
	/* レイアウト */
	$wp_customize->add_section('front_layout_section' , array(
	'title'       =>'レイアウト',
	'priority'    => 30,
	'description' => '',
	'panel' => 'front_panel',
	));
		$wp_customize->add_setting('front_col', array(
		'default' => 'c2_left',
		));
		$wp_customize->add_control('front_col', array(
		'settings' => 'front_col',
		'label' =>'カラム設定',
		'description' => 'カラムの数を変更できます。',
		'section' => 'front_layout_section',
		'type' => 'radio',
		'choices' => array(
		'c1' => '1カラム',
		'c2_left' => '2カラム（左メイン）',
		'c2_right' => '2カラム（右メイン）',
		'c3_left' => '3カラム（左メイン）',
		'c3_center' => '3カラム（中央メイン）',
		'c3_right' => '3カラム（右メイン）',
		),
		));
		$wp_customize->add_setting('front_layout_pc', array(
		'default' => 'simple_portrait',
		));
		$wp_customize->add_control('front_layout_pc', array(
		'settings' => 'front_layout_pc',
		'label' =>'パソコン用',
		'description' => 'パソコンやタブレットでの記事一覧の表示レイアウトを変更できます。',
		'section' => 'front_layout_section',
		'type' => 'radio',
		'choices' => array(
		'simple_portrait' => 'シンプル（縦長）タイプ',
		'simple_landscape' => 'シンプル（横長）タイプ',
		'card_portrait' => 'カード（縦長）タイプ',
		'card_landscape' => 'カード（横長）タイプ',
		'magazine' => 'マガジンタイプ',
		),
		));
		$wp_customize->add_setting('front_layout_sp', array(
		'default' => 'simple_portrait',
		));
		$wp_customize->add_control('front_layout_sp', array(
		'settings' => 'front_layout_sp',
		'label' =>'スマートフォン用',
		'description' => 'スマートフォンでの記事一覧の表示レイアウトを変更できます。',
		'section' => 'front_layout_section',
		'type' => 'radio',
		'choices' => array(
		'simple_portrait' => 'シンプル（縦長）タイプ',
		'simple_landscape' => 'シンプル（横長）タイプ',
		'card_portrait' => 'カード（縦長）タイプ',
		'card_landscape' => 'カード（横長）タイプ',
		'magazine' => 'マガジンタイプ',
		),
		));
	/* 表示項目 */
	$wp_customize->add_section('front_state_section' , array(
	'title'       =>'表示項目',
	'priority'    => 30,
	'description' => '',
	'panel' => 'front_panel',
	));
		$wp_customize->add_setting('front_eyecatch_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('front_eyecatch_state', array(
		'settings' => 'front_eyecatch_state',
		'label' =>'アイキャッチ',
		'description' => '記事一覧でアイキャッチの表示を選択できます。',
		'section' => 'front_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_desc_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('front_desc_state', array(
		'settings' => 'front_desc_state',
		'label' =>'抜粋表示設定',
		'description' => '抜粋表示の選択ができます。',
		'section' => 'front_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_cat_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('front_cat_state', array(
		'settings' => 'front_cat_state',
		'label' =>'カテゴリー表示設定',
		'description' => 'カテゴリーの表示設定を選択できます。',
		'section' => 'front_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_date_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('front_date_state', array(
		'settings' => 'front_date_state',
		'label' =>'公開日表示設定',
		'description' => 'トップページの記事一覧で公開日の表示を選択できます。',
		'section' => 'front_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_new_mark_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('front_new_mark_state', array(
		'settings' => 'front_new_mark_state',
		'label' =>'NEWアイコン表示設定',
		'description' => '新着記事に「NEW」アイコンの表示させるかを選択できます。表示日数の設定については詳細設定から変更できます。',
		'section' => 'front_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('front_author_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('front_author_state', array(
		'settings' => 'front_author_state',
		'label' =>'著者表示設定',
		'description' => 'トップページの記事一覧で著者の表示を選択できます。',
		'section' => 'front_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
	));
	/* 広告 */
	$wp_customize->add_section('front_ad_section' , array(
	'title'       =>'広告',
	'priority'    => 30,
	'description' => '表示させる広告の種類を表示箇所ごとに設定できます。【パーツ設定＞広告】で事前に広告コードの登録が必要です。',
	'panel' => 'front_panel',
	));
	  $wp_customize->add_setting('front_ad_content_upper', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('front_ad_content_upper', array(
	  'settings' => 'front_ad_content_upper',
	  'label' =>'記事上部',
	  'description' => '記事の上部に表示させる広告を変更できます。',
	  'section' => 'front_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
	  $wp_customize->add_setting('front_ad_content_under', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('front_ad_content_under', array(
	  'settings' => 'front_ad_content_under',
	  'label' =>'記事下部',
	  'description' => '記事の下部に表示させる広告を変更できます。',
	  'section' => 'front_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
/********************
アーカイブページ設定
********************/
$wp_customize->add_panel('archive_panel', array(
'title' => 'アーカイブページ設定',
'description' => 'アーカイブページの設定です。',
'priority' => 30,
));
	/* レイアウト設定 */
	$wp_customize->add_section('archive_layout_section' , array(
	'title'       =>'レイアウト設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'archive_panel',
	));
		$wp_customize->add_setting('archive_col', array(
		'default' => 'c2_left',
		));
		$wp_customize->add_control('archive_col', array(
		'settings' => 'archive_col',
		'label' =>'カラム設定',
		'description' => 'カラムの数を変更できます。',
		'section' => 'archive_layout_section',
		'type' => 'radio',
		'choices' => array(
		'c1' => '1カラム',
		'c2_left' => '2カラム（左メイン）',
		'c2_right' => '2カラム（右メイン）',
		'c3_left' => '3カラム（左メイン）',
		'c3_center' => '3カラム（中央メイン）',
		'c3_right' => '3カラム（右メイン）',
		),
		));
		$wp_customize->add_setting('archive_layout_pc', array(
		'default' => 'simple_portrait',
		));
		$wp_customize->add_control('archive_layout_pc', array(
		'settings' => 'archive_layout_pc',
		'label' =>'パソコン用',
		'description' => '記事のレイアウトを変更できます。',
		'section' => 'archive_layout_section',
		'type' => 'radio',
		'choices' => array(
		'simple_portrait' => 'シンプル（縦長）タイプ',
		'simple_landscape' => 'シンプル（横長）タイプ',
		'card_portrait' => 'カード（縦長）タイプ',
		'card_landscape' => 'カード（横長）タイプ',
		'magazine' => 'マガジンタイプ',
		),
		));
		$wp_customize->add_setting('archive_layout_sp', array(
		'default' => 'simple_landscape',
		));
		$wp_customize->add_control('archive_layout_sp', array(
		'settings' => 'archive_layout_sp',
		'label' =>'スマートフォン用',
		'description' => 'スマホ閲覧時の記事のレイアウトを変更できます。',
		'section' => 'archive_layout_section',
		'type' => 'radio',
		'choices' => array(
		'simple_portrait' => 'シンプル（縦長）タイプ',
		'simple_landscape' => 'シンプル（横長）タイプ',
		'card_portrait' => 'カード（縦長）タイプ',
		'card_landscape' => 'カード（横長）タイプ',
		'magazine' => 'マガジンタイプ',
		),
		));
	/* 表示項目設定 */
	$wp_customize->add_section('archive_state_section' , array(
	'title'       =>'表示項目設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'archive_panel',
	));
		$wp_customize->add_setting('archive_breadcrumbs_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('archive_breadcrumbs_state', array(
		'settings' => 'archive_breadcrumbs_state',
		'label' =>'パンくずリスト',
		'description' => 'パンくずリストの表示を選択できます。',
		'section' => 'archive_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('archive_eyecatch_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('archive_eyecatch_state', array(
		'settings' => 'archive_eyecatch_state',
		'label' =>'アイキャッチ',
		'description' => '記事一覧でアイキャッチの表示を選択できます。',
		'section' => 'archive_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('archive_desc_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('archive_desc_state', array(
		'settings' => 'archive_desc_state',
		'label' =>'抜粋',
		'description' => '記事一覧で抜粋の表示を選択できます。',
		'section' => 'archive_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('archive_cat_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('archive_cat_state', array(
		'settings' => 'archive_cat_state',
		'label' =>'カテゴリー',
		'description' => '記事一覧でカテゴリーの表示を選択できます。',
		'section' => 'archive_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('archive_date_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('archive_date_state', array(
		'settings' => 'archive_date_state',
		'label' =>'公開日',
		'description' => '記事一覧で公開日の表示を選択できます。',
		'section' => 'archive_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('archive_new_mark_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('archive_new_mark_state', array(
		'settings' => 'archive_new_mark_state',
		'label' =>'NEWアイコン',
		'description' => '新着記事に「NEW」アイコンの表示させるかを変更できます。表示日数の設定については詳細設定から変更できます。',
		'section' => 'archive_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('archive_author_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('archive_author_state', array(
		'settings' => 'archive_author_state',
		'label' =>'著者名',
		'description' => '記事一覧で著者の表示を選択できます。',
		'section' => 'archive_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
	/* 広告設定 */
	$wp_customize->add_section('archive_ad_section' , array(
	'title'       =>'広告設定',
	'priority'    => 30,
	'description' => '表示させる広告の種類を表示箇所ごとに設定できます。【パーツ設定＞広告】で事前に広告コードの登録が必要です。',
	'panel' => 'archive_panel',
	));
	  $wp_customize->add_setting('archive_ad_content_upper', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('archive_ad_content_upper', array(
	  'settings' => 'archive_ad_content_upper',
	  'label' =>'記事上部',
	  'description' => '記事の上部に表示させる広告を設定できます。',
	  'section' => 'archive_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
	  $wp_customize->add_setting('archive_ad_content_under', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('archive_ad_content_under', array(
	  'settings' => 'archive_ad_content_under',
	  'label' =>'記事下部',
	  'description' => '記事の下部に表示させる広告を設定できます。',
	  'section' => 'archive_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
/********************
投稿ページ設定
********************/
$wp_customize->add_panel('post_panel', array(
'title' => '投稿ページ設定',
'description' => '投稿ページの設定です。',
'priority' => 30,
));
	/* レイアウト */
	$wp_customize->add_section('post_layout_section' , array(
	'title'       =>'レイアウト',
	'priority'    => 30,
	'description' => '',
	'panel' => 'post_panel',
	));
		$wp_customize->add_setting('post_col', array(
		'default' => 'c1',
		));
		$wp_customize->add_control('post_col', array(
		'settings' => 'post_col',
		'label' =>'カラム設定',
		'description' => 'カラムの数を変更できます。',
		'section' => 'post_layout_section',
		'type' => 'radio',
		'choices' => array(
		'c1' => '1カラム',
		'c2_left' => '2カラム（左メイン）',
		'c2_right' => '2カラム（右メイン）',
		'c3_left' => '3カラム（左メイン）',
		'c3_center' => '3カラム（中央メイン）',
		'c3_right' => '3カラム（右メイン）',
		),
		));
	/* 表示項目 */
	$wp_customize->add_section('post_state_section' , array(
	'title'       =>'表示項目',
	'priority'    => 30,
	'description' => '',
	'panel' => 'post_panel',
	));
		$wp_customize->add_setting('post_eyecatch_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('post_eyecatch_state', array(
		'settings' => 'post_eyecatch_state',
		'label' =>'アイキャッチ',
		'description' => '2カラム・3カラム・スマホ表示時のアイキャッチの表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_breadcrumbs_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('post_breadcrumbs_state', array(
		'settings' => 'post_breadcrumbs_state',
		'label' =>'パンくずリスト',
		'description' => 'パンくずリストの表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_toc_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('post_toc_state', array(
		'settings' => 'post_toc_state',
		'label' =>'目次',
		'description' => '目次の表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_cat_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('post_cat_state', array(
		'settings' => 'post_cat_state',
		'label' =>'カテゴリー',
		'description' => 'カテゴリー表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_author_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('post_author_state', array(
		'settings' => 'post_author_state',
		'label' =>'著者名',
		'description' => '著者名の表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_date_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('post_date_state', array(
		'settings' => 'post_date_state',
		'label' =>'公開日・更新日',
		'description' => '公開日と更新日の表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '公開日・更新日を表示する',
		'pubdate' => '公開日のみ表示する',
		'updated' => '更新日のみ表示する',
		'disabled' => '公開日・更新日を非表示する',
		),
		));
		$wp_customize->add_setting('post_share_state', array(
		'default' => 'under',
		));
		$wp_customize->add_control('post_share_state', array(
		'settings' => 'post_share_state',
		'label' =>'SNSシェアボタンを表示',
		'description' => '記事本文の上下にSNSのシェアボタンを設置できます。表示する場合の詳細な設定は「カスタマイズ > パーツ設定 > シェアボタン」から設定できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '記事上下に表示',
		'upper' => '記事上のみ表示',
		'under' => '記事下のみ表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_share_fixed_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('post_share_fixed_state', array(
		'settings' => 'post_share_fixed_state',
		'label' =>'追尾型SNSシェアボタンを表示',
		'description' => '記事本文のサイドにSNSのシェアボタンを追尾型で設置できます。表示する場合の詳細な設定は「カスタマイズ > パーツ設定 > シェアボタン」から設定できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_follow_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('post_follow_state', array(
		'settings' => 'post_follow_state',
		'label' =>'SNSフォローボタンを表示',
		'description' => 'SNSフォローボタンの表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_author_info_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('post_author_info_state', array(
		'settings' => 'post_author_info_state',
		'label' =>'著者情報ボックスを表示',
		'description' => '著者の情報の表示を選択できます。【管理画面＞ユーザー＞あなたのプロフィール】で入力した内容が反映されます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_author_posts_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('post_author_posts_state', array(
		'settings' => 'post_author_posts_state',
		'label' =>'この著者のほかの記事一覧を表示',
		'description' => '表示中の記事の著者が書いたほかの新着記事一覧の表示を選択できます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_cta_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('post_cta_state', array(
		'settings' => 'post_cta_state',
		'label' =>'CTAを表示',
		'description' => 'CTAの表示を変更できます。【パーツ設定＞CTA】でCTAの作成ができます。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('post_related_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('post_related_state', array(
		'settings' => 'post_related_state',
		'label' =>'関連記事を表示',
		'description' => '同一カテゴリの記事をランダムに表示するか選択できます。同一カテゴリに記事がない場合には記事は表示されません。',
		'section' => 'post_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
	/* 広告設定 */
	$wp_customize->add_section('post_ad_section' , array(
	'title'       =>'広告設定',
	'priority'    => 30,
	'description' => '表示させる広告の種類を表示箇所ごとに設定できます。【パーツ設定＞広告】で事前に広告コードの登録が必要です。',
	'panel' => 'post_panel',
	));
		$wp_customize->add_setting('post_ad_content_upper', array(
		'default' => 'none',
		));
		$wp_customize->add_control('post_ad_content_upper', array(
		'settings' => 'post_ad_content_upper',
		'label' =>'記事上部',
		'description' => '記事の上部に表示させる広告を変更できます。',
		'section' => 'post_ad_section',
		'type' => 'select',
		'choices' => array(
		'none' => '非表示',
		'ad_1' => '広告1',
		'ad_2' => '広告2',
		'ad_3' => '広告3',
		'ad_4' => '広告4',
		'ad_5' => '広告5',
		'ad_6' => '広告6',
		'ad_7' => '広告7',
		'ad_8' => '広告8',
		'ad_9' => '広告9',
		'ad_10' => '広告10',
		),
		));
		$wp_customize->add_setting('post_ad_content_h2_1st', array(
		'default' => 'none',
		));
		$wp_customize->add_control('post_ad_content_h2_1st', array(
		'settings' => 'post_ad_content_h2_1st',
		'label' =>'最初の見出し2の上部',
		'description' => '最初の見出し2の上部に表示させる広告を変更できます。',
		'section' => 'post_ad_section',
		'type' => 'select',
		'choices' => array(
		'none' => '非表示',
		'ad_1' => '広告1',
		'ad_2' => '広告2',
		'ad_3' => '広告3',
		'ad_4' => '広告4',
		'ad_5' => '広告5',
		'ad_6' => '広告6',
		'ad_7' => '広告7',
		'ad_8' => '広告8',
		'ad_9' => '広告9',
		'ad_10' => '広告10',
		),
		));
		$wp_customize->add_setting('post_ad_content_h2_2nd', array(
		'default' => 'none',
		));
		$wp_customize->add_control('post_ad_content_h2_2nd', array(
		'settings' => 'post_ad_content_h2_2nd',
		'label' =>'２番目の見出し2の上部',
		'description' => '２番目の見出し2の上部に表示させる広告を変更できます。',
		'section' => 'post_ad_section',
		'type' => 'select',
		'choices' => array(
		'none' => '非表示',
		'ad_1' => '広告1',
		'ad_2' => '広告2',
		'ad_3' => '広告3',
		'ad_4' => '広告4',
		'ad_5' => '広告5',
		'ad_6' => '広告6',
		'ad_7' => '広告7',
		'ad_8' => '広告8',
		'ad_9' => '広告9',
		'ad_10' => '広告10',
		),
		));
		$wp_customize->add_setting('post_ad_content_h2_3rd', array(
		'default' => 'none',
		));
		$wp_customize->add_control('post_ad_content_h2_3rd', array(
		'settings' => 'post_ad_content_h2_3rd',
		'label' =>'3番目の見出し2の上部',
		'description' => '3番目の見出し2の上部に表示させる広告を変更できます。',
		'section' => 'post_ad_section',
		'type' => 'select',
		'choices' => array(
		'none' => '非表示',
		'ad_1' => '広告1',
		'ad_2' => '広告2',
		'ad_3' => '広告3',
		'ad_4' => '広告4',
		'ad_5' => '広告5',
		'ad_6' => '広告6',
		'ad_7' => '広告7',
		'ad_8' => '広告8',
		'ad_9' => '広告9',
		'ad_10' => '広告10',
		),
		));
		$wp_customize->add_setting('post_ad_content_under', array(
		'default' => 'none',
		));
		$wp_customize->add_control('post_ad_content_under', array(
		'settings' => 'post_ad_content_under',
		'label' =>'記事下部',
		'description' => '記事の下部に表示させる広告を変更できます。',
		'section' => 'post_ad_section',
		'type' => 'select',
		'choices' => array(
		'none' => '非表示',
		'ad_1' => '広告1',
		'ad_2' => '広告2',
		'ad_3' => '広告3',
		'ad_4' => '広告4',
		'ad_5' => '広告5',
		'ad_6' => '広告6',
		'ad_7' => '広告7',
		'ad_8' => '広告8',
		'ad_9' => '広告9',
		'ad_10' => '広告10',
		),
		));
	/* コメント設定 */
	$wp_customize->add_section('post_comment_section' , array(
	'title'       =>'コメント設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'post_panel',
	));
		$wp_customize->add_setting('post_comment_state', array(
		'default' => false,
		));
		$wp_customize->add_control('post_comment_state', array(
		'settings' => 'post_comment_state',
		'label' => 'コメント欄を強制非表示',
		'description' => 'WordPressの設定に関わらず強制的にコメント欄を非表示に変更できます。',
		'section' => 'post_comment_section',
		'type' => 'checkbox',
		));
	/* 詳細設定 */
	$wp_customize->add_section('post_detail_section' , array(
	'title'       =>'詳細設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'post_panel',
	));
		$wp_customize->add_setting('post_eyecatch_1col_height', array(
		'default' => 'h10',
		));
		$wp_customize->add_control('post_eyecatch_1col_height', array(
		'settings' => 'post_eyecatch_1col_height',
		'label' =>'1カラム時のアイキャッチ表示領域',
		'description' => '1カラム時のアイキャッチ表示領域を3パターンから選択できます。',
		'section' => 'post_detail_section',
		'type' => 'radio',
		'choices' => array(
		'h5' => '縮小',
		'h10' => '標準',
		'h15' => '拡大',
		),
		));
		$wp_customize->add_setting('post_eyecatch_1col_opacity', array(
		'default' => '50',
		));
		$wp_customize->add_control('post_eyecatch_1col_opacity', array(
		'settings' => 'post_eyecatch_1col_opacity',
		'label' =>'1カラム時のアイキャッチの透過率',
		'description' => '1カラム時のアイキャッチ表示領域の黒の透過率を1%単位で設定できます。',
		'section' => 'post_detail_section',
		));
/********************
固定ページ設定
********************/
$wp_customize->add_panel('page_panel', array(
'title' => '固定ページ設定',
'description' => '固定ページの設定です。',
'priority' => 30,
));
	/* レイアウト設定 */
	$wp_customize->add_section('page_layout_section' , array(
	'title'       =>'レイアウト設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'page_panel',
	));
		$wp_customize->add_setting('page_col', array(
		'default' => 'c1',
		));
		$wp_customize->add_control('page_col', array(
		'settings' => 'page_col',
		'label' =>'カラム設定',
		'description' => 'カラムの数を変更できます。',
		'section' => 'page_layout_section',
		'type' => 'radio',
		'choices' => array(
		'c1' => '1カラム',
		'c2_left' => '2カラム（左メイン）',
		'c2_right' => '2カラム（右メイン）',
		'c3_left' => '3カラム（左メイン）',
		'c3_center' => '3カラム（中央メイン）',
		'c3_right' => '3カラム（右メイン）',
		),
		));
	/* 表示項目設定 */
	$wp_customize->add_section('page_state_section' , array(
	'title'       =>'表示項目設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'page_panel',
	));
		$wp_customize->add_setting('page_eyecatch_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('page_eyecatch_state', array(
		'settings' => 'page_eyecatch_state',
		'label' =>'アイキャッチ',
		'description' => '2カラム・3カラム・スマホ表示時のアイキャッチの表示を選択できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_breadcrumbs_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('page_breadcrumbs_state', array(
		'settings' => 'page_breadcrumbs_state',
		'label' =>'パンくずリスト',
		'description' => 'パンくずリストの表示を選択できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_toc_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('page_toc_state', array(
		'settings' => 'page_toc_state',
		'label' =>'目次',
		'description' => '目次の表示を選択できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_author_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('page_author_state', array(
		'settings' => 'page_author_state',
		'label' =>'著者名を表示しない',
		'description' => '著者名の表示を選択できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_date_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('page_date_state', array(
		'settings' => 'page_date_state',
		'label' =>'公開日・更新日表示設定',
		'description' => '公開日と更新日の表示を変更できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '公開日・更新日を表示する',
		'pubdate' => '公開日のみ表示する',
		'updated' => '更新日のみ表示する',
		'disabled' => '公開日・更新日を非表示する',
		),
		));
		$wp_customize->add_control('page_share_state', array(
		'settings' => 'page_share_state',
		'label' =>'SNSシェアボタンを表示',
		'description' => '記事本文の上下にSNSのシェアボタンを設置できます。表示する場合の詳細な設定は「カスタマイズ > パーツ設定 > シェアボタン」から設定できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '記事上下に表示',
		'upper' => '記事上のみ表示',
		'under' => '記事下のみ表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_share_fixed_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('page_share_fixed_state', array(
		'settings' => 'page_share_fixed_state',
		'label' =>'追尾型SNSシェアボタンを表示',
		'description' => '記事本文のサイドにSNSのシェアボタンを追尾型で設置できます。表示する場合の詳細な設定は「カスタマイズ > パーツ設定 > シェアボタン」から設定できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_follow_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('page_follow_state', array(
		'settings' => 'page_follow_state',
		'label' =>'SNSフォローボタンを表示',
		'description' => 'SNSフォローボタンの表示を選択できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_author_info_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('page_author_info_state', array(
		'settings' => 'page_author_info_state',
		'label' =>'著者情報ボックスを表示',
		'description' => '著者の情報を表示を選択できます。【管理画面＞ユーザー＞あなたのプロフィール】で入力した内容が反映されます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_author_posts_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('page_author_posts_state', array(
		'settings' => 'page_author_posts_state',
		'label' =>'この著者のほかの記事一覧を表示',
		'description' => '表示中の記事の著者が書いたほかの新着記事一覧を表示できます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('page_cta_state', array(
		'default' => 'disabled',
		));
		$wp_customize->add_control('page_cta_state', array(
		'settings' => 'page_cta_state',
		'label' =>'CTAを表示',
		'description' => 'CTAの表示設定ができます。【パーツ設定＞CTA】でCTAの作成ができます。',
		'section' => 'page_state_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
	/* 広告設定 */
	$wp_customize->add_section('page_ad_section' , array(
	'title'       =>'広告設定',
	'priority'    => 30,
	'description' => '表示させる広告の種類を表示箇所ごとに設定できます。【パーツ設定＞広告】で事前に広告コードの登録が必要です。',
	'panel' => 'page_panel',
	));
	  $wp_customize->add_setting('page_ad_content_upper', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('page_ad_content_upper', array(
	  'settings' => 'page_ad_content_upper',
	  'label' =>'記事上部',
	  'description' => '記事の上部に表示させる広告を変更できます。',
	  'section' => 'page_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
	  $wp_customize->add_setting('page_ad_content_h2_1st', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('page_ad_content_h2_1st', array(
	  'settings' => 'page_ad_content_h2_1st',
	  'label' =>'最初の見出し2の上部',
	  'description' => '最初の見出し2の上部に表示させる広告を変更できます。',
	  'section' => 'page_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
	  $wp_customize->add_setting('page_ad_content_h2_2nd', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('page_ad_content_h2_2nd', array(
	  'settings' => 'page_ad_content_h2_2nd',
	  'label' =>'２番目の見出し2の上部',
	  'description' => '２番目の見出し2の上部に表示させる広告を変更できます。',
	  'section' => 'page_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
		$wp_customize->add_setting('page_ad_content_h2_3rd', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('page_ad_content_h2_3rd', array(
	  'settings' => 'page_ad_content_h2_3rd',
	  'label' =>'3番目の見出し2の上部',
	  'description' => '3番目の見出し2の上部に表示させる広告を変更できます。',
	  'section' => 'page_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
	  $wp_customize->add_setting('page_ad_content_under', array(
	  'default' => 'none',
	  ));
	  $wp_customize->add_control('page_ad_content_under', array(
	  'settings' => 'page_ad_content_under',
	  'label' =>'記事下部',
	  'description' => '記事の下部に表示させる広告を変更できます。',
	  'section' => 'page_ad_section',
	  'type' => 'select',
	  'choices' => array(
	  'none' => '非表示',
	  'ad_1' => '広告1',
	  'ad_2' => '広告2',
	  'ad_3' => '広告3',
	  'ad_4' => '広告4',
	  'ad_5' => '広告5',
	  'ad_6' => '広告6',
	  'ad_7' => '広告7',
	  'ad_8' => '広告8',
	  'ad_9' => '広告9',
	  'ad_10' => '広告10',
	  ),
	  ));
	/* 詳細設定 */
	$wp_customize->add_section('page_detail_section' , array(
	'title'       =>'詳細設定',
	'priority'    => 30,
	'description' => '',
	'panel' => 'page_panel',
	));
		$wp_customize->add_setting('page_eyecatch_1col_height', array(
		'default' => 'h10',
		));
		$wp_customize->add_control('page_eyecatch_1col_height', array(
		'settings' => 'page_eyecatch_1col_height',
		'label' =>'1カラム時のアイキャッチ表示領域',
		'description' => '1カラム時のアイキャッチ表示領域を3パターンから選択できます。',
		'section' => 'page_detail_section',
		'type' => 'radio',
		'choices' => array(
		'h5' => '縮小',
		'h10' => '標準',
		'h15' => '拡大',
		),
		));
	/* 404ページ */
/*
	$wp_customize->add_section('page_404_section' , array(
	'title'       =>'404ページ',
	'priority'    => 30,
	'description' => '',
	'panel' => 'page_panel',
	));
		$wp_customize->add_setting('not_found_img_state', array(
		'default' => 'enabled',
		));
		$wp_customize->add_control('not_found_img_state', array(
		'settings' => 'not_found_img_state',
		'label' =>'アイキャッチ画像を表示',
		'description' => '404エラーページでのアイキャッチ画像の表示を選択できます。',
		'section' => 'page_404_section',
		'type' => 'radio',
		'choices' => array(
		'enabled' => '表示',
		'disabled' => '非表示',
		),
		));
		$wp_customize->add_setting('not_found_img');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'not_found_img', array(
		'label'        => 'アイキャッチ画像',
		'description' => '404エラーページでのアイキャッチ画像を変更できます。未設定の場合にはデフォルト画像がつかわれます。',
		'section'    => 'page_404_section',
		'settings'   => 'not_found_img',
		)));
*/
	/* お問い合わせページ */
	$wp_customize->add_section('page_contact_section' , array(
	'title'       =>'お問い合わせページ',
	'priority'    => 30,
	'description' => 'テンプレート属性を「お問い合わせフォーム」に設定した固定ページを作成するだけで、お問い合わせページが作成できます。',
	'panel' => 'page_panel',
	));
		$wp_customize->add_setting('contact_form_desc', array(
		'default' => 'お問い合わせ内容によっては、お返事を差し上げるまでにお時間をいただく場合や、お返事させていただくことが適当でない場合にはお返事を差し上げられない場合もございます。あらかじめご了承ください。',
		));
		$wp_customize->add_control('contact_form_desc', array(
		'label' =>'お問い合わせフォーム上部の説明文',
		'description' => 'フォーム上部の説明文を変更できます。',
		'settings' => 'contact_form_desc',
		'section' => 'page_contact_section',
		'type' => 'textarea',
		));
		$wp_customize->add_setting('contact_form_admin_email', array(
		));
		$wp_customize->add_control('contact_form_admin_email', array(
		'label' =>'お問合わせの受信メールアドレス',
		'description' => '未入力の場合には、WordPressの管理者メールアドレスに送信されます。',
		'settings' => 'contact_form_admin_email',
		'section' => 'page_contact_section',
		));
		$wp_customize->add_setting('contact_form_name_state', array(
		'default' => true,
		));
		$wp_customize->add_control('contact_form_name_state', array(
		'settings' => 'contact_form_name_state',
		'label' => 'お名前',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_name_required', array(
		'default' => true,
		));
		$wp_customize->add_control('contact_form_name_required', array(
		'settings' => 'contact_form_name_required',
		'label' => '必須',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_name_kana_state', array(
		));
		$wp_customize->add_control('contact_form_name_kana_state', array(
		'settings' => 'contact_form_name_kana_state',
		'label' => 'お名前（フリガナ）',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_name_kana_required', array(
		));
		$wp_customize->add_control('contact_form_name_kana_required', array(
		'settings' => 'contact_form_name_kana_required',
		'label' => '必須',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_email_state', array(
		'default' => true,
		));
		$wp_customize->add_control('contact_form_email_state', array(
		'settings' => 'contact_form_email_state',
		'label' => 'メールアドレス',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_email_required', array(
		'default' => true,
		));
		$wp_customize->add_control('contact_form_email_required', array(
		'settings' => 'contact_form_email_required',
		'label' => '必須',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_tel_state', array(
		));
		$wp_customize->add_control('contact_form_tel_state', array(
		'settings' => 'contact_form_tel_state',
		'label' => '電話番号',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_tel_required', array(
		));
		$wp_customize->add_control('contact_form_tel_required', array(
		'settings' => 'contact_form_tel_required',
		'label' => '必須',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_fax_state', array(
		));
		$wp_customize->add_control('contact_form_fax_state', array(
		'settings' => 'contact_form_fax_state',
		'label' => 'FAX番号',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_fax_required', array(
		));
		$wp_customize->add_control('contact_form_fax_required', array(
		'settings' => 'contact_form_fax_required',
		'label' => '必須',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_url_state', array(
		));
		$wp_customize->add_control('contact_form_url_state', array(
		'settings' => 'contact_form_url_state',
		'label' => 'URL',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_url_required', array(
		));
		$wp_customize->add_control('contact_form_url_required', array(
		'settings' => 'contact_form_url_required',
		'label' => '必須',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_textarea_state', array(
		'default' => true,
		));
		$wp_customize->add_control('contact_form_textarea_state', array(
		'settings' => 'contact_form_textarea_state',
		'label' => 'お問い合わせ内容',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('contact_form_textarea_required', array(
		'default' => true,
		));
		$wp_customize->add_control('contact_form_textarea_required', array(
		'settings' => 'contact_form_textarea_required',
		'label' => '必須',
		'section' => 'page_contact_section',
		'type' => 'checkbox',
		));
	/* プライバシーポリシーページ */
	$wp_customize->add_section('page_privacy_section' , array(
	'title'       =>'プライバシーポリシーページ',
	'priority'    => 30,
	'description' => 'テンプレート属性を「プライバシーポリシー」に設定した固定ページを作成するだけで、プライバシーポリシーページが作成できます。',
	'panel' => 'page_panel',
	));
		$wp_customize->add_setting('privacy_name', array(
		));
		$wp_customize->add_control('privacy_name', array(
		'label' =>'プライバシーポリシーの名称',
		'description' => '上記設定で「自動生成」を選択時、プライバシーポリシー本文中の名称を変更できます。空白の場合にはサイト名が挿入されます。',
		'settings' => 'privacy_name',
		'section' => 'page_privacy_section',
		));
/********************
高度な設定
********************/
$wp_customize->add_panel('advanced_panel', array(
'title' => '高度な設定',
'description' => '高度な設定です。',
'priority' => 30,
));
	$wp_customize->add_section('advanced_code_section' , array(
	'title'       =>'ユーザー定義',
	'priority'    => 30,
	'description' => 'head内やcssへの追加ができます。',
	'panel' => 'advanced_panel',
	));
		$wp_customize->add_setting('head_meta', array(
		));
		$wp_customize->add_control('head_meta', array(
		'label' =>'<head></head>へのユーザー定義を追加',
		'description' => '<head></head>へのユーザー定義を追加できます。',
		'settings' => 'head_meta',
		'section' => 'advanced_code_section',
		'type' => 'textarea',
		));
	$wp_customize->add_section('advanced_selector_section' , array(
	'title'       =>'セレクタ',
	'priority'    => 30,
	'description' => 'HTML/CSS/PHP言語の基礎知識をお持ちのかたが対象です。よりカスタマイズしたい方向けの機能となっておりますので、不要な場合にはすべてのチェックをはずしていただくことをおすすめします。',
	'panel' => 'advanced_panel',
	));
		$wp_customize->add_setting('body_class_state', array(
		));
		$wp_customize->add_control('body_class_state', array(
		'settings' => 'body_class_state',
		'label' => 'body要素にクラス名を付与する',
		'description' => 'body要素にbody_class()関数を追加いたします。ページごとに異なるクラス名が自動付与され、より細かなカスタマイズなどができます。',
		'section' => 'advanced_selector_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('post_class_state', array(
		));
		$wp_customize->add_control('post_class_state', array(
		'settings' => 'post_class_state',
		'label' => 'articleタグにクラス名を付与する',
		'description' => '投稿ページと固定ページでのarticle要素にpost_class()関数を追加いたします。ページごとに異なるクラス名が自動付与され、記事単位でのカスタマイズなどができます。',
		'section' => 'advanced_selector_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('cat_id_state', array(
		));
		$wp_customize->add_control('cat_id_state', array(
		'settings' => 'cat_id_state',
		'label' => 'カテゴリ表示の要素にクラス名を付与する',
		'description' => 'カテゴリ表示の要素に対し、カテゴリIDをクラス名として自動付与します。カテゴリごとにデザインのカスタマイズなどをおこないたい場合に有効にしてください。',
		'section' => 'advanced_selector_section',
		'type' => 'checkbox',
		));
	$wp_customize->add_section('advanced_update_section' , array(
	'title'       =>'自動更新設定',
	'priority'    => 30,
	'description' => 'WordPress本体・テーマ・プラグインの自動更新を有効にできます。',
	'panel' => 'advanced_panel',
	));
		$wp_customize->add_setting('update_major_state', array(
		));
		$wp_customize->add_control('update_major_state', array(
		'settings' => 'update_major_state',
		'label' => 'WordPress本体のメジャーアップデート',
		'description' => 'WordPress本体のメジャーアップデートの自動更新を有効にする',
		'section' => 'advanced_update_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('update_theme_state', array(
		'default' => 'checked',
		));
		$wp_customize->add_control('update_theme_state', array(
		'settings' => 'update_theme_state',
		'label' => 'テーマのアップデート',
		'description' => 'テーマのアップデートの自動更新を有効にする',
		'section' => 'advanced_update_section',
		'type' => 'checkbox',
		));
		$wp_customize->add_setting('update_plugin_state', array(
		));
		$wp_customize->add_control('update_plugin_state', array(
		'settings' => 'update_plugin_state',
		'label' => 'プラグインのアップデート',
		'description' => 'プラグインのアップデートの自動更新を有効にする',
		'section' => 'advanced_update_section',
		'type' => 'checkbox',
		));
}
add_action('customize_register', 'bloco_customize_register');


function bloco_customize_css() {
//変数の代入
$base_color = get_theme_mod('base_color', '#ffffff');
$main_color = get_theme_mod('main_color', '#000000');
$accent_color = get_theme_mod('accent_color', '#000000');
$header_logo_color = get_theme_mod('header_logo_color', '#000000');
$header_bg_color = get_theme_mod('header_bg_color', '#ffffff');
$header_menu_color = get_theme_mod('header_menu_color', '#ffffff');
$header_menu_bg_color = get_theme_mod('header_menu_bg_color', '#000000');
$footer_bg_color = get_theme_mod('footer_bg_color', '#000000');
$footer_menu_color = get_theme_mod('footer_menu_color', '#ffffff');
$sidebar_widget_ttl_color = get_theme_mod('sidebar_widget_ttl_color', '#ffffff');
$sidebar_widget_ttl_bg_color = get_theme_mod('sidebar_widget_ttl_bg_color', '#000000');
$sidebar_widget_ttl_border_color = get_theme_mod('sidebar_widget_ttl_border_color', '#000000');
$footer_widget_color = get_theme_mod('footer_widget_color', '#ffffff');
$footer_widget_bg_color = get_theme_mod('footer_widget_bg_color', '#000000');
$header_logo_size_pc = get_theme_mod('header_logo_size_pc');
$header_padding_top_pc = get_theme_mod('header_padding_top_pc','50');
$header_logo_size_sp = get_theme_mod('header_logo_size_sp');
$main_bg_color = get_theme_mod('main_bg_color', '#ffffff');
$body_color = get_theme_mod('body_color', '#000000');
$a_color = get_theme_mod('a_color', '#000000');
$heading_color = get_theme_mod('heading_color','#000000');
$heading_base_color = get_theme_mod('heading_base_color','#f0f0f0');
$heading_main_color = get_theme_mod('heading_main_color','#000000');
$heading_accent_color = get_theme_mod('heading_accent_color','#000000');
$h2_type = get_theme_mod('h2_type','h2_type_a');
$h3_type = get_theme_mod('h3_type','h3_type_a');
$h4_type = get_theme_mod('h4_type','h4_type_a');
$h5_type = get_theme_mod('h5_type','h5_type_a');
$h6_type = get_theme_mod('h6_type','h6_type_a');
$blockquote_color = get_theme_mod('blockquote_color','#000000');
$blockquote_base_color = get_theme_mod('blockquote_base_color','#f0f0f0');
$blockquote_main_color = get_theme_mod('blockquote_main_color','#000000');
$blockquote_accent_color = get_theme_mod('blockquote_accent_color','#000000');
$blockquote_type = get_theme_mod('blockquote_type','blockquote_type_a');
$cat_icon = get_theme_mod('cat_icon');
$cat_color = get_theme_mod('cat_color', '#ffffff');
$cat_border_color = get_theme_mod('cat_border_color', '#000000');
$cat_bg_color = get_theme_mod('cat_bg_color', '#000000');
$tag_icon = get_theme_mod('tag_icon');
$tag_color = get_theme_mod('tag_color', '#000000');
$tag_border_color = get_theme_mod('tag_border_color', '#000000');
$tag_bg_color = get_theme_mod('tag_bg_color', '#ffffff');
$pubdate_icon = get_theme_mod('pubdate_icon');
$updated_icon = get_theme_mod('updated_icon');
$page_top_btn_color = get_theme_mod('page_top_btn_color', '#ffffff');
$page_top_btn_bg_color = get_theme_mod('page_top_btn_bg_color', '#000000');
$front_main_visual_color = get_theme_mod('front_main_visual_color', '#ffffff');
$front_main_visual_bg_color = get_theme_mod('front_main_visual_bg_color', '#000000');
$front_main_visual_btn_color = get_theme_mod('front_main_visual_btn_color', '#000000');
$front_main_visual_btn_bg_color = get_theme_mod('front_main_visual_btn_bg_color', '#ffffff');
$front_msg_bg_color = get_theme_mod('front_msg_bg_color', '#000000');
$front_msg_color = get_theme_mod('front_msg_color', '#ffffff');
$front_items_btn_bg_color = get_theme_mod('front_items_btn_bg_color', '#000000');
$front_items_btn_border_color = get_theme_mod('front_items_btn_border_color', '#000000');
$front_items_btn_color = get_theme_mod('front_items_btn_color', '#ffffff');
$follow_color = get_theme_mod('follow_color', '#ffffff');
$follow_bg_color = get_theme_mod('follow_bg_color', '#cccccc');
$toc_main_color = get_theme_mod('toc_main_color', '#333333');
$toc_bg_color = get_theme_mod('toc_bg_color', '#f7f7f7');
$news_color = get_theme_mod('news_color', '#ffffff');
$news_bg_color = get_theme_mod('news_bg_color', '#000000');
$cta_color = get_theme_mod('cta_color', '#ffffff');
$cta_bg_color = get_theme_mod('cta_bg_color', '#cccccc');
$cta_btn_color = get_theme_mod('cta_btn_color', '#ffffff');
$cta_btn_bg_color = get_theme_mod('cta_btn_bg_color', '#000000');
$pagination_current_color = get_theme_mod('pagination_current_color', '#ffffff');
$pagination_current_bg_color = get_theme_mod('pagination_current_bg_color', '#999999');
$pagination_a_color = get_theme_mod('pagination_a_color', '#ffffff');
$pagination_a_bg_color = get_theme_mod('pagination_a_bg_color', '#cccccc');
$pagination_dots_color = get_theme_mod('pagination_dots_color', '#cccccc');
$pagination_dots_bg_color = get_theme_mod('pagination_dots_bg_color', '#ffffff');
$box1_bg_color = get_theme_mod('box1_bg_color','#ffffff');
$box1_border_color = get_theme_mod('box1_border_color','#6bb6ff');
$box1_border_width = get_theme_mod('box1_border_width','normal');
$box1_border_radius = get_theme_mod('box1_border_radius','none');
$box1_shadow = get_theme_mod('box1_shadow','disabled');
$box2_bg_color = get_theme_mod('box2_bg_color','#ffffff');
$box2_border_color = get_theme_mod('box2_border_color','#6bb6ff');
$box2_border_width = get_theme_mod('box2_border_width','normal');
$box2_border_radius = get_theme_mod('box2_border_radius','none');
$box2_shadow = get_theme_mod('box2_shadow','disabled');
$box3_bg_color = get_theme_mod('box3_bg_color','#ffffff');
$box3_border_color = get_theme_mod('box3_border_color','#6bb6ff');
$box3_border_width = get_theme_mod('box3_border_width','normal');
$box3_border_radius = get_theme_mod('box3_border_radius','none');
$box3_shadow = get_theme_mod('box3_shadow','disabled');
$box4_bg_color = get_theme_mod('box4_bg_color','#edf6ff');
$box4_border_color = get_theme_mod('box4_border_color','#6bb6ff');
$box4_border_width = get_theme_mod('box4_border_width','normal');
$box4_shadow = get_theme_mod('box4_shadow','disabled');
$box5_bg_color = get_theme_mod('box5_bg_color','#edf6ff');
$box5_border_color = get_theme_mod('box5_border_color','#6bb6ff');
$box5_border_width = get_theme_mod('box5_border_width','normal');
$box5_shadow = get_theme_mod('box5_shadow','disabled');
$box6_bg_color = get_theme_mod('box6_bg_color','#edf6ff');
$box6_border_color = get_theme_mod('box6_border_color','#6bb6ff');
$box6_border_width = get_theme_mod('box6_border_width','normal');
$box6_shadow = get_theme_mod('box6_shadow','disabled');
$box7_bg_color = get_theme_mod('box7_bg_color','#edf6ff');
$box7_border_color = get_theme_mod('box7_border_color','#6bb6ff');
$box7_border_width = get_theme_mod('box7_border_width','normal');
$box7_shadow = get_theme_mod('box7_shadow','disabled');
$box8_bg_color = get_theme_mod('box8_bg_color','#edf6ff');
$box8_border_radius = get_theme_mod('box8_border_radius','none');
$box8_shadow = get_theme_mod('box8_shadow','disabled');
$box9_stripe_a_color = get_theme_mod('box9_stripe_a_color','#edf6ff');
$box9_stripe_b_color = get_theme_mod('box9_stripe_b_color','#edf6ff');
$box9_border_radius = get_theme_mod('box9_border_radius','none');
$box9_shadow = get_theme_mod('box9_shadow','disabled');
$box10_bg_color = get_theme_mod('box10_bg_color','#edf6ff');
$box10_flap_color = get_theme_mod('box10_flap_color','#6bb6ff');
$box11_bg_color = get_theme_mod('box11_bg_color','#edf6ff');
$box11_border_color = get_theme_mod('box11_border_color','#6bb6ff');
$box11_border_width = get_theme_mod('box11_border_width','normal');
$box11_border_radius = get_theme_mod('box11_border_radius','none');
$box12_border_color = get_theme_mod('box12_border_color','#333333');
$box13_border_color = get_theme_mod('box13_border_color','#333333');
$post_eyecatch_1col_opacity = get_theme_mod('post_eyecatch_1col_opacity','50')/100;












?>
<!--ボックス-->
<style type="text/css">
.box1 {background-color: <?php echo $box1_bg_color; ?>; border-color: <?php echo $box1_border_color; ?>; border-width: <?php if($box1_border_width == 'thin') echo "1px"; elseif($box1_border_width == 'normal') echo "4px"; elseif($box1_border_width == 'bold') echo "7px"; elseif($box1_border_width == 'black') echo "10px"; ?> ; border-radius: <?php if($box1_border_radius == 'none') echo "none"; elseif($box1_border_radius == 'small') echo "10px"; elseif($box1_border_radius == 'medium') echo "20px"; elseif($box1_border_radius == 'large') echo "40px"; ?>; box-shadow: <?php if($box1_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box2 {background-color: <?php echo $box2_bg_color; ?>; border-color: <?php echo $box2_border_color; ?>; border-width: <?php if($box2_border_width == 'thin') echo "1px"; elseif($box2_border_width == 'normal') echo "4px"; elseif($box2_border_width == 'bold') echo "7px"; elseif($box2_border_width == 'black') echo "10px"; ?> ; border-radius: <?php if($box2_border_radius == 'none') echo "none"; elseif($box2_border_radius == 'small') echo "10px"; elseif($box2_border_radius == 'medium') echo "20px"; elseif($box2_border_radius == 'large') echo "40px"; ?>; box-shadow: <?php if($box2_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box3 {background-color: <?php echo $box3_bg_color; ?>; border-color: <?php echo $box3_border_color; ?>; border-width: <?php if($box3_border_width == 'thin') echo "1px"; elseif($box3_border_width == 'normal') echo "4px"; elseif($box3_border_width == 'bold') echo "7px"; elseif($box3_border_width == 'black') echo "10px"; ?> ; border-radius: <?php if($box3_border_radius == 'none') echo "none"; elseif($box3_border_radius == 'small') echo "10px"; elseif($box3_border_radius == 'medium') echo "20px"; elseif($box3_border_radius == 'large') echo "40px"; ?>; box-shadow: <?php if($box3_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box4 {background-color: <?php echo $box4_bg_color; ?>; border-color: <?php echo $box4_border_color; ?>; border-width: <?php if($box4_border_width == 'thin') echo "1px"; elseif($box4_border_width == 'normal') echo "4px"; elseif($box4_border_width == 'bold') echo "7px"; elseif($box4_border_width == 'black') echo "10px"; ?> ; box-shadow: <?php if($box4_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box5 {background-color: <?php echo $box5_bg_color; ?>; border-color: <?php echo $box5_border_color; ?>; border-width: <?php if($box5_border_width == 'thin') echo "1px"; elseif($box5_border_width == 'normal') echo "4px"; elseif($box5_border_width == 'bold') echo "7px"; elseif($box5_border_width == 'black') echo "10px"; ?> ; box-shadow: <?php if($box5_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box6 {background-color: <?php echo $box6_bg_color; ?>; border-color: <?php echo $box6_border_color; ?>; border-width: <?php if($box6_border_width == 'thin') echo "1px"; elseif($box6_border_width == 'normal') echo "4px"; elseif($box6_border_width == 'bold') echo "7px"; elseif($box6_border_width == 'black') echo "10px"; ?> ; box-shadow: <?php if($box6_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box7 {background-color: <?php echo $box7_bg_color; ?>; border-color: <?php echo $box7_border_color; ?>; border-width: <?php if($box7_border_width == 'thin') echo "1px"; elseif($box7_border_width == 'normal') echo "4px"; elseif($box7_border_width == 'bold') echo "7px"; elseif($box7_border_width == 'black') echo "10px"; ?> ; box-shadow: <?php if($box7_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box8 {background-color: <?php echo $box8_bg_color; ?>; border-radius: <?php if($box8_border_radius == 'none') echo "none"; elseif($box8_border_radius == 'small') echo "10px"; elseif($box8_border_radius == 'medium') echo "20px"; elseif($box8_border_radius == 'large') echo "40px"; ?>; box-shadow: <?php if($box8_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box9 {background: repeating-linear-gradient(-45deg,<?php echo $box9_stripe_a_color; ?>,<?php echo $box9_stripe_a_color; ?> 3px,<?php echo $box9_stripe_b_color; ?> 3px,<?php echo $box9_stripe_b_color; ?> 7px); border-radius: <?php if($box9_border_radius == 'none') echo "none"; elseif($box9_border_radius == 'small') echo "10px"; elseif($box9_border_radius == 'medium') echo "20px"; elseif($box9_border_radius == 'large') echo "40px"; ?>; box-shadow: <?php if($box9_shadow == 'enabled') echo "0 3px 4px rgba(0,0,0,0.2)"; ?>;}
.box10 {background-color: <?php echo $box10_bg_color; ?>; border-radius: <?php if($box10_border_radius == 'none') echo "none"; elseif($box10_border_radius == 'small') echo "10px"; elseif($box10_border_radius == 'medium') echo "20px"; elseif($box10_border_radius == 'large') echo "40px"; ?>;}
.box10:after {border-color: <?php echo $box10_flap_color; ?> <?php echo $box10_flap_color; ?> <?php echo $main_bg_color; ?> <?php echo $main_bg_color; ?>;}
.box11 {background-color: <?php echo $box11_bg_color; ?>; border-color: <?php echo $box11_border_color; ?>; border-width: <?php if($box11_border_width == 'thin') echo "1px"; elseif($box11_border_width == 'normal') echo "4px"; elseif($box11_border_width == 'bold') echo "7px"; elseif($box11_border_width == 'black') echo "10px"; ?> ; border-radius: <?php if($box11_border_radius == 'none') echo "none"; elseif($box11_border_radius == 'small') echo "10px"; elseif($box11_border_radius == 'medium') echo "20px"; elseif($box11_border_radius == 'large') echo "40px"; ?>; box-shadow: 0px 0px 0px .75em <?php echo $box11_bg_color; ?>;}
.box12 {border-color: <?php echo $box12_border_color; ?>;}
.box12:before,.box12:after {background-color: <?php echo $box12_border_color; ?>;}
.box13:before,.box13:after {border-color: <?php echo $box13_border_color; ?>;}









</style>
<!--見出し2-->
<style type="text/css">
.h_type_b {padding-bottom: .5em; border-bottom: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_c {padding-bottom: .5em; border-bottom: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_c::first-letter {margin-right: .0em; font-size: 1.5em;}
.h_type_d {padding-bottom: .5em; border-bottom: 3px double <?php echo $heading_main_color; ?>;}
.h_type_e {padding: .5em 0; border-top: 1px solid <?php echo $heading_main_color; ?>; border-bottom: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_f {padding: .5em 0; border-top: 3px double <?php echo $heading_main_color; ?>; border-bottom: 3px double <?php echo $heading_main_color; ?>;}
.h_type_g {padding: .25em 0 .25em .75em; border-left: .25em solid <?php echo $heading_main_color; ?>;}
.h_type_h {padding: .25em 0 .5em .75em; border-left: .25em solid <?php echo $heading_main_color; ?>; border-bottom: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_i {padding: .75em 1em; border: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_j {padding: .75em 1em; border: 1px solid <?php echo $heading_main_color; ?>; border-radius: 8px;}
.h_type_k {position: relative; padding: .5em .75em .5em 1.25em; border: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_k::after {position: absolute; top: .5em; left: .5em; content: ''; width: .25em; height: -webkit-calc(100% - 1em); height: calc(100% - 1em); background-color: <?php echo $heading_accent_color; ?>;}
.h_type_l {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>;}
.h_type_m {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border-radius: 8px;}
.h_type_n {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border-bottom: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_o {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border-top: 1px solid <?php echo $heading_main_color; ?>; border-bottom: 1px solid <?php echo $heading_main_color; ?>;}
.h_type_p {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border-left: .25em solid <?php echo $heading_main_color; ?>;}
.h_type_q {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border: 3px double <?php echo $heading_main_color; ?>;}
.h_type_r {position: relative; padding-bottom: .5em; border-bottom: 4px solid <?php echo $heading_main_color; ?>;}
.h_type_r::after {position: absolute; bottom: -4px; left: 0; z-index: 2; content: ''; width: 20%; height: 4px; background-color: <?php echo $heading_accent_color; ?>;}
.h_type_s {position: relative; padding: 1em 2em; background-color: <?php echo $heading_base_color; ?>; border-radius: 3px;}
.h_type_s::after {position: absolute; top: 100%; left: 30px; content: ''; width: 0; height: 0; border: 10px solid transparent; border-top: 15px solid <?php echo $heading_base_color; ?>;}
.h_type_t {position: relative; padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border-radius: 8px; box-shadow: 2px 2px 4px rgba(0,0,0,.1) inset;}
.h_type_t::after {position: absolute; top: 100%; left: 30px; content: ''; width: 0; height: 0; border: 10px solid transparent; border-top: 15px solid <?php echo $heading_base_color; ?>;}
.h_type_u {position: relative; padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>;}
.h_type_u::after {content: ''; position: absolute; top: -20px; left: 0; width: calc(100% - 20px); height: 0; border: 10px solid transparent; border-bottom-color: <?php echo $heading_base_color; ?> opacity: .8;;}
.h_type_v {position: relative; padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>;}
.h_type_v::before {content: ''; position: absolute; top: 100%; border-style: solid; border-color: transparent; left: 0; border-width: 0 .75em .5em 0; border-right-color: <?php echo $heading_main_color; ?>;}
.h_type_v::after {content: ''; position: absolute; top: 100%; border-style: solid; border-color: transparent; right: 0; border-style: solid; border-width: .5em .75em 0 0;border-top-color: <?php echo $heading_main_color; ?>;}
.h_type_w {position: relative; padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>;}
.h_type_w::before {content: ''; position: absolute; border-style: solid; border-color: transparent; top: 100%; left: 0; border-width: 0 .75em .5em 0; border-right-color: <?php echo $heading_main_color; ?>;}
.h_type_w::after {content: ''; position: absolute; border-style: solid; border-color: transparent; top: -.5em; right: 0; border-style: solid; border-width: 0 .75em .5em 0; border-bottom-color: <?php echo $heading_main_color; ?>;}
.h_type_x {position: relative; padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>;}
.h_type_x::after {position: absolute; top: 0; right: 0; content: ''; width: 0; border-width: 0 16px 16px 0; border-style: solid; border-color: <?php echo $main_bg_color; ?> <?php echo $main_bg_color; ?> <?php echo $heading_main_color; ?> <?php echo $heading_main_color; ?>; box-shadow: -1px 1px 2px rgba(0,0,0,.1);}
.h_type_y {position: relative; padding: .5em 4em .5em .75em; -webkit-background: linear-gradient(-155deg, rgba(0,0,0,0) 1.5em, #f0f0f0 0%); background: linear-gradient(-165deg, rgba(0,0,0,0) 1.5em, #f0f0f0 0%); border-radius: 5px;}
.h_type_y::after {position: absolute; top: 0; right: 0; content: ''; width: 1.65em; height: 3.55em; background: linear-gradient(to left bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,.1) 0%, rgba(0,0,0,.2)); border-bottom-left-radius: 6px; box-shadow: -.2em .2em .3em -.1em rgba(0,0,0,.15); transform: translateY(-2.5em) rotate(-50deg); transform-origin: bottom right;}
.h_type_z {position: relative; padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>;}
.h_type_z::before {position: absolute; bottom: 8px; z-index: -1; content: ''; width: 30%; height: 50%; box-shadow: 0 10px 15px rgba(0,0,0,.2); -webkit-transform: rotate(-3deg); transform: rotate(-3deg); left: .3em;}
.h_type_z::after {position: absolute; bottom: 8px; z-index: -1; content: ''; width: 30%; height: 50%; box-shadow: 0 10px 15px rgba(0, 0, 0, .2); -webkit-transform: rotate(3deg); transform: rotate(3deg); right: .3em;}
.h_type_aa {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; box-shadow: 0 2px 6px rgba(0,0,0,.15);}
.h_type_ab {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border: 1px solid #eee; box-shadow: 1px 1px 0 rgba(255,255,255,.5) inset;}
.h_type_ac {padding: .75em 1em; background-color: <?php echo $heading_base_color; ?>; border: 1px solid #eee; box-shadow: 1px 1px 0 rgba(255,255,255,.5) inset, -1px -1px 0 rgba(100,100,100,.1) inset;}
.h_type_ad {margin: 0 .2em; padding: 0.2em 0.5em; background: <?php echo $heading_base_color; ?>; color: <?php echo $heading_color; ?>; border: dashed 1px <?php echo $heading_main_color; ?>; box-shadow: 0px 0px 0px .2em <?php echo $heading_base_color; ?>;}
.h_type_ae {display: inline; padding: 0 2px 3px; background: linear-gradient(transparent 65%, <?php echo $heading_accent_color; ?> 0%);}
.h_type_af {padding: .75em 1em; background: -webkit-linear-gradient(top, <?php echo $heading_main_color; ?> 0%, <?php echo $heading_accent_color; ?> 100%); background: linear-gradient(to bottom, <?php echo $heading_main_color; ?> 0%, <?php echo $heading_accent_color; ?> 100%); color: #fff; text-shadow: 1px 1px 1px rgba(0, 0, 0, .3);}
.h_type_ag {padding: .75em 1em; background: -webkit-repeating-linear-gradient(45deg, <?php echo $heading_main_color; ?>, <?php echo $heading_main_color; ?> 5px, <?php echo $heading_accent_color; ?> 5px, <?php echo $heading_accent_color; ?> 10px); background: repeating-linear-gradient(45deg, <?php echo $heading_main_color; ?>, <?php echo $heading_main_color; ?> 5px, <?php echo $heading_accent_color; ?> 5px, <?php echo $heading_accent_color; ?> 10px); color: #fff; text-shadow: 1px 1px 1px rgba(0, 0, 0, .3);}
.h_type_ah {padding: .75em 1em; border: 1px solid <?php echo $heading_accent_color; ?>; border-top: 3px solid <?php echo $heading_main_color; ?>; background: -webkit-linear-gradient(top, #fff 0%, <?php echo $heading_base_color; ?> 100%); background: linear-gradient(to bottom, #fff 0%, <?php echo $heading_base_color; ?> 100%); box-shadow: 0 -1px 0 rgba(255, 255, 255, 1) inset;}
</style>
<!--引用-->
<style type="text/css">
blockquote {
	position: relative;
	margin: 2em 2%;
	padding: 5em 4%;
	font-size: .9375em;
	background-color: <?php echo $blockquote_base_color; ?>;
	<?php if($blockquote_type == 'blockquote_type_a'): ?><?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_b'): ?>border-left: 4px solid <?php echo $blockquote_main_color; ?>;<?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_c'): ?>border: 2px solid <?php echo $blockquote_main_color; ?>;<?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_d'): ?>padding: 3em 4%;<?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_e'): ?>padding: 4em 4% 3em;<?php endif; ?>
	<?php if(get_theme_mod('blockquote_font_style','normal') == 'italic'): ?>font-style: italic;<? endif; ?>
	<?php if(get_theme_mod('blockquote_shadow','disabled') == 'enabled'): ?>box-shadow: 0 3px 5px rgba(0,0,0,.2);<? endif; ?>
}
blockquote:before {
	position: absolute;
	top: .5em;
	font-family: FontAwesome;
	font-size: 2em;
	color: <?php echo $blockquote_accent_color; ?>;
	content:'\f10d';
	<?php if($blockquote_type == 'blockquote_type_a'): ?><?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_b'): ?><?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_c'): ?><?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_d'): ?>display: inline-block; top: -.5em; left: 1em; width: 2em; height: 2em; font-size: 1.25em; line-height: 2; text-align: center; background-color: <?php echo $blockquote_main_color; ?>;<?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_e'): ?>display: inline-block; position: absolute; top: .5em; left: -.5em; width: 2.5em; height: 2em; font-family: FontAwesome; font-size: 1.25em; line-height: 2; text-align: center; background: <?php echo $blockquote_main_color; ?>; content: "\f10d";<?php endif; ?>
}
blockquote:after {
	position: absolute;
	right: 1em;
	bottom: .5em;
	font-family: FontAwesome;
	font-size: 2em;
	color: <?php echo $blockquote_accent_color; ?>;
	content:'\f10e';
	<?php if($blockquote_type == 'blockquote_type_a'): ?><?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_b'): ?><?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_c'): ?><?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_d'): ?>top: -.5em; right: inherit; bottom: inherit; left: 3em; font-size: 1.25em; border-bottom: .5em solid <?php echo $blockquote_main_color; ?>; border-right: 9px solid transparent; content: '';<?php endif; ?>
	<?php if($blockquote_type == 'blockquote_type_e'): ?>top: 2.5em; right: inherit; bottom: inherit; left: -.5em; font-size: 1.25em; border-bottom: solid 8px transparent; border-right: solid .5em <?php echo $blockquote_main_color; ?>; content: '';<?php endif; ?>
}
blockquote footer {
	font-size: .875em;
	text-align: right;
	color: inherit;
	background-color: inherit;
}
blockquote footer cite {
	font-style: normal;
	<?php if(get_theme_mod('blockquote_font_style','normal') == 'italic'): ?>font-style: italic;<? endif; ?>
}
blockquote footer cite a {
}
</style>
<!--その他-->
<style type="text/css">
body {
	color: <?php echo $body_color; ?>;
	background-color: <?php echo $base_color; ?>;
}
a {
	color: <?php echo $a_color; ?>;
}
#logo h1,
#logo div {
	margin-top: <?php echo $header_padding_top_pc; ?>px;
	font-size: <?php echo $header_logo_size_pc; ?>px;
}
<?php if($header_bg_color == $header_menu_bg_color): ?>
header.site .container {
	padding: 1em 0 0;
}
header.site nav {
	padding: 0 0 1em;
}
<?php endif ;?>
@media (max-width: 767px) {
#logo h1,
#logo div {
	margin-top: 0px;
	font-size: <?php echo $header_logo_size_sp; ?>px;
}
}
#main-visual .catchcopy h2,
#main-visual .catchcopy .desc {
	color: <?php echo $front_main_visual_color; ?>;
}
#toc-wrap {
	background-color: <?php echo $toc_bg_color; ?>;
	border-color: <?php echo $toc_main_color; ?>;
}
.list article a section.article,
#author-info .name a,
#author-info ul li a,
#recommend ul li a time,
#recommend ul li a h5,
#author-posts ul li a time,
#author-posts ul li a h5 {
	color: <?php echo $body_color; ?>;
}
header.site {
	background-color: <?php echo $header_bg_color; ?>;
}
header.site nav,
header.site nav ul li.menu-item-has-children .sub-menu {
	background-color: <?php echo $header_menu_bg_color; ?>;
}
header.site nav ul li a,
footer.site nav ul li a {
	color: <?php echo $header_menu_color; ?>;
}
footer.site {
	background-color: <?php echo $footer_bg_color; ?>;
}
footer.site .container nav ul li a {
	color: <?php echo $footer_menu_color; ?>;
}
#logo * a {
	color: <?php echo $header_logo_color; ?>;
}
.new-mark {
	color: <?php echo $accent_color; ?>;
}
.widget_popular_posts ul li a .rank {
	background-color: <?php echo $accent_color; ?>;
}
aside#sidebar .widget h4 {
	color: <?php echo $sidebar_widget_ttl_color; ?>;
	background-color: <?php echo $sidebar_widget_ttl_bg_color; ?>;
	border: 1px solid <?php echo $sidebar_widget_ttl_border_color; ?>;
}
aside#footer {
	color: <?php echo $footer_widget_color; ?>;
	background-color: <?php echo $footer_widget_bg_color; ?>;
}
aside#footer a {
	color: <?php echo $footer_widget_color; ?>;
}
#page-top-btn a {
	color: <?php echo $page_top_btn_color; ?>;
	background-color: <?php echo $page_top_btn_bg_color; ?>;
}
a.cat,
#categories ul li a,
#recommend ul li a .cat,
#author-posts ul li a .cat {
	color: <?php echo $cat_color; ?>;
	background-color: <?php echo $cat_bg_color; ?>;
	border-color: <?php echo $cat_border_color; ?>;
}
#tags ul li a,
.widget_tag_cloud .tagcloud a,
aside#footer .container .block .widget .tagcloud a {
	color: <?php echo $tag_color; ?>;
	background-color: <?php echo $tag_bg_color; ?>;
	border-color: <?php echo $tag_border_color; ?>;
}
.widget_tag_cloud .tagcloud a:hover,
aside#footer .container .block .widget .tagcloud a:hover {
	color: <?php echo $tag_bg_color; ?>;
	background-color: <?php echo $tag_color; ?>;
	border-color: <?php echo $tag_border_color; ?>;
}
#main-visual .type-c .catchcopy {
	background-color: <?php echo $front_main_visual_bg_color; ?>;
}
#main-visual .catchcopy a {
	color: <?php echo $front_main_visual_btn_color; ?>;
	background-color: <?php echo $front_main_visual_btn_bg_color; ?>;
}
#msg {
	color: <?php echo $front_msg_color; ?>;
	background-color: <?php echo $front_msg_bg_color; ?>;
}
#items .container .item a.btn {
	background-color: <?php echo $front_items_btn_bg_color; ?>;
	border-color: <?php echo $front_items_btn_border_color; ?>;
	color: <?php echo $front_items_btn_color; ?>;
}
#follow .container {
	color: <?php echo $follow_color; ?>;
	background-color: <?php echo $follow_bg_color; ?>;
}
#news {
	background-color: <?php echo $news_bg_color; ?>;
}
#news p,
#news p a {
	color: <?php echo $news_color; ?>;
}
#cta {
	color: <?php echo $cta_color; ?>;
	background-color: <?php echo $cta_bg_color; ?>;
}
#cta a {
	color: <?php echo $cta_btn_color; ?>;
	background-color: <?php echo $cta_btn_bg_color; ?>;
}

nav.pagination ul li a {
	color: <?php echo $pagination_a_color; ?>;
	background-color: <?php echo $pagination_a_bg_color; ?>;
}
nav.pagination ul li span.dots {
	color: <?php echo $pagination_dots_color; ?>;
	background-color: <?php echo $pagination_dots_bg_color; ?>;
}
nav.pagination ul li span.current {
	color: <?php echo $pagination_current_color; ?>;
	background-color: <?php echo $pagination_current_bg_color; ?>;
}
#l3.single.c1 main article header.article:before {
	background: rgba(0,0,0,<?php echo $post_eyecatch_1col_opacity; ?>);
}

</style>
<?php
}
add_action('wp_head', 'bloco_customize_css');

function is_share_twitter_state(){
return get_theme_mod('share_twitter_state', 'checked');
}
function is_share_facebook_state(){
return get_theme_mod('share_facebook_state', 'checked');
}
function is_share_google_plus_state(){
return get_theme_mod('share_google_plus_state', 'checked');
}
function is_share_hatebu_state(){
return get_theme_mod('share_hatebu_state', 'checked');
}
function is_share_pocket_state(){
return get_theme_mod('share_pocket_state', 'checked');
}
function is_share_feedly_state(){
return get_theme_mod('share_feedly_state', 'checked');
}
function is_share_line_state(){
return get_theme_mod('share_line_state', 'checked');
}