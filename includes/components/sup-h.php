<?php
  /*
    * Generates sup-heading text in gray text
    *
    * @name       Font-Aweseome icon name, e.g fab fa-php
    * @size       CSS supported font size value
    * @color      CSS supported color value, e.g rgb, hex, hsl, or color name.
    * @returns    <i class="@name" style="font-size: @size; color: @color"></i>
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