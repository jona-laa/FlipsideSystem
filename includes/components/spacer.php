<?php
  /*
    * Generates space between elements
    *
    * @gap        Gap in pixels
    *
  */
  function insert_vertical_spacer( $atts = array()) {
    extract(shortcode_atts(array(
      'gap' => 20,
    ), $atts));

    return '<div style="height:'.$gap.'px"></div>';
  }

  add_shortcode('vertical-spacer', 'insert_vertical_spacer');
?>