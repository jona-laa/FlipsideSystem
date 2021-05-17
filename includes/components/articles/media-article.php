<?php
  /*
    * Generates section of articles with video or image and text
    *
    * @param    string    $category              post category
    * @param    int       $posts                 number of posts
    * @param    string    $order                 flex-order(e.g --reverse)
    * @param    string    $background            background color
    * @param    string    $video                 video link
    * @param    string    $heading               section heading
    * @param    bool      $headingdisplay        display or hide heading
    * @param    string    $id                    section id
    *
    * @return   string    $output                html
  */
  function insert_media_article( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Usage Info',
      'posts' => 1,
      'order' => null,
      'background' => 'transparent',
      'video' => null,
      'heading' => null,
      'headingdisplay' => false,
      'id' => null
    ), $atts));

    // Hide or display section heading
    !$headingdisplay ? $headingdisplay = 'none' : $headingdisplay = 'block';

    // Open section - optional section id
    $output = '
    <section 
      style="background: '.$background.'" ';    
      $id ? $output .= 'id="'. $id .'">' : $output .='>';
      
    // Open container
    $output .= '
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
            <article class="media-article';
              $order ? $output .= ' '.$order.'">' : $output .= '">';
              if($video) { 
                $output .= 
                  '<video poster="'. get_the_post_thumbnail_url(get_the_ID(),'media-medium') .'" controls>
                    <source src="'.$video.'" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>';
              } else {
                $output .= 
                  '<figure class="article__figure">' . 
                    get_the_post_thumbnail(null, 'media-medium') . 
                  '</figure>';
              }
              
              $output .= '<div class="article__spacer"></div>
              <div class="article__text">' .
                ob_get_clean() . 
              '</div>
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

  add_shortcode('media-article', 'insert_media_article');
?>