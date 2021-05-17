<?php
  /*
    * Generates big blue text, e.g used for emphasizing message/sales pitch
    *
    * @param    string    $text        text to style
    *
    * @return   string    html p-element
  */
  
  function insert_big_blue( $atts = array()) {
    extract(shortcode_atts(array(
      'text' => null,
    ), $atts));

    return '<p class="--big-blue">' . $text . '</p>';
  }

  add_shortcode('big-blue', 'insert_big_blue');
?>