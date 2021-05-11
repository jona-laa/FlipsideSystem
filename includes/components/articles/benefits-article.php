<?php
include('./wp-content/themes/Flipside/includes/components/articles/benefits-items.php');

/*
  * Generates section of benefits-articles. 
  *
  * @category         post category to be used in articles
  * @posts            number of articles to render
  * @order            flex-direction of text/icons
  * @background       background color (pink, blue-figure)
  * @heading          section heading
  * @headingdisplay   display or hide heading
  * @id               section id
  *
*/
function insert_benefits_article( $atts = array()) {
  extract(shortcode_atts(array(
    'category' => 'Benefits',
    'posts' => 1,
    'order' => null,
    'background' => 'white',
    'heading' => null,
    'headingdisplay' => false,
    'id' => null
  ), $atts));

  // Hide or display section heading
  if (!$headingdisplay) {
    $headingdisplay = 'none';
  } else {
    $headingdisplay = 'block';
  }

  // Open section and container tags
  $output = '
  <section 
    class="--bg-' . $background . '"';
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
          <article class="benefits-article ' . $order . '">
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