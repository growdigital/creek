<?php get_header('includes/header.php'); ?>

<main role="main">

<?php
  $args = array( 'post_type' => 'latest', 'posts_per_page' => 1 );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); ?>

<section class="exhibitions">

  <h1 class="u-isHiddenVisually">Exhibitions</h1>

  <div class="test">

    <div>
      <h2 class="HeadAlt">Current exhibition</h2>
      <article class="ArticleThumb Media Media--golden">
        <?php $current_thumb = wp_get_attachment_image_src(get_field('current_image'), 'a4_medium'); ?>
        <div class="Media-img Media-img--golden">
          <img class="ArticleThumb-img" src="<?php echo $current_thumb[0]; ?>" alt="<?php the_field('current_title'); ?>">
        </div>
        <div class="Media-body Media-body--golden">
          <h1 class="Heading Heading--less"><?php the_field('current_title'); ?></h1>
          <h2 class="Heading Heading--minor"><?php the_field('current_artist'); ?></h2>
          <p class="ArticleThumb-desc"><?php the_field('current_desc'); ?></p>
          <p class="ArticleThumb-date">
            <?php
              $current_date_from = DateTime::createFromFormat('Ymd', get_field('current_date_from'));
              $current_date_to = DateTime::createFromFormat('Ymd', get_field('current_date_to'));
              echo $current_date_from->format('D j M Y') . " to " . $current_date_to->format('D j M Y') ;
            ?>
          </p>
        </div>
      </article>
    </div>

    <div>
      <h2 class="HeadAlt">Next exhibition</h2>
      <article class="ArticleThumb Media Media--golden">
        <?php $next_thumb = wp_get_attachment_image_src(get_field('next_image'), 'a4_medium'); ?>
        <div class="Media-img Media-img--golden">
          <img class="ArticleThumb-img" src="<?php echo $next_thumb[0]; ?>" alt="<?php the_field('next_title'); ?>">
        </div>
        <div class="Media-body Media-body--golden">
          <h1 class="Heading Heading--less"><?php the_field('next_title'); ?></h1>
          <h2 class="Heading Heading--minor"><?php the_field('next_artist'); ?></h2>
          <p class="ArticleThumb-desc"><?php the_field('next_desc'); ?></p>
          <p class="ArticleThumb-date">
            <?php
              $next_date_from = DateTime::createFromFormat('Ymd', get_field('next_date_from'));
              $next_date_to = DateTime::createFromFormat('Ymd', get_field('next_date_to'));
              echo $next_date_from->format('D j M Y') . " to " . $next_date_to->format('D j M Y') ;
            ?>
          </p>
        </div>
      </article>
    </div>
  </div>

</section>

<section class="courses">
  <h2 class="HeadAlt">Courses</h2>
  <?php
    if( have_rows('courses') ): ?>

    <? while( have_rows('courses') ): the_row(); ?>
    <article class="ArticleThumb Media Media--golden">
      <?php $course_thumb = wp_get_attachment_image_src(get_sub_field('course_image'), 'a4_medium'); ?>
      <div class="Media-img Media-img--golden">
        <img class="ArticleThumb-img" src="<?php echo $course_thumb[0]; ?>" alt="">
      </div>
      <div class="Media-body Media-body--golden">
        <h1 class="Heading Heading--less"><?php the_sub_field('course_title'); ?></h1>
        <p class="ArticleThumb-date"><?php the_sub_field('course_date'); ?></p>
      </div>
    </article>
    <?php endwhile; ?>


  <p><?php the_sub_field('course_title'); ?></p>
          <?php endif ?>

</section>

<section class="latest" style="margin-bottom: 20px;">
  <h2 class="HeadAlt HeadAlt--buff">Latest</h2>
  <article class="Letterbox Letterbox-list">
    <h1 class="Heading Heading--less"><?php the_title(); ?></h1>
    <div><?php the_content(); ?></div>
  </article>
</section>

<?php
  endwhile;
  wp_reset_postdata();
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
