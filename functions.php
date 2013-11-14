<?php
  // Menu Theme Support
  add_action( 'init', 'register_my_menus' );
  function register_my_menus() {
    register_nav_menus(
      array(
        'menu_primary' => __( 'Primary Menu' )
      )
    );
  }    
?>