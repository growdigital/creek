<?php get_header('includes/header.php'); ?>

<main role="main">

<?php
$args = array( 'post_type' => 'latest', 'posts_per_page' => 1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
  the_title();
  echo '<div class="entry-content">';
  the_content();
  echo '</div>';
endwhile;
?>

<section class="Letterbox-wrap">

  <h2 class="HeadAlt HeadAlt--buff">What we offer</h2>

  <?php if(get_field('section')): ?>

    <ul class="Letterbox-list">

    <?php while(has_sub_field('section')): ?>
      <article class="Letterbox" class="<?php the_sub_field('section_promoted'); ?>">
      <!-- TODO: if true, then class = is-promoted -->
        <h1 class="Heading Heading--less"><a href="<?php echo the_sub_field('section_link'); ?>"><?php the_sub_field('section_title'); ?></a></h1>
        <a href="<?php echo the_sub_field('section_link'); ?>">
          <img class="Letterbox-image LinkOpacity" src="<?php
            $image = get_sub_field('section_image');
            $size = $image['sizes'];
            echo $size['large'] . '"' . ' alt="' . $image['alt'];  ?>">
          </a>
        <div><?php the_sub_field('section_copy'); ?></div>
      </article>
    <?php endwhile; ?>

    </ul>

  <?php endif; ?>
</section>

</main>

<?php get_footer(); ?>

<?php $image = get_sub_field('section_image'); echo $image['url']; ?>
