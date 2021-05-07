<?php
  /*
    * Generates stars section
    *
    * @text         Text to insert
    * @returns      <div class=stars">...</div>
    *
  */
  function insert_stars( $atts = array()) {
    extract(shortcode_atts(array(
      'text' => null
    ), $atts));

    return '<div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <span class="testimonial__name">'. $text .'</span>
      </div>';
  }

  add_shortcode('stars', 'insert_stars');
?>