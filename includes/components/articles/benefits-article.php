<?php
include('./wp-content/themes/Flipside/includes/components/articles/benefits-items.php');

/*
  * Generates section of benefits-articles. 
  *
  * @category     post category to be used in articles
  * @posts        number of articles to render
  * @direction    order of image and content. default(null) or reverse
  * @background   background color (pink, blue-figure)
  *
*/
function insert_benefits_article( $atts = array()) {
  extract(shortcode_atts(array(
    'category' => 'Benefits',
    'posts' => 1,
    'order' => null,
    'background' => 'white'
  ), $atts));

  // Open section and container tags
  $output = '
  <section class="--bg-' . $background . '">
    <div class="container">
    ';

  // Create WP-query arguments
  $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'category_name' => $category,
      'posts_per_page' => $posts,
  );

  // Get posts and create articles
  $arr_posts = new WP_Query( $args );
  if ($arr_posts->have_posts()) :
      while ($arr_posts->have_posts()) :
          $arr_posts->the_post();
          ob_start();
          the_content();

          $output .= '
          <article class="pitch-article ' . $order . '">
            <div class="article__text">' .
              ob_get_clean() . 
            '</div>
            <div class="article__spacer"></div>' . 
            insert_benefits_items($category) .
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

add_shortcode('benefits-article', 'insert_benefits_article');
?>