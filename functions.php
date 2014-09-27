<?php

  // Menu Theme Support
  add_action( 'init', 'register_my_menus' );
  function register_my_menus() {
    register_nav_menus(
      array(
        'menu_primary' => __( 'Primary Menu' ),
        'menu_secondary' => __( 'Secondary Menu' )
      )
    );
  }

  // Add post thumbnails
  add_theme_support('post-thumbnails', array('post'));

  // Use WordPress default jQuery
  // add_action( 'wp_enqueue_script', 'load_jquery' );
  // function load_jquery() {
  //     wp_enqueue_script( 'jquery' );
  // }

  // Add custom image sizes
  // For A4 posters at different resolutions
  // Originally from Simple Image Sizes plugin
  add_image_size( 'a4_thumbnail', '74', '105', false );

  // Add Soil relative URLs
  add_theme_support('soil-relative-urls');



?>
