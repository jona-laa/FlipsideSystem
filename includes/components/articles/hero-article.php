<?php
  /*
    * Generates a "hero" article. Similar to media article, but wider on tablet.
    *
    * @param    string    $category        post category
    * @param    int       $posts           number of posts
    * @param    string    $order           flex-order(e.g --reverse)
    *
    * @return   string    $output          html
  */
  function insert_hero_article( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Home Hero',
      'posts' => 1,
      'order' => null,
    ), $atts));

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
            <article class="hero-article';
            $order ? $output .= ' ' .$order . '">' : $output .= '">';
              $output .= '<figure class="article__figure">' . 
                get_the_post_thumbnail(null, 'media-medium') . 
              '</figure>
              <div class="article__spacer"></div>
              <div class="article__text">' .
                ob_get_clean() . 
              '</div>
            </article>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    return $output;
  }

  add_shortcode('hero-article', 'insert_hero_article');
?>