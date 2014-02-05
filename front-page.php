<?php get_header('includes/header.php'); ?>

<main role="main">

<section class="exhibitions">

<h1>Exhibitions</h1>

<!-- CURRENT EXHIBITIONS -->
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
  $events_current = get_posts($args);
?>
<?php foreach ($events_current as $post) : setup_postdata($post); ?>
<article>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <p><?php $excerpt =  get_field('event_excerpt'); echo $excerpt; ?></p>
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

</div><!-- /.exhibitions-current -->


<!-- NEXT EXHIBITIONS -->
<div class="exhibitions-next">
<h2>Next exhibitions</h2>

<?php 
  $args = array(
    'numberposts'        => 'all',
    'post_type'          => 'event',
    'event-category'     => 'exhibition',
    'post_status'        => 'publish',
    'event_start_after'  => 'today',
    'suppress_filters'   =>  false 
  );
  $events_next = get_posts($args);
?>
<?php foreach ($events_next as $post) : setup_postdata($post); ?>
<article>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <p><?php $excerpt =  get_field('event_excerpt'); echo $excerpt; ?></p>
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

<!-- *** NEXT COURSES *** -->
<div class="courses_coming_up">
<h2>Courses coming up</h2>

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
<article>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'a4_thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <p><?php $excerpt =  get_field('event_excerpt'); echo $excerpt; ?></p>

<?php // echo eo_get_schedule_start( 'jS M YY', 7 ); ?>
<?php // echo eo_get_schedule_last( 'jS M YY', 7 ); ?>

<?php if( eo_reoccurs() ){
            echo eo_get_schedule_start('D jS M Y') . ' to ' . eo_get_schedule_end('D jS M Y');
      }else{
            echo eo_get_the_start('D jS M Y');
      }
 ?>

</article> 
<?php 
  endforeach; 
  wp_reset_postdata();
?>

</div><!-- /.courses_coming_up -->

<!-- CURRENT COURSES -->
<div class="courses_currently_running">
<h2>Courses currently running</h2>

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
  echo '<ul>'; 
?>
<?php foreach ($courses_current as $post) : setup_postdata($post); ?>
<li>
  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li> 
<?php 
  endforeach; 
  wp_reset_postdata();
  echo '</ul>';
?>

<!-- if no courses, then placeholder? or nothing? -->

</div><!-- /.courses_currently_running -->

</section><!-- /.courses -->


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