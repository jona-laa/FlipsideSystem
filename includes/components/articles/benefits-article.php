<?php
include(get_theme_root() . '/Flipside/includes/components/articles/benefits-items.php');

/**
  * Generates section of benefits-articles. 
  *
  * @param    string    $category              post category
  * @param    int       $posts                 number of posts
  * @param    string    $order                 flex-order(e.g --reverse)
  * @param    string    $background            background color
  * @param    string    $heading               section heading
  * @param    bool      $headingdisplay        display or hide heading
  * @param    string    $id                    section id
  * 
  * @return   string    $output                html
  */
function insert_benefits_article( $atts = array()) {
  extract(shortcode_atts(array(
    'category' => 'Benefits',
    'posts' => 1,
    'order' => null,
    'background' => '#eb623f1a',
    'heading' => null,
    'headingdisplay' => false,
    'id' => null
  ), $atts));

  // Hide or display section heading
  !$headingdisplay ? $headingdisplay = 'none' : $headingdisplay = 'block';

  // Open section - optional id is inserted
  $output = '
  <section
    style="background: ' .$background. '" ';
    $id ? $output .= 'id="'. $id .'">' : $output .= '>';
    
  // Open container - optional id is inserted  
  $output .= '
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
          <article class="benefits-article';
            $order ? $output .= ' ' .$order . '">' : $output .= '">';
            $output .= '<div class="article__text">' .
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