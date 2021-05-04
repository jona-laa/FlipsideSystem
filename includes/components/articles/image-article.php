<?php
  /*
    * Generates section of image-articles. 
    *
    * @category   post category to be used in articles
    * @posts      number of articles to render
    *
  */
  function insert_image_article( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Usage Info',
      'posts' => 1,
      'order' => null,
      'background' => 'white'
    ), $atts));

    // Open section and container tags
    $output = '
    <section class="--bg-' . $background . '">
      <div class="container">
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

  add_shortcode('image-article', 'insert_image_article');
?>