<?php
  /*
    * Generates sup-heading text in gray text
    *
    * @text       Text
    * @returns    <span class="sup-h"> $text </span>
    *
  */
  function insert_sup_h( $atts = array()) {
    extract(shortcode_atts(array(
      'text' => null,
    ), $atts));

    return '<span class="sup-h">' . $text . '</span>';
  }

  add_shortcode('sup-h', 'insert_sup_h');
?>