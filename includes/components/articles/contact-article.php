<?php
  /*
    * Generates section with a contact form article
    *
    * @category   post category to be used in articles
    * @posts      number of articles to render
    *
  */
  function insert_contact_article( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Contact Us',
      'posts' => 1,
      'order' => null,
      'form' => null,
      'formid' => null
    ), $atts));

    // Open section and container tags
    $output = '
    <section class="contact" id="contact">
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
            <div class="contact-article">
              <div class="article__text">' .
                ob_get_clean() . 
              '</div>
              <div class="article__spacer"></div>' .
              do_shortcode('[contact-form-7 id="'.$formid.'" title="'.$form.'"]' ) .
            '</div>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
      </div> <!-- End container -->
    </section>';

    return $output;
  }

  add_shortcode('contact-article', 'insert_contact_article');
?>