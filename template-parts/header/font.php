<style type="text/css">
<?php $font_size = get_theme_mod('font_size'); ?>
<?php if($font_size == "s14"): ?>html {font-size: 14px;}
<?php elseif($font_size == "s15"): ?>html {font-size: 15px;}
<?php elseif($font_size == "s16"): ?>html {font-size: 16px;}
<?php elseif($font_size == "s17"): ?>html {font-size: 17px;}
<?php elseif($font_size == "s18"): ?>html {font-size: 18px;}
<?php else: ?>html {font-size: 16px;}
<?php endif;?>
</style>

<style type="text/css">
<?php $line_height = get_theme_mod('line_height','l16'); ?>
<?php if($line_height == "l10"): ?>body {line-height: 1;}
<?php elseif($line_height == "l11"): ?>body {line-height: 1.1;}
<?php elseif($line_height == "l12"): ?>body {line-height: 1.2;}
<?php elseif($line_height == "l13"): ?>body {line-height: 1.3;}
<?php elseif($line_height == "l14"): ?>body {line-height: 1.4;}
<?php elseif($line_height == "l15"): ?>body {line-height: 1.5;}
<?php elseif($line_height == "l16"): ?>body {line-height: 1.6;}
<?php elseif($line_height == "l17"): ?>body {line-height: 1.7;}
<?php elseif($line_height == "l18"): ?>body {line-height: 1.8;}
<?php elseif($line_height == "l19"): ?>body {line-height: 1.9;}
<?php elseif($line_height == "l20"): ?>body {line-height: 2.0;}
<?php endif;?>
</style>

<?php $font_family_ja = get_theme_mod('font_family_ja','noto_sans_japanese'); ?>
<?php if($font_family_ja == "gothic"): ?>
	<style type="text/css">body {font-family: "游ゴシック", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}</style>
<?php elseif($font_family_ja == "mincho"): ?>
	<style type="text/css">body {font-family: "游明朝", YuMincho, "ヒラギノ明朝 ProN W3", "Hiragino Mincho ProN", "HG明朝E", "ＭＳ Ｐ明朝", serif;}</style>
<?php elseif($font_family_ja == "meiryo"): ?>
	<style type="text/css">body {font-family: "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}</style>
<?php elseif($font_family_ja == "mplus_1p"): ?>
	<link href="https://fonts.googleapis.com/earlyaccess/mplus1p.css" rel="stylesheet" />
	<style type="text/css">body {font-family: "Mplus 1p";}</style>
<?php elseif($font_family_ja == "rounded_mplus_1c"): ?>
	<link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
	<style type="text/css">body {font-family: "Rounded Mplus 1c";}</style>
<?php elseif($font_family_ja == "sawarabi_mincho"): ?>
	<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
	<style type="text/css">body {font-family: "Sawarabi Mincho";}</style>
<?php elseif($font_family_ja == "sawarabi_gothic"): ?>
	<link href="https://fonts.googleapis.com/earlyaccess/sawarabigothic.css" rel="stylesheet" />
	<style type="text/css">body {font-family: "Sawarabi Gothic";}</style>
<?php elseif($font_family_ja == "noto_sans_japanese"): ?>
	<link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
	<style type="text/css">body {font-family: "Noto Sans Japanese";}</style>
<?php endif; ?>

<?php if(get_theme_mod('header_logo_type','txt_ja') == 'txt_en'): ?>
	<?php if(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Abril_Fatface'): ?>
		<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Abril Fatface', cursive;}</style>
	<?php elseif(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Archivo_Black'): ?>
		<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Archivo Black', sans-serif;}</style>
	<?php elseif(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Bungee_Inline'): ?>	
		<link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Bungee Inline', cursive;}</style>
	<?php elseif(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Comfortaa'): ?>
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Comfortaa', cursive;}</style>
	<?php elseif(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Lobster'): ?>
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Lobster', cursive;}</style>
	<?php elseif(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Limelight'): ?>
		<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Limelight', cursive;}</style>
	<?php elseif(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Syncopate'): ?>
		<link href="https://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Syncopate', sans-serif;}</style>
	<?php elseif(get_theme_mod('header_logo_font_family_en','Archivo_Black') == 'Codystar'): ?>
		<link href="https://fonts.googleapis.com/css?family=Codystar" rel="stylesheet">
		<style type="text/css">#logo h1 a,#logo div a {font-family: 'Codystar', cursive;}</style>
	<?php endif; ?>
<?php endif; ?>

<?php if(get_theme_mod('date_font_family','Roboto') == 'Lobster'): ?>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<style type="text/css">time {font-family: 'Lobster', cursive;}</style>
<?php elseif(get_theme_mod('date_font_family','Roboto') == 'Merriweather'): ?>
	<link href="https://fonts.googleapis.com/css?family=" rel="stylesheet">
	<style type="text/css">time {font-family: 'Merriweather', serif;}</style>
<?php elseif(get_theme_mod('date_font_family','Roboto') == 'Roboto'): ?>	
	<link href="https://fonts.googleapis.com/css?family=" rel="stylesheet">
	<style type="text/css">time {font-family: 'Roboto', sans-serif;}</style>
<?php elseif(get_theme_mod('date_font_family','Roboto') == 'Montserrat'): ?>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style type="text/css">time {font-family: 'Montserrat', sans-serif;}</style>
<?php endif; ?>







