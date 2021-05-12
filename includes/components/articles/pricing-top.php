<?php
  /*
    * Generates pricing card top div
    *
    * @title      card title
    * @ price     card price
    * @returns    <div class="pricing__card-top"> $content </div>
    *
  */
  
  function insert_pricing_top( $atts, $content = null) {
    extract(shortcode_atts(array(
      'title' => 'Title Here',
      'price' => '0'
    ), $atts));

    return '<div class="pricing__card-top">
              <h2 class="pricing__card-heading">' . $title . '</h2>
              <div class="pricing__card-price">' .
                $price . '<span class="gray small">/Month</span>
              </div>
            </div>';
  }

  add_shortcode('pricing-top', 'insert_pricing_top');
?>