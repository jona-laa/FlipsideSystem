<?php
  /*
    * Generates section with a 3x grid for shorter articles, e.g features
    *
    * @category   post category to be used in articles
    * @posts      number of articles to render
    *
  */
  function insert_grid_3x( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Features',
      'posts' => 9,
      'id' => null
    ), $atts));

    // Open section and container tags
    $output = '
    <section ';
    
    if($id) {
      $output .= 'id="'. $id .'"';
    }

    $output .=  '>
      <div class="container">
        <div class="grid-3x">
      ';

    // Create WP-query arguments
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $category,
        'posts_per_page' => $posts,
    );

    // Get posts and create articles
    $arr_posts = new WP_Query( $args );
    if ($arr_posts->have_posts()) :
        while ($arr_posts->have_posts()) :
            $arr_posts->the_post();

            $output .= '
            <div class="benefits__card grid-3x__item">'
              . get_the_post_thumbnail(null, 'media-medium') .
              '<h3 class="benefits__card-heading">' 
                . get_the_title() . 
              '</h3>' .
                get_the_content() . 
            '</div>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
        </div> <!-- End grid-3x -->
      </div> <!-- End container -->
    </section>';

    return $output;
  }

  add_shortcode('grid', 'insert_grid_3x');
?>