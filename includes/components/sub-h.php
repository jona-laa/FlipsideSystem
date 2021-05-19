<?php
  /**
    * Generates smaller text below heading in gray
    *
    * @param    string    $text        text
    *
    * @return   html      html p-element
    */
  function insert_sub_h( $atts = array()) {
    extract(shortcode_atts(array(
      'text' => null,
    ), $atts));

    return '<p class="sub-h">' . $text . '</p>';
  }

  add_shortcode('sub-h', 'insert_sub_h');
?>