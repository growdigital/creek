<header class="header_main" role="banner">
  <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
  <h2><?php bloginfo('description'); ?></h2>

  <nav class="nav" id="menu" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'menu_primary' ) ); ?>
  </nav>

</header>