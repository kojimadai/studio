<?php if(get_theme_mod('news_text')): ?>
	<div id="news">
		<p>
			<?php if(get_theme_mod('news_url')): ?>
				<a href="<?php echo get_theme_mod('news_url'); ?>"><?php echo get_theme_mod('news_text'); ?></a>
			<?php else: ?>
				<?php echo get_theme_mod('news_text'); ?>
			<?php endif; ?>
		</p>
	</div>
<?php endif; ?>
