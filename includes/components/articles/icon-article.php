<?php
  /*
    * Generates section with articles containing an icon as image 200x200
    *
    * @param    string    $category          post category
    * @param    int       $posts             number of posts
    * @param    string    $order             flex-order(e.g --reverse)
    * @param    string    $heading           section heading
    * @param    string    $subheading        display or hide heading
    * @param    string    $id                section id
    * 
    * @return   string    $output            html
    *
  */
  function insert_icon_article( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Products',
      'posts' => null,
      'order' => null,
      'heading' => null,
      'subheading' => null,
      'id' => null
    ), $atts));

    
    // Open section - optional section id
    $output = '
    <section';
      $id ? $output .= ' id="'. $id .'">' : $output .= '>';
    
    // Open container - optional heading and sub-heading
    $output .= '
      <div class="container">';
        $heading ? $output .=  '<h2 class="--center-align">'.$heading.'</h2>' : null;
        $subheading ? $output .= '<span class="sub-h --center-align">'.$subheading.'</span>' : null;
      
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
            <article class="icon-article';
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

    // Close section and container tags
    $output .= '
      </div>
    </section>';

    return $output;
  }

  add_shortcode('icon-article', 'insert_icon_article');
?>