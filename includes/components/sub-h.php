<?php
  /*
    * Generates sub-heading text in gray text
    *
    * @text       Text
    * @returns    <span class="sub-h"> $text </span>
    *
  */
  function insert_sub_h( $atts = array()) {
    extract(shortcode_atts(array(
      'text' => null,
    ), $atts));

    return '<p class="sub-h">' . $text . '</p>';
  }

  add_shortcode('sub-h', 'insert_sub_h');
?>