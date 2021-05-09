<?php
  /*
    * Generates pricing card bottom div
    *
    * @content    div content
    * @returns    <div class="pricing__card-bottom"> $content </div>
    *
  */
  
  function insert_pricing_bottom( $atts, $content = null) {
    return '<div class="pricing__card-bottom">' .
              do_shortcode($content) .
            '</div>';
  }

  add_shortcode('pricing-bottom', 'insert_pricing_bottom');
?>