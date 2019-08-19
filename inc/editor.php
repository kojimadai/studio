<?php
/*********************
順番を変更
*********************/
function myplugin_tinymce_buttons($buttons){
	unset($buttons);
	$buttons = array('formatselect','styleselect','bold','italic','bullist','numlist','blockquote','alignleft','aligncenter','alignright','link','amazon','button','box','balloon','hr','line_dotted','wp_more','wp_adv');
	return $buttons;
}
add_filter( 'mce_buttons', 'myplugin_tinymce_buttons' );
 
/*********************
「見出し1」「整形済みテキスト」を削除
*********************/
function custom_editor_settings($initArray){
	$initArray['block_formats'] = "段落=p; 見出し2=h2; 見出し3=h3; 見出し4=h4; 見出し5=h5; 見出し6=h6;";
	return $initArray;
	}
add_filter('tiny_mce_before_init','custom_editor_settings');

/*********************
ブログカードを自動生成
*********************/
function make_ogp_blog_card($the_content) {
    $res = preg_match_all('/^(<p>)?https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/p>)?(<br ? \/>)?$/im', $the_content,$m);
    foreach ($m[0] as $match) {
      $url = strip_tags($match);
	    $cache = get_site_transient($url);
	    if($cache):
	        $url_to_blogcard = $cache;
	    else:
	        require_once('OpenGraph.php');
	        $ogp           = OpenGraph::fetch($url);
	        $img           = $ogp->image;
	        $title         = $ogp->title;
	        $site_name     = $ogp->site_name;
	        $desc   = str_replace(']]<>',']]＜＞',$ogp->description);
	        $url_to_blogcard     =
	        '<article class="blogcard"><a href="'.$url.'"><figure style="background-image: url('.$img.');"></figure><section><div class="ttl">'.$title.'</div><div class="desc">'.$desc.'</div><div class="url">'.$url.'</div></section></a><span class="clip"></span></article>';
	        if(strlen($url) > 20){$transitname = wordwrap($url,20);}else{$transitname = $url;}
	        set_site_transient($transitname,$url_to_blogcard,12 * WEEK_IN_SECONDS);
	    endif;
      $the_content = preg_replace('{'.preg_quote($match).'}', $url_to_blogcard , $the_content, 1);
    }
  return $the_content;
}
add_filter('the_content','make_ogp_blog_card');
add_filter( 'embed_oembed_discover', '__return_false' );
remove_action( 'parse_query', 'wp_oembed_parse_query' );
remove_action( 'wp_head', 'wp_oembed_remove_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_remove_host_js' );
remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result');


/********************
目次と広告をH2タグの直前に表示
********************/
function add_before_h2($the_content) {
	if((get_theme_mod('toc_position','h2_1st_under') == 'h2_1st_under') && (get_theme_mod('post_toc_state','enabled') == 'enabled')) {
		$post_toc = '<div id="toc-wrap"><div class="ttl">'.get_theme_mod('toc_ttl','目次').'</div><div id="toc"></div></div>';
	}
	if((get_theme_mod('toc_position','h2_1st_under') == 'h2_1st_under') && (get_theme_mod('page_toc_state','enabled') == 'enabled')) {
		$page_toc = '<div id="toc-wrap"><div class="ttl">'.get_theme_mod('toc_ttl','目次').'</div><div id="toc"></div></div>';
	}

	if(get_theme_mod('post_ad_content_h2_1st') !== 'none') {
		$post_ad_content_h2_1st = get_theme_mod('post_ad_content_h2_1st');
		$is_post_ad_content_h2_1st = '<div class="ad">'.get_theme_mod($post_ad_content_h2_1st).'</div>';
	}
  if(get_theme_mod('post_ad_content_h2_2nd') !== 'none') {
  	$post_ad_content_h2_2nd = get_theme_mod('post_ad_content_h2_2nd');
  	$is_post_ad_content_h2_2nd = '<div class="ad">'.get_theme_mod($post_ad_content_h2_2nd).'</div>';
  }
  if(get_theme_mod('post_ad_content_h2_3rd') !== 'none') {
  	$post_ad_content_h2_3rd = get_theme_mod('post_ad_content_h2_3rd');
  	$is_post_ad_content_h2_3rd = '<div class="ad">'.get_theme_mod($post_ad_content_h2_3rd).'</div>';
  }
  if(get_theme_mod('page_ad_content_h2_1st') !== 'none') {
  	$page_ad_content_h2_1st = get_theme_mod('page_ad_content_h2_1st');
  	$is_page_ad_content_h2_1st = '<div class="ad">'.get_theme_mod($page_ad_content_h2_1st).'</div>';
  }
  if(get_theme_mod('page_ad_content_h2_2nd') !== 'none') {
  	$page_ad_content_h2_2nd = get_theme_mod('page_ad_content_h2_2nd');
  	$is_page_ad_content_h2_2nd = '<div class="ad">'.get_theme_mod($page_ad_content_h2_2nd).'</div>';
  }
  if(get_theme_mod('page_ad_content_h2_3rd') !== 'none') {
  	$page_ad_content_h2_3rd = get_theme_mod('page_ad_content_h2_3rd');
  	$is_page_ad_content_h2_3rd = '<div class="ad">'.get_theme_mod($page_ad_content_h2_3rd).'</div>';
  }
  if ( is_single() ) {
    $h2 = '/^<h2.*?>.+?<\/h2>$/im';
    if ( preg_match_all( $h2, $the_content, $h2s )) {
      if ( $h2s[0] ) {
        if ( $h2s[0][0] ) {
          $the_content  = str_replace($h2s[0][0], $is_post_ad_content_h2_1st.$post_toc.$h2s[0][0], $the_content);
        }
       if ( $h2s[0][1] ) {
          $the_content  = str_replace($h2s[0][1], $is_post_ad_content_h2_2nd.$h2s[0][1], $the_content);
        }
       if ( $h2s[0][2] ) {
          $the_content  = str_replace($h2s[0][2], $is_post_ad_content_h2_3rd.$h2s[0][2], $the_content);
        }
    	}
    }
  }
  return $the_content;
  if ( is_page() ) {
    $h2 = '/^<h2.*?>.+?<\/h2>$/im';
    if ( preg_match_all( $h2, $the_content, $h2s )) {
      if ( $h2s[0] ) {
        if ( $h2s[0][0] ) {
          $the_content  = str_replace($h2s[0][0], $is_page_ad_content_h2_1st.$page_toc.$h2s[0][0], $the_content);
        }
       if ( $h2s[0][1] ) {
          $the_content  = str_replace($h2s[0][1], $is_page_ad_content_h2_2nd.$h2s[0][1], $the_content);
        }
       if ( $h2s[0][2] ) {
          $the_content  = str_replace($h2s[0][2], $is_page_ad_content_h2_3rd.$h2s[0][2], $the_content);
        }
    	}
    }
  }
  return $the_content;
}
add_filter('the_content','add_before_h2');

/********************
シェアボタンを呼び出し
********************/
function post_share_upper() {
	$post_share_state = get_theme_mod('post_share_state');
	if(($post_share_state == 'enabled') || ($post_share_state == 'upper')):
	get_template_part('template-parts/part/share');
	endif;
}
function post_share_under() {
	$post_share_state = get_theme_mod('post_share_state');
	if(($post_share_state == 'enabled') || ($post_share_state == 'under')):
	get_template_part('template-parts/part/share');
	elseif(($post_share_state == 'upper') || ($post_share_state == 'disabled')):
	else:
	get_template_part('template-parts/part/share');
	endif;
}
function post_share_fixed() {
	$post_share_fixed_state = get_theme_mod('post_share_fixed_state');
	if(($post_share_fixed_state == 'enabled')):
	get_template_part('template-parts/part/share-fixed');
	endif;
}
function page_share_upper() {
	$page_share_state = get_theme_mod('page_share_state');
	if(($page_share_state == 'enabled') || ($page_share_state == 'upper')):
	get_template_part('template-parts/part/share');
	endif;
}
function page_share_under() {
	$page_share_state = get_theme_mod('page_share_state');
	if(($page_share_state == 'enabled') || ($page_share_state == 'under')):
	get_template_part('template-parts/part/share');
	elseif(($page_share_state == 'upper') || ($page_share_state == 'disabled')):
	else:
	get_template_part('template-parts/part/share');
	endif;
}
function page_share_fixed() {
	$page_share_fixed_state = get_theme_mod('page_share_fixed_state');
	if(($page_share_fixed_state == 'enabled')):
	get_template_part('template-parts/part/share-fixed');
	endif;
}

/********************
個別記事ページのコンテンツ下部に表示させるカテゴリリンク
********************/
function post_categories() {
	$cats = get_the_category();
	echo '<div id="categories" class="'.get_theme_mod('cat_design','square').'">';
	echo '<ul>';
	foreach($cats as $cat){
	echo '<li><a href="'.get_category_link($cat->term_id).'"><i class="'.get_theme_mod('cat_icon','fas fa-inbox').'"></i>'.esc_html($cat->name).'</a></li>';
	}
	echo '</ul></div>';
}

/********************
個別記事ページのコンテンツ下部に表示させるタグリンク
********************/
function post_tags() {
	if(has_tag()==true) {
		$tags = get_the_tags();
		echo '<div id="tags" class="'.get_theme_mod('tag_design','oval').'">';
		echo '<ul>';
		foreach($tags as $tag){
		echo '<li><a href="'.get_category_link($tag->term_id).'"><i class="'.get_theme_mod('tag_icon','fas fa-map-marker').'"></i>'.esc_html($tag->name).'</a></li>';
		}
		echo '</ul></div>';
	}
}

/********************
NEWマークを出力
********************/
function new_mark() {
	if(get_theme_mod('new_mark_date') == '0') {
	$days = null;
	} elseif(get_theme_mod('new_mark_date')) {
	$days = esc_attr(get_theme_mod('new_mark_date'));
	} else {
	$days = '3';
	}
	$daysInt = ((int)$days-1)*86400;
	$today = time();
	$entry = get_the_time('U');
	$dayago = $today-$entry;
	$front_new_mark_state = get_theme_mod('front_new_mark_state','enabled');
	$archive_new_mark_state = get_theme_mod('archive_new_mark_state');
	if (($dayago < $daysInt) && $days):
		if((is_home() || is_front_page()) && ($front_new_mark_state == 'enabled')):
			echo '<div class="new-mark">NEW</div>';
		elseif((!is_home()) && (!is_front_page()) && ($archive_new_mark_state == 'enabled')):
			echo '<div class="new-mark">NEW</div>';
		endif;
	endif;
}