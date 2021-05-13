<?php
  /*
    * Generates section with "our team"
    *
    * @category   post category to be used in articles
    * @heading    section heading
    * @posts      number of articles to render
    *
  */
  function insert_team( $atts = array()) {
    extract(shortcode_atts(array(
      'category' => 'Our Team',
      'heading' => 'Our Team',
      'posts' => 4,
    ), $atts));

    // Open section and container tags
    $output = '
    <section class="team" id="team">
      <div class="container">
        <h2 class="--center-align">'.$heading.'</h2>
        <div class="team">
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
            <div class="team__item">
              <figure class="team__figure">' .
                get_the_post_thumbnail() .
              '</figure>
              <div class="team__info">' .
                ob_get_clean() . 
              '</div>
            </div>';
            
        endwhile;
        wp_reset_postdata();
    endif;

    // Close section and container tags
    $output .= '
        </div>
      </div>
    </section>';

    return $output;
  }

  add_shortcode('team', 'insert_team');
?>