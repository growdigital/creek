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

  // Add page name to body class
  // http://wpprogrammer.com/snippets/add-post-page-name-to-body-class/
  add_filter( 'body_class', 'post_name_body_class' );
  function post_name_body_class( $classes ) {
    if( is_singular() ) {
      global $post;
      array_push( $classes, "{$post->post_type}-{$post->post_name}" );
    }
    return $classes;
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
  add_image_size( 'a4_medium', '148', '210', false );
  add_image_size( 'a4_large', '297', '420', false );

?>
