<?php if (is_active_sidebar('sp-menu')):?>
  <div class="remodal" data-remodal-id="spnavi" data-remodal-options="hashTracking:false">
    <button data-remodal-action="close" class="remodal-close">
      <span class="text gf">CLOSE</span>
    </button>
    <?php dynamic_sidebar( 'sp-menu' ); ?>
    <button data-remodal-action="close" class="remodal-close">
      <span class="text gf">CLOSE</span>
    </button>
  </div>
<?php else:?>
  <div class="remodal" data-remodal-id="spnavi" data-remodal-options="hashTracking:false">
    <button data-remodal-action="close" class="remodal-close">
      <span class="text gf">CLOSE</span>
    </button>
    <?php wp_nav_menu(array(
         'container' => false,
         'container_class' => 'sp_g_nav menu cf',
         'menu' => __( 'グローバルナビ' ),
         'menu_class' => 'sp_g_nav nav top-nav cf',
         'theme_location' => 'main-nav',
         'before' => '',
         'after' => '',
         'link_before' => '',
         'link_after' => '',
         'depth' => 0,
         'fallback_cb' => ''
    )); ?>
    <button data-remodal-action="close" class="remodal-close">
      <span class="text gf">CLOSE</span>
    </button>
  </div>
<?php endif; ?>
