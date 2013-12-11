<?php get_header('includes/header.php'); ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <h1 class="article__head"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </article>
<?php endwhile; ?>

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
      <img src="<?php $image = get_sub_field('section_image'); $size = $image['sizes']; echo $size['thumbnail'] . '"' . ' alt="' . $image['alt'];  ?>"/>
      <? // var_dump($image); ?>
    <?php the_sub_field('section_copy'); ?>
    </article>
 
  <?php endwhile; ?>
 
  </ul>
 
<?php endif; ?>
</section>

<?php get_footer(); ?>

<?php $image = get_sub_field('section_image'); echo $image['url']; ?>