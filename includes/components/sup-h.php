<?php
  /*
    * Generates smaller text above heading in gray
    *
    * @text       Text
    *
    * @return   html      html p-element
  */
  function insert_sup_h( $atts = array()) {
    extract(shortcode_atts(array(
      'text' => null,
    ), $atts));

    return '<span class="sup-h">' . $text . '</span>';
  }

  add_shortcode('sup-h', 'insert_sup_h');
?>