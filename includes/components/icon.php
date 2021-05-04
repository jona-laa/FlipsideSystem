<?php
  /*
    * Generates font-awesome icon
    *
    * @name       Font-Aweseome icon name, e.g fab fa-php
    * @size       CSS supported font size value
    * @color      CSS supported color value, e.g rgb, hex, hsl, or color name.
    * @returns    <i class="@name" style="font-size: @size; color: @color"></i>
    *
  */
  function insert_fa_icon( $atts = array()) {
    extract(shortcode_atts(array(
      'name' => 'fas fa-check',
      'size' => '2rem',
      'color' => '#252525'
    ), $atts));

    return '<i class="'. $name . '" style="font-size:' . $size . '; color:' . $color . '"></i>';
  }

  add_shortcode('icon', 'insert_fa_icon');
?>