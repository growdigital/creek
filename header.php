<?php remove_filter ('the_content', 'wpautop'); // TODO: temp disable auto br & p ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width,minimum-scale=1.0" name="viewport">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title>Creek Creative Art &amp; Design Studios</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/favicon.png">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/modernizr.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/main.js"></script>
  <?php wp_head(); ?>

</head>
<body>
<div class="wrap" id="wrap">

<header class="Header" role="banner">
  <div class="Header-brand u-cf">
    <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
      <object class="Header-logo" type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/dist/assets/img/logotype.svg">
        <?php bloginfo('name'); ?> <?php bloginfo('description'); ?>
      </object>
    </a>
    <a class="Header-location" href="#location">
      <i class="Icon Icon--36 Icon--36--compass"></i><span class="u-isHiddenVisually">Location</span>
    </a>
  </div>
  <div class="Header-contact u-cf ">
    <a href="#menu" class="Header-menu u-nbfc">
      <i class="Icon Icon--36 Icon--36--menu"></i><span class="u-isHiddenVisually">Menu</span>
    </a>
    <div class="Header-address">
      <a href="#location">1 Abbey Street, Faversham, Kent ME13&nbsp;7BE</a>
    </div>
    <div class="Header-tel">
       ‎Telephone <a href="tel:+441795535515">01795 535 515</a>
    </div>
  </div>

  <nav class="nav" id="menu" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'menu_primary' ) ); ?>
    <div class="open">
      Open: Tue–Sun, 10am–4pm
    </div>
  </nav>

</header>
