<?php
  /**
    * Generates font-awesome icon
    *
    * @param    string    $name               Font-Aweseome icon name, e.g fab fa-php
    * @param    string    $size               CSS supported font-size value
    * @param    string    $color              CSS supported color value, e.g rgb, hex, hsl, or color name.
    * @param    string    $link               Link href, if icon should be link, e.g social media icon
    * @param    string    $arialabel          Aria-label for e.g social media icons without text
    *
    * @return   string    $output             html
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

    $link ? $output .= '<a href="'.$link.'">' : null;

    $output .= '
      <i class="'. $name . '" 
        style="font-size:' . $size . '; 
        color:' . $color . ';"';
        $arialabel ? $output .= ' aria-label="'.$arialabel.'"></i>' : $output .= '></i>';

    $link ? $output .= '</a>' : null;

    return $output;
  }

  add_shortcode('icon', 'insert_fa_icon');
?>