<?php
  /*
    * Generates big blue text, e.g used for emphasizing message
    *
    * @text       text to style
    * @returns    <p class="--big-blue"> your text here </p>
    *
  */
  
  function insert_big_blue( $atts = array()) {
    extract(shortcode_atts(array(
      'text' => null,
    ), $atts));

    return '<p class="--big-blue">' . $text . '</p>';
  }

  add_shortcode('big-blue', 'insert_big_blue');
?>