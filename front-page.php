<?php get_header('includes/header.php'); ?>

<main role="main">

<section class="exhibitions">

  <h1 class="u-isHiddenVisually">Exhibitions</h1>

  <!-- Current exhibitions -->
  <div>
    <h2 class="HeadAlt">Current exhibitions</h2>
    <?php
      $args = array(
        'numberposts'        => 'all',
        'post_type'          => 'event',
        'event-category'     => 'exhibition',
        'post_status'        => 'publish',
        'event_start_before' => 'today',
        'event_end_after'    => 'today',
        'suppress_filters'   =>  false
      );
      $events_current = get_posts($args);
    ?>
    <?php foreach ($events_current as $post) : setup_postdata($post); ?>
    <article class="ArticleThumb Media Media--golden">
      <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
      <a class="Media-img Media-img--golden" href="<?php the_permalink(); ?>"><img class="ArticleThumb-img" src="<?php echo $thumb[0]; ?>" alt="" /></a>
      <div class="Media-body Media-body--golden">
        <h1 class="Heading Heading--less"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php
          $artists = get_field('artist');
          if($artists) {
            echo '<p>';
            foreach($artists as $artist) {
              $artistName[] = $artist['artist_name'];
            }
            echo implode(', ', $artistName);
            unset($artistName);
            echo '</p>';
          }
        ?>
        <p class="ArticleThumb-desc"><?php $excerpt =  get_field('event_excerpt'); echo $excerpt; ?></p>
        <p class="ArticleThumb-date"><?php echo eo_get_the_start('D jS M Y'); ?> <br class="u-textBreak">to <?php echo eo_get_the_end('D jS M Y'); ?></p>
      </div>
    </article>
    <?php
      endforeach;
      wp_reset_postdata();
    ?>
  </div>

  <!-- Next exhibitions -->
  <div>
    <h2 class="HeadAlt">Next exhibitions</h2>

    <?php
      $args = array(
        'numberposts'       => 'all',
        'post_type'         => 'event',
        'event-category'    => 'exhibition',
        'post_status'       => 'publish',
        'event_start_after' => 'today',
        'suppress_filters'  =>  false
      );
      $events_next = get_posts($args);
      echo '<ul class="Listing">';
    ?>
    <?php foreach ($events_next as $post) : setup_postdata($post); ?>
    <li>
      <h3 class="Heading Heading--less"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <p class="ArticleThumb-desc"><?php $excerpt =  get_field('event_excerpt'); echo $excerpt; ?></p>
      <p class="ArticleThumb-date"><?php echo eo_get_the_start('D jS M Y'); ?> to <?php echo eo_get_the_end('D jS M Y'); ?></p>
    </li>
    <?php
      endforeach;
      wp_reset_postdata();
      echo '</ul>';
    ?>
  </div>
</section>

<section class="courses">

  <!-- NEXT COURSES -->
  <div class="courses_coming_up">
  <h2 class="HeadAlt">Upcoming courses</h2>

  <?php
    $args = array(
      'numberposts'        => 'all',
      'post_type'          => 'event',
      'event-category'     => 'course',
      'group_events_by'    => 'series',
      'post_status'        => 'publish',
      'event_start_after'  => 'today',
      'order'              => 'ASC',
      'suppress_filters'   =>  false
    );
    $courses_next = get_posts($args);
  ?>
  <?php foreach ($courses_next as $post) : setup_postdata($post); ?>
  <article class="ArticleThumb Media Media--golden">
    <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
    <a class="Media-img Media-img--golden" href="<?php the_permalink(); ?>"><img class="ArticleThumb-img" src="<?php echo $thumb[0]; ?>" alt="" /></a>
    <div class="Media-body Media-body--golden">
      <h1 class="Heading Heading--less"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      <p class="ArticleThumb-desc"><?php $excerpt =  get_field('event_excerpt'); echo $excerpt; ?></p>
      <p class="ArticleThumb-date">
        <?php if( eo_reoccurs() ){
                    echo eo_get_schedule_start('D jS M Y') . ' to ' . eo_get_schedule_end('D jS M Y');
              }else{
                    echo eo_get_the_start('D jS M Y');
              }
         ?>
        </p>
    </div>
  </article>
  <?php
    endforeach;
    wp_reset_postdata();
  ?>

  </div>

  <!-- CURRENT COURSES -->
  <div class="courses_currently_running">
  <h2 class="HeadAlt">Current courses</h2>

  <?php
    $args = array(
      'numberposts'        => 'all',
      'post_type'          => 'event',
      'event-category'     => 'course',
      'post_status'        => 'publish',
      'group_events_by'    => 'series',
      'event_start_before' => 'today',
      'event_end_after'    => 'today',
      'suppress_filters'   =>  false
    );
    $courses_current = get_posts($args);
    echo '<ul class="Listing">';
  ?>
  <?php foreach ($courses_current as $post) : setup_postdata($post); ?>
  <li>
    <h3 class="Heading Heading--less"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  </li>
  <?php
    endforeach;
    wp_reset_postdata();
    echo '</ul>';
  ?>

  </div>
</section>


<? // $post_type = get_post_type_object('event'); var_dump($post_type);?>

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
