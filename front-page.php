<?php get_header('includes/header.php'); ?>

<main role="main">

<section class="exhibitions">

<h1>Exhibitions</h1>

<div class="exhibitions-current">

<h2>Current exhibitions</h2>

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
  $events = get_posts($args);
?>
<?php foreach ($events as $post) : setup_postdata($post); ?>
<article>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
  
  <?php $excerpt =  get_field('excerpt'); ?>
  <p><?php echo $excerpt; ?>
  <p><?php echo eo_get_the_start('D jS M Y'); ?> to <?php echo eo_get_the_end('D jS M Y'); ?></p>
</article> 
<?php 
  endforeach; 
  wp_reset_postdata();
?>

</div><!-- /.exhibitions-current -->



<div class="exhibitions-next">

<h2>Next exhibitions</h2>

<?php 
  $args = array(
    'numberposts'        => 'all',
    'post_type'          => 'event',
    'event-category'     => 'exhibition',
    'post_status'        => 'publish',
    'event_start_after' =>  'today',
    'suppress_filters'   =>  false 
  );
  $events = get_posts($args);
?>
<?php foreach ($events as $post) : setup_postdata($post); ?>
<article>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
  <p><?php echo eo_get_the_start('D jS M Y'); ?> to <?php echo eo_get_the_end('D jS M Y'); ?></p>
</article> 
<?php 
  endforeach; 
  wp_reset_postdata();
?>

</div><!-- /.exhibitions-next -->

</section><!-- /.exhibitions -->


<section class="courses">

<div class="courses_coming_up">
  <h2>Courses coming up</h2>

<?php 
  $args = array(
    'numberposts'        => 'all',
    'post_type'          => 'event',
    'event-category'     => 'course',
    'post_status'        => 'publish',
    'event_start_after' =>  'today',
    'suppress_filters'   =>  false 
  );
  $events = get_posts($args);
?>
<?php foreach ($events as $post) : setup_postdata($post); ?>
<article>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
  <p><?php echo eo_get_the_start('D jS M Y'); ?> to <?php echo eo_get_the_end('D jS M Y'); ?></p>
</article> 
<?php 
  endforeach; 
  wp_reset_postdata();
?>

</div><!-- /.courses_coming_up -->

<div class="courses_currently_running">
  <h2>Courses currently running</h2>

<?php 
  $args = array(
    'numberposts'        => 'all',
    'post_type'          => 'event',
    'event-category'     => 'course',
    'post_status'        => 'publish',
    'event_start_before' => 'today',
    'event_end_after'    => 'today',
    'suppress_filters'   =>  false 
  );
  $events = get_posts($args);
  echo '<ul>'; 
?>
<?php foreach ($events as $post) : setup_postdata($post); ?>
<li>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
  <p><?php echo eo_get_the_start('D jS M Y'); ?> to <?php echo eo_get_the_end('D jS M Y'); ?></p>
</li> 
<?php 
  endforeach; 
  wp_reset_postdata();
  echo '</ul>';
?>


</div><!-- /.courses_currently_running -->

</section><!-- /.courses -->

<section><!-- home courses -->
  <h1>Courses + link</h1>
  <ol>
    <li><b>Upcoming courses</b>
      <ul>
        <li>Display event(s) of type course where date is future
          <ul>
            <li>Title + link</li>
            <li>A4 Thumbnail + link</li>
            <li>Short form dates</li>
          </ul>
        </li>
        <li>If no future courses, then nothing</li>
      </ul>
    </li>
    <li><b>Current courses</b>
      <ul>
        <li>Title + link</li>
      </ul>
    </li>
    <li>If no courses then placeholder text</li>
  </ol>
</section>

<? // $post_type = get_post_type_object('event'); var_dump($post_type);?>

<section class="sections">
<?php if(get_field('section')): ?>
 
  <ul>
 
  <?php while(has_sub_field('section')): ?>
    <article class="<?php the_sub_field('section_promoted'); ?>"> <!-- TODO: if true, then class = is-promoted -->
      <h1><?php the_sub_field('section_title'); ?></h1> 
      <img src="<?php 
        $image = get_sub_field('section_image'); 
        $size = $image['sizes']; 
        echo $size['medium'] . '"' . ' alt="' . $image['alt'];  ?>"/>
      <? // var_dump($image); ?>
    <?php the_sub_field('section_copy'); ?>
    </article>
  <?php endwhile; ?>
 
  </ul>
 
<?php endif; ?>
</section><!-- /.sections -->

</main>

<?php get_footer(); ?>

<?php $image = get_sub_field('section_image'); echo $image['url']; ?>