<?php
  /*
    * Generates pricing card bottom div
    *
    * @param    mixed    $content        shortcode content. 
    *
    * @return  string    $output         html
  */
  
  function insert_pricing_bottom( $atts, $content = null) {
    return '<div class="pricing__card-bottom">' .
              do_shortcode($content) .
            '</div>';
  }

  add_shortcode('pricing-bottom', 'insert_pricing_bottom');
?>