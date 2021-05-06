<?php
  /*
    * Generates carousel with testimonials
    *
    * @category   post category to be used in articles
    * @posts      number of articles to render
    * @heading    section heading
    * @subheading section sub-heading
    *
  */
  function insert_products( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Products',
      'posts' => 3,
      'heading' => 'heading="your heading here"',
      'subheading' => 'sub-heading="your sub-heading here"'
    ), $atts));

    // Open section and container tags
    $output = '
    <section class="products">
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
              <article class="product-article">
                <figure class="article__figure">' .
                  get_the_post_thumbnail(null, 'media-medium') .
                '</figure>
                <div class="article__spacer"></div>
                <div class="article__text">' . 
                  ob_get_clean() .
                '</div>
              </article>
              <div class="testimonial">
                <div class="testimonial__bubble">
                  <p class="testimonial__text">“Lower support. 30-40% lower support! Lower support. 30-40% lower
                    support!”</p>
                </div>
                <div class="testimonial__info">
                  <img class="testimonial__avatar" src="../images/icons/Avatars/man (2).svg" alt="avatar">
                  <div class="testimonial__identity">
                    <p class="testimonial__name">Large eCommerce vendor</p>
                    <p class="testimonial__title">PIM Responsible, X</p>
                  </div>
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
        <div class="single-btn">
          <a href="" class="single-btn__btn">Book your demo now!</a>
        </div>
      </div>
    </section>';

    return $output;
  }

  add_shortcode('products', 'insert_products');
?>