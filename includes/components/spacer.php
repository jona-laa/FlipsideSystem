<?php
  /*
    * Generates space between elements
    *
    * @gap        Gap in pixels
    * @returns    <div style="padding: $gap"></span>
    *
  */
  function insert_spacer( $atts = array()) {
    extract(shortcode_atts(array(
      'gap' => 20,
    ), $atts));

    return '<div style="height:'.$gap.'px"></div>';
  }

  add_shortcode('spacer', 'insert_spacer');
?>