<?php
  /**
    * Generates section with row of three pricing cards
    *
    * @param    string    $category        post category
    * @param    int       $posts           number of posts
    * @param    string    $id              section id
    *
    * @return   string    $output          html
    */
  function insert_row_trio( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Pricing',
      'posts' => 3,
      'id' => null
    ), $atts));

    // Open section - optional section id
    $output = '
    <section ';
      $id ? $output .= 'id="'. $id .'">' : $output .= '>';
    
    // Open container and row-trio
    $output .= '
      <div class="container">
        <div class="row-trio">
      ';

    // Create WP-query arguments
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $category,
        'posts_per_page' => $posts
    );

    // Get posts and create articles
    $arr_posts = new WP_Query( $args );
    if ($arr_posts->have_posts()) :
        while ($arr_posts->have_posts()) :
            $arr_posts->the_post();
            ob_start();
            the_content();
            
            $output .= '
            <div class="pricing__card row-trio__item">' .
              ob_get_clean() .
            '</div>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
        </div> <!-- End row-trio -->
      </div> <!-- End container -->
    </section>';

    return $output;
  }

  add_shortcode('row-trio', 'insert_row_trio');
?>