<?php
  /**
    * Generates carousel with products
    *
    * @param    string    $category          post category
    * @param    int       $posts             number of posts
    * @param    string    $order             flex-direction
    * @param    string    $heading           section heading
    * @param    string    $subheading        display or hide heading
    * @param    string    $id                section id
    * 
    * @return   string    $output            html
    */
  function insert_products( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Products',
      'posts' => 3,
      'order' => null,
      'heading' => 'heading="your heading here"',
      'subheading' => 'sub-heading="your sub-heading here"',
      'id' => null
    ), $atts));

    // Open section - optional section id
    $output = '
    <section class="products"';
    $id ? $output .= ' id="'. $id .'">' : $output .= '>';
        
    // Open container
    $output .= '
      <div class="container">
        <h2 class="--center-align">' . $heading . '</h2>
        <span class="sub-h --center-align">' . $subheading . '</span>
        <div class="carousel__nav products__nav">
          <!-- Carousel Nav will render here -->
        </div>
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
            ob_start();
            the_content();
            
            $output .= '
            <div class="product-wrapper">
              <article class="product-article';
                $order ? $output .= ' ' .$order . '">' : $output .= '">';
                $output .= '<figure class="article__figure">' .
                  get_the_post_thumbnail(null, 'media-medium') .
                '</figure>
                <div class="article__spacer"></div>
                <div class="article__text">' . 
                  ob_get_clean() .
                '</div>
              </article>
            </div>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
          </div>
        </div>
      </div>
    </section>';

    return $output;
  }

  add_shortcode('products-carousel', 'insert_products');
?>