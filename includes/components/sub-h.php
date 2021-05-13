<?php
  /*
    * Generates sub-heading text in gray text
    *
    * @text       Text
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