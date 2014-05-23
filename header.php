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

<div class="Nav-wrap">

<header class="Header" role="banner">
  <div class="Header-brand">
    <a class="Header-logo LinkOpacity" href="<?php bloginfo('url'); ?>" title="Link to <?php bloginfo('name'); ?> home page">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/logotype.svg" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
    </a>
  </div>
  <div class="Header-contact">
    <a href="#menu" class="Header-menu">
      <i class="Icon Icon--36 Icon--36--menu"></i>
      <span class="u-isHiddenVisually">Menu</span>
    </a>
    <div class="Header-address">
      <a class="LinkLight" href="#location" title="Link to Location information at bottom of page">
        1 Abbey Street, Faversham, <span class="u-isHiddenVisuallySmall">Kent </span>ME13&nbsp;7BE<span class="u-isHiddenVisuallySmall u-isHiddenVisuallyMedium"> England</span>
      </a>
    </div>
    <a class="Header-tel LinkOpacity" href="tel:+441795535515" title="Creek Creative telephone number 01795 535 515">
      <i class="Icon Icon--36 Icon--36--tel"></i>
      <span class="u-isHiddenVisually">Telephone 01795 535 515</span>
    </a>
  </div>

  <nav class="Nav" id="Nav" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'menu_primary' ) ); ?>
    <div class="Nav-open">
      <p>Open:<br> Tue–Sun, 10am–4pm</p>
      <p>Office only:<br> Mon–Fri, 9am–6pm</p>
    </div>
  </nav>

</header>
