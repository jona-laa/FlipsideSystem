<?php
  /**
    * Generates section of supporting content
    *
    * @param    string    $category              post category
    * @param    int       $posts                 number of posts
    * @param    string    $align                 flex-direction(row/col)
    * @param    string    $order                 flex-direction
    * @param    string    $heading               section heading
    * @param    bool      $headingdisplay        display or hide heading
    * @param    string    $id                    section id
    * 
    * @return   string    $output               html
    */
  function insert_supporting_article( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Usage Info',
      'posts' => 1,
      'align' => 'row',
      'order' => null,
      'id' => null
    ), $atts));

    // Create WP-query arguments
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $category,
        'posts_per_page' => $posts
    );

    // Get posts and create articles - optional order and div id
    $arr_posts = new WP_Query( $args );
    if ($arr_posts->have_posts()) :
        while ($arr_posts->have_posts()) :
            $arr_posts->the_post();
            ob_start();
            the_content();
            
            $output = '
            <div class="supporting-article--'. $align;
              $order ? $output .= ' '. $order.'"' : $output .= '"';
              $id ? $output .= 'id="'. $id .'"' : null;
              
              $output .= '>
              <figure class="article__figure">' . 
                get_the_post_thumbnail(null, 'media-medium') . 
              '</figure>
              <div class="article__spacer"></div>
              <div class="article__text">' .
                ob_get_clean() . 
              '</div>
            </div>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    return $output;
  }

  add_shortcode('supporting-article', 'insert_supporting_article');
?>