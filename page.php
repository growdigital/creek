<?php get_header('includes/header.php'); ?>

<div class="PageWrap">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1 class="article__head"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
