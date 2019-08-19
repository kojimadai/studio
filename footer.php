				<?php get_template_part( 'template-parts/footer/page-top-btn' ); ?>
				<aside id="footer">
					<div class="container">
						<?php if(is_mobile() && is_active_sidebar('footer-sp')): ?>
							<?php dynamic_sidebar('footer-sp'); ?>
						<?php else:?>
							<?php if(is_active_sidebar('footer_left')): ?><div class="block"><?php dynamic_sidebar('footer_left'); ?></div><?php endif; ?>
							<?php if(is_active_sidebar('footer_center')): ?><div class="block"><?php dynamic_sidebar('footer_center'); ?></div><?php endif; ?>
							<?php if(is_active_sidebar('footer_right')): ?><div class="block"><?php dynamic_sidebar('footer_right'); ?></div><?php endif; ?>
						<?php endif; ?>
					</div>
					<?php if(is_active_sidebar('footer_all')): ?>
						<div class="container">
							<?php dynamic_sidebar('footer_all'); ?>
						</div>
					<?php endif; ?>
				</aside>
				<footer class="site" role="contentinfo">
					<div class="container">
						<?php get_template_part( 'template-parts/footer/nav' ); ?>
						<div class="copyright">&copy;Copyright <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>" rel="nofollow"><?php if(get_theme_mod('copyright_text')): echo get_theme_mod('copyright_text'); else: bloginfo('name'); endif; ?></a> .All Rights Reserved.</div>
					</div>
				</footer>
			</div><!--#layer２-->
		</div><!--#layer1-->
		<script>
			$(function() {
				$('.single section.article h2').addClass('<?php echo get_theme_mod('h2_type','h_type_a'); ?>');
				$('.single section.article h3').addClass('<?php echo get_theme_mod('h3_type','h_type_a'); ?>');
				$('.single section.article h4').addClass('<?php echo get_theme_mod('h4_type','h_type_a'); ?>');
				$('.single section.article h5').addClass('<?php echo get_theme_mod('h5_type','h_type_a'); ?>');
				$('.single section.article h6').addClass('<?php echo get_theme_mod('h6_type','h_type_a'); ?>');
			});
		</script>
	<?php wp_footer(); ?>
	</body>
</html>