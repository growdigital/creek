<?php remove_filter ('the_content', 'wpautop'); // TODO: temp disable auto br & p ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width,minimum-scale=1.0" name="viewport" />
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
  <title>Creek Creative Art &amp; Design Studios</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
  <?php wp_head(); ?> 
</head>
<body>
<div class="wrap">

<header class="header" role="banner">
  <div class="header__brand">
    <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
      <img class="header__logo" src="<?php echo get_template_directory_uri(); ?>/images/logotype.svg" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>" />
    </a>
    <div class="header__menu">
      <a href="#menu">Menu</a>
    </div>
  </div>
  <div class="header__contact">
    <div class="header__address">
      <a href="#location">1 Abbey Street, Faversham, Kent ME13 7BE</a>
    </div>
    <div class="header__tel">
       ‎<a href="tel:+441795535515">01795 535 515</a>
    </div>
  </div>
  <nav class="nav" id="menu" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'menu_primary' ) ); ?>
    <div class="open">
      Open: Tue–Sun, 10am–4pm
  </div>
  </nav>


  <div>
    <a href="#location">Location</a>
  </div>
</header>
