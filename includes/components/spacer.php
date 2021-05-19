<?php
  /**
    * Generates space between elements
    *
    * @param    int/string    gap        gap in pixels
    *
    * @return   html      html div-element
    */
  function insert_vertical_spacer( $atts = array()) {
    extract(shortcode_atts(array(
      'gap' => 20,
    ), $atts));

    return '<div style="height:'.$gap.'px"></div>';
  }

  add_shortcode('vertical-spacer', 'insert_vertical_spacer');
?>