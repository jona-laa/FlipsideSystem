<?php
  /*
    * Generates font-awesome icon
    *
    * @name       Font-Aweseome icon name, e.g fab fa-php
    * @size       CSS supported font size value
    * @color      CSS supported color value, e.g rgb, hex, hsl, or color name.
    * @link       If icon should be link, e.g social media icon
    * @arialabel  Aria-label
    *
    * @returns    <i class="@name" style="font-size: @size; color: @color"></i>
    *
  */
  function insert_fa_icon( $atts = array()) {
    extract(shortcode_atts(array(
      'name' => 'fas fa-check',
      'size' => '2rem',
      'color' => '#252525',
      'link' => null,
      'arialabel' => null
    ), $atts));

    if ($link) {
      $output .= '<a href="'.$link.'">';
    }

    $output .= '
      <i class="'. $name . '" 
        style="font-size:' . $size . '; 
        color:' . $color . ';"';

    if ($arialabel) {
      $output .= 'aria-label="' . $arialabel . '"';
    }
        
    $output .= '></i>';

    if ($link) {
      $output .= '</a>';
    }

    return $output;
  }

  add_shortcode('icon', 'insert_fa_icon');
?>