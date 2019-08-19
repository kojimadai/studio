<?php if(has_nav_menu('header')): ?>
	<nav role="navigation">
		<?php wp_nav_menu(array(
		'container' => false,
		'menu' => __( 'ヘッダーメニュー' ),
		'menu_class' => '',
		'theme_location' => 'header',
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'depth' => 0,
		'fallback_cb' => ''
		)); ?>
	</nav>
<?php endif; ?>