<?php
  /*
    * Generates carousel with testimonials
    *
    * @param    string    $category              post category
    * @param    int       $posts                 number of posts
    * @param    string    $heading               section heading
    * @param    bool      $headingdisplay        display or hide heading
    * @param    string    $id                    section id
    * 
    * @return   string    $output               html
    *
  */
  function insert_carousel( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Testimonials',
      'posts' => 9,
      'heading' => 'heading="your heading here"',
      'subheading' => 'sub-heading="your sub-heading here"',
      'id' => null
    ), $atts));

    // Open section - optional section id
    $output = '
    <section class="testimonials" ';
      $id ? $output .= 'id="'. $id .'">' : $output .= '>';
    
    // Open container
    $output .= '
    <div class="container">
        <h2 class="--center-align">' . $heading . '</h2>
        <span class="sub-h --center-align">' . $subheading . '</span>
        <div class="carousel">
          <div class="carousel__inner">
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
            
            $output .= '
            <div class="testimonial">
              <div class="testimonial__bubble">' .
                   get_the_content() .
              '</div>
              <div class="testimonial__info">' .
                get_the_post_thumbnail(null, 'small') . 
                '<div class="testimonial__identity">
                  <p class="testimonial__name">' . get_the_title() . '</p>
                  <p class="testimonial__title">' . get_the_title(get_post_thumbnail_id()) . '</p>
                </div>
              </div>
            </div>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
            </div>
          </div>
        <div class="carousel__nav">
          <!-- Carousel navigation will render here -->
        </div>
      </div>
    </section>';

    return $output;
  }

  add_shortcode('testimonials', 'insert_carousel');
?>