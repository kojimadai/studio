<?php $carousel_state = get_theme_mod('carousel_state'); ?>
<?php $carousel_pattern = get_theme_mod('carousel_pattern','random'); ?>
<?php if($carousel_state == 'disabled'): ?><!--非表示ならば-->

<?php elseif(($carousel_state == 'enabled') && ($carousel_pattern == 'id') && (get_theme_mod('carousel_post_id'))): ?><!--タイプAかつ投稿IDが真ならば-->
	<?php $carousel_post_id = get_theme_mod('carousel_post_id'); ?>
	<ul id="slick" class="slider">
		<?php $args = array(
		'post_type' => any,
		'include' => $carousel_post_id,
		);
		$customPosts = get_posts($args);
		if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
		?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()): ?>
						<figure class="eyecatch" style="background-image: url(<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); echo $image_url[0]; ?>);">
							<h5><span><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></span></h5>
						</figure>
					<?php elseif(get_theme_mod('common_default_thumbnail')): ?>
						<figure class="eyecatch" style="background-image: url(<?php echo get_theme_mod('common_default_thumbnail'); ?>);">
							<h5><span><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></span></h5>
						</figure>
					<?php else: ?>
						<figure class="eyecatch" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/default/eyecatch.png);">
							<h5><span><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></span></h5>
						</figure>
					<?php endif; ?>
				</a>
			</li>
		<?php endforeach; ?>
		<?php else : endif;
		wp_reset_postdata(); ?>
	</ul>
	<script type="text/javascript">
	jQuery(function( $ ) {
		jQuery('.slider').slick({
			centerMode: true,
			dots: true,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 260,
			centerPadding: '100px',
			slidesToShow: 4,
			responsive: [
			{
				breakpoint: 1199,
				settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '80px',
				slidesToShow: 4,
			}
			},
			{
				breakpoint: 991,
				settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '64px',
				slidesToShow: 3,
			}
			},
			{
				breakpoint: 767,
				settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 2,
			}
			}]
		});
		jQuery(window).load(function(){
		    jQuery(".slider").css("opacity", "1.0");
		});
	});
	</script>
<?php else: ?>
	<ul id="slick" class="slider">
		<?php $args = array(
		'post_type' => 'post',
		'orderby' => 'rand',
		'showposts' => 5
		);
		$customPosts = get_posts($args);
		if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
		?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()): ?>
						<figure class="eyecatch" style="background-image: url(<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); echo $image_url[0]; ?>);">
							<h5><span><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></span></h5>
						</figure>
					<?php elseif(get_theme_mod('common_default_thumbnail')): ?>
						<figure class="eyecatch" style="background-image: url(<?php echo get_theme_mod('common_default_thumbnail'); ?>);">
							<h5><span><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></span></h5>
						</figure>
					<?php else: ?>
						<figure class="eyecatch" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/default/eyecatch.png);">
							<h5><span><?php if(mb_strlen($post->post_title)>38) { $title= mb_substr($post->post_title,0,36) ; echo $title. "…" ;} else {echo $post->post_title;}?></span></h5>
						</figure>
					<?php endif; ?>
				</a>
			</li>
		<?php endforeach; ?>
		<?php else : endif;
		wp_reset_postdata(); ?>
	</ul>
	<script type="text/javascript">
	jQuery(function( $ ) {
		jQuery('.slider').slick({
			centerMode: true,
			dots: true,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 260,
			centerPadding: '100px',
			slidesToShow: 4,
			responsive: [
			{
				breakpoint: 1199,
				settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '80px',
				slidesToShow: 4,
			}
			},
			{
				breakpoint: 991,
				settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '64px',
				slidesToShow: 3,
			}
			},
			{
				breakpoint: 767,
				settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 2,
			}
			}]
		});
		jQuery(window).load(function(){
		    jQuery(".slider").css("opacity", "1.0");
		});
	});
	</script>
<?php endif; ?>
