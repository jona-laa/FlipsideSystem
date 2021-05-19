<?php
  /**
    * Generates section with FAQs
    *
    * @param    string    $category        post category
    * @param    int       $posts           number of posts
    * @param    string    $heading         section heading
    *
    * @return  string     $output          html  
    */
  function insert_faq( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'FAQs',
      'posts' => null,
      'heading' => 'Frequently Asked Questions'
    ), $atts));

    // Open section and container tags
    $output = '
    <section class="faq" id="faq">
      <h2 class="section-heading">'.$heading.'</h2>
      <div class="container">
        <ul class="faq__accordion" id="accordion">
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
            <li class="faq__article">
              <button aria-controls="content-'.get_the_ID().'" aria-expanded="false" id="accordion-control-'.get_the_ID().'"
              class="faq__article-heading faq__article-expand">'.get_the_title().'</button>
              <div class="faq__article-content" aria-hidden="true" id="content-'.get_the_ID().'">'.get_the_content().'
              </div>
            </li>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
        </ul>
      </div>
    </section>';

    return $output;
  }

  add_shortcode('faq', 'insert_faq');
?>