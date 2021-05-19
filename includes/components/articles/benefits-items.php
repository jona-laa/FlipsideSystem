<?php
/**
  * Generates benefits-items that are featured in benefits-articles
  *
  * @param    string    $category          post category
  *
  * @return   string    $output            html
  */

function insert_benefits_items($category) {
  $output = '
  <div class="article__pitch">';

  // Create WP-query arguments
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => $category . ' Item',
    'posts_per_page' => 4,
  );

  // Get posts and create articles
  $arr_posts = new WP_Query( $args );
  if ($arr_posts->have_posts()) :
      while ($arr_posts->have_posts()) :
          $arr_posts->the_post();

          $output .= '
          <div class="article__pitch-item">' .
            get_the_post_thumbnail(null, 'media-medium') .
            '<p class="small --semi-bold">' .
              get_the_title() .             
            '</p>
          </div>
          '; 

      endwhile;
      wp_reset_postdata();
  endif;

  // Close section and container tags
  $output .= '
    </div>';

  return $output;  
}
?>