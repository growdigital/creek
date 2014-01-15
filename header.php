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
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
  <? // TODO: trim down the entire Open Sans font family!: ?>
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800|Open+Sans+Condensed:300,700,300italic' rel='stylesheet' type='text/css'> -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
  <?php wp_head(); ?> 
</head>
<body>
<div class="wrap">

<header class="header wire_block wire_nav" role="banner">
  <div class="branding">
    <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" width="50" height="50" /></a>
    <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
    <h2><?php bloginfo('description'); ?></h2>
  </div>
  <div class="contact">
    1 Abbey Street, Faversham, <a href="https://maps.google.co.uk/maps?expflags=enable_star_based_justifications:true&ie=UTF8&cid=6632365635905548926&q=Creek+Creative+Studios&iwloc=A&gl=GB&hl=en">ME13 7BE</a><br/>
     ‎<a href="tel:+441795535515">01795 535 515</a>
  </div>
  <div class="open">
    Open: Tue–Sun, 10am–4pm
  </div>
  <div class="wire_menu">
    <a href="#menu">Menu</a>
  </div>
  <div class="wire_menu wire_menu--location">
    <a href="#location">Location</a>
  </div>
</header>
