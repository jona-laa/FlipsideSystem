<?php
  /*
    * Generates section with articles containing an icon as image 200x200
    *
    * @category         post category to be used in articles
    * @posts            number of articles to render
    * @order            flex-direction of text/icons
    * @heading          section heading
    * @subheading       section sub-heading
    * @id               section id
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

    
    // Open section and container tags
    $output = '
    <section ';
    
    if($id) {
      $output .= 'id="'. $id .'"';
    }
    
    $output .= '>
      <div class="container">
        <h2 class="--center-align">'.$heading.'</h2>';

    if($subheading) { 
        $output .= '<span class="sub-h --center-align">'.$subheading.'</span>';
    };    
        

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
            <article class="icon-article '. $order .'">
              <figure class="article__figure">' .
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