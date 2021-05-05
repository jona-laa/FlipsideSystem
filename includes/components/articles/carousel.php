<?php
  /*
    * Generates section of image-articles. 
    *
    * @category   post category to be used in articles
    * @posts      number of articles to render
    *
  */
  function insert_carousel( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Testimonials',
      'posts' => 9,
      'heading' => 'heading="your heading here"',
      'subheading' => 'sub-heading="your sub-heading here"'
    ), $atts));

    // Open section and container tags
    $output = '
    <section class="testimonials" id="testimonials">
      <div class="container">
        <h2 class="--center-align">' . $heading . '</h2>
        <span class="sub-h --center-align">' . $subheading . '</span>
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
            <article class="image-article ' . $order . '">
              <figure class="article__figure">' . 
                get_the_post_thumbnail(null, 'media-medium') . 
              '</figure>
              <div class="article__spacer"></div>
              <div class="article__text"><p>' .
                ob_get_clean() . 
              '</p></div>
            </article>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
      </div> <!-- End container -->
    </section>';

    return $output;
  }

  add_shortcode('carousel', 'insert_carousel');
?>