<?php get_header('includes/header.php'); ?>

<?php // while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <h1 class="article__head"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </article>
<?php // endwhile; ?>


<section class="exhibitions">

<h1>Exhibitions</h1>

<div class="exhibitions-current">

<h2>Current </h2>



<?php // Using ACF repeater normal array
// $rows = get_field('carousel');
// if($rows)
//   { 
//     echo '<ol class="carousel-indicators">';
//     foreach($rows as $i => $row) {
//       echo '<li class="';
//       if ($i == 0) echo 'active'; 
//       echo '" data-target="#carousel" data-slide-to="' . $i++ .'"></li>';
//     }
//     echo '</ol><!-- / carousel-indicators -->';
//     echo '<div class="carousel-inner">';
// 
//     foreach($rows as $i => $row) {
//       echo '<div class="item';
//       if ($i == 0) echo ' active'; 
//       echo '"><img src="'. $row['carousel_image']['url'] .'" alt="' . $row['carousel_image_desc'] . '" /></div>';
//     }
//     echo '</div><!-- / .carousel-inner -->';
//   }
// ?>

<?php

// If you use get_posts() or WP_Query instead then you should ensure the following:
// 
// post_type - is set to 'event'
// suppress_filters - is set to false

?>

<h3 style="color:red;">all post_type event</h3>
<?php 
  $args = array(
    'numberposts'      => all,
    'post_type'        => 'event',
    'post_status'      => 'publish',
    'suppress_filters' => false 
  );
  $events = get_posts($args);
  foreach ($events as $post) : setup_postdata($post); 
?>
<li>
  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
  <?php $thumb = wp_get_attachment_image_src(get_field('poster_image'), 'thumbnail'); ?>
  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" /></a>
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
 
<?php 
  endforeach; 
  wp_reset_postdata();
?>

<hr>
<h3 style="color:red;">Event Organiser custom taxonomy <code>event-category</code></h3>

<? 
  // Get EO categories http://wordpress.stackexchange.com/questions/58734/how-to-use-get-categories-with-event-organiser-plugin
  $taxonomies = array('event-category');
  $terms = get_terms($taxonomies, $args);
  var_dump($terms); 
?>
<hr/>
<h3 style="color:red;">EO example for current exhibition</h3>
<?php
  // Exhibitions current
  $exhibitions_current = eo_get_events(array(
   'numberposts'=>all,
    'tax_query'=>array(array(
      'taxonomy'=>'event-category',
      'operator'=>'IN',
      'field'=>'slug',
      'terms'=>array('exhibition')
      )),
    'event_start_before'=>'today',
    'event_end_after'=>'today',
    'showpastevents'=>true // Will be deprecated, but set it to true to play it safe.
  ));

  if($exhibitions_current):
    foreach ($exhibitions_current as $event):
      // Check if all day, set format accordingly
      $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
      printf(
        '<article><a href="%s">%s</a> on %s</article>',
        get_permalink($event->ID),
        get_the_title($event->ID),
        eo_get_the_start($format, $event->ID,null,$event->occurrence_id)
      );
    endforeach;
  endif;

 ?>
</div>


<div class="exhibitions-future">

<h2>Next</h2>
<?php
  // Exhibitions next
  $exhibitions_next = eo_get_events(array(
    'numberposts'=>all,
    'tax_query'=>array(array(
      'taxonomy'=>'event-category',
      'operator'=>'IN',
      'field'=>'slug',
      'terms'=>array('exhibition')
      )),
    'event_start_after'=>'today',
    'showpastevents'=>true //Will be deprecated, but set it to true to play it safe.
  ));
  if($exhibitions_next):
    foreach ($exhibitions_next as $event):
      //Check if all day, set format accordingly
      $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
      printf(
        '<article><a href="%s">%s</a> on %s</article>',
        get_permalink($event->ID),
        get_the_title($event->ID),
        eo_get_the_start($format, $event->ID,null,$event->occurrence_id)
      );
    endforeach;
  endif;
 ?>

</div><!-- /.exhibitions-future -->

<div class="exhibitions-past">

<h2>Past Exhibitions</h2>

<?php
  // Exhibitions past
  $exhibitions_past = eo_get_events(array(
    'numberposts'=>4,
    'tax_query'=>array(array(
      'taxonomy'=>'event-category',
      'operator'=>'IN',
      'field'=>'slug',
      'terms'=>array('exhibition')
      )),
    'event_start_before'=>'today',
    'showpastevents'=>true //Will be deprecated, but set it to true to play it safe.
  ));
  if($exhibitions_past):
    foreach ($exhibitions_past as $event):
      //Check if all day, set format accordingly
      $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
      printf(
        '<article><a href="%s">%s</a> on %s</article>',
        get_permalink($event->ID),
        get_the_title($event->ID),
        eo_get_the_start($format, $event->ID,null,$event->occurrence_id)
      );
    endforeach;
  endif;
 ?>

<hr/>
</div><!-- /.exhibitions-past -->


</section><!-- /.exhibitions -->



<section><!-- home exhibitions -->
  <h1>Exhibitions + link</h1>
  <ol>
    <li><b>Current</b>
      <ul>
        <li>Display event(s) of type exhibition where date is current
          <ul>
            <li>Title + link</li>
            <li>A4 Thumbnail + link</li>
            <li>Artist(s) inline</li>
            <li>Date range</li>
          </ul>
        </li>
        <li>If no exhibition, display nothing?</li>
      </ul>
    </li>

    <li><b>Next</b>
      <ul>
        <li>Display next event(s) of type exhibition where date is in the future
          <ul>
            <li>Title + link</li>
            <li>A4 Thumbnail + link</li>
            <li>Artist(s) inline</li>
            <li>Date range</li>
          </ul>
        </li>
        <li>If no exhbition, display nothing?</li>
      </ul>
    </li>
    <li>If no exhibitions, placeholder text?</li>
  </ol>
</section>

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

<section>
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
</section>

<?php get_footer(); ?>

<?php $image = get_sub_field('section_image'); echo $image['url']; ?>