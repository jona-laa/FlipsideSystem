<?php
  /*
    * Generates section with rows of three
    *
    * @category   post category to be used in articles
    * @posts      number of articles to render
    *
  */
  function insert_row_trio( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Pricing',
      'posts' => 3,
      'id' => null
    ), $atts));

    // Open section and container tags
    $output = '
    <section ';
    
    if($id) {
      $output .= 'id="'. $id .'"';
    }
    
    $output .= '><div class="container">
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