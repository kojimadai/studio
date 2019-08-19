<?php if(is_single()): ?>


		<div id="follow" data-wow-delay="0.5s">
			<?php $facebook_page_id = get_theme_mod( 'facebook_page_id' );?>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<?php get_template_part('template-parts/part/eyecatch'); ?>
			<div class="container">
				<div class="fb-like" data-href="<?php echo $facebook_page_id;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
				<div class="text">
					<p>この記事が気に入ったら<br><i class="fa fa-thumbs-up"></i> いいねしよう！</p>
					<p class="small">最新記事をお届けします。</p>
				</div>
			</div>
		</div>


<?php elseif(is_page()): ?>
	<?php $page_follow_state = get_theme_mod('page_follow_state'); ?>
	<?php if(($page_follow_state == 'enabled') && get_theme_mod('facebook_page_id') ): ?>
	  <div id="follow" data-wow-delay="0.5s">
	    <?php $facebook_page_id = get_theme_mod( 'facebook_page_id' );?>
	    <div id="fb-root"></div>
	    <script>(function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
	    fjs.parentNode.insertBefore(js, fjs);
	    }(document, 'script', 'facebook-jssdk'));</script>
	    <figure>
	      <?php if ( has_post_thumbnail() ): ?>
	      <?php the_post_thumbnail('home-thum'); ?>
	      <?php else: ?>
	      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.jpg">
	      <?php endif; ?>
	    </figure>
	    <div class="container">
	      <div class="fb-like" data-href="<?php echo $facebook_page_id;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
	      <div class="text">
	        <p>この記事が気に入ったら<br><i class="fa fa-thumbs-up"></i> いいねしよう！</p>
	        <p class="small">最新記事をお届けします。</p>
	      </div>
	    </div>
	  </div>
	<?php else: ?>
	<?php endif; ?>
<?php endif; ?>
