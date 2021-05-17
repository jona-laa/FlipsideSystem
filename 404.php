<?php 
/* 
  * Template for 404 - Content not found
*/
get_header(); 

$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' => '404',
  'posts_per_page' => 1,
);

$arr_posts = new WP_Query( $args );

if ($arr_posts->have_posts()) :
  while ($arr_posts->have_posts()) :
    $arr_posts->the_post(); 
?>

<section>
  <h1><?php the_title()?></h1>
  <div class="container">
    <div class="four-oh-four">
      <?php
                        // image
                        the_post_thumbnail();

                        // Text
                        the_content();  
                        ?>
    </div>
  </div>
</section>

<?php
  endwhile;
  wp_reset_postdata();
endif;
get_footer(); 
?>