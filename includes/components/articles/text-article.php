<?php
  /*
    * Generates section of articles with text only
    *
    * @param    string    $category              post category
    * @param    int       $posts                 number of posts
    * @param    string    $background            background color
    * @param    string    $heading               section heading
    * @param    bool      $headingdisplay        display or hide heading
    * @param    string    $id                    section id
    * 
    * @return   string    $output               html
    *
  */
  function insert_text_article( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => null,
      'posts' => 1,
      'background' => 'white',
      'heading' => null,
      'headingdisplay' => false,
      'id' => null
    ), $atts));

    // Hide or display section heading
    !$headingdisplay ? $headingdisplay = 'none' : $headingdisplay = 'block';

    // Open section and container tags
    $output = '
    <section class="--bg-' . $background . '" ';
    
    if($id) {
      $output .= 'id="'. $id .'"';
    }
    
    $output .= '>
      <div class="container">
        <h2 style=" display: '.$headingdisplay.'">'.$heading.'</h2>
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
            <article class="text-article">' .
                ob_get_clean() . 
            '</article>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
      </div> <!-- End container -->
    </section>';

    return $output;
  }

  add_shortcode('text-article', 'insert_text_article');
?>