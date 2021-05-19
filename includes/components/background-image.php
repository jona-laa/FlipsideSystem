<?php
  /**
    * Can be used to change background image color(red/blue/green)
    *
    * @param    string    $color        background image color(red/blue/green)
    *
    * @return   string    html style-element
    */
  
  function insert_background_image( $atts = array()) {
    extract(shortcode_atts(array(
      'color' => null,
    ), $atts));
    
    return '<style>
      body {
        background-image: url("'.get_bloginfo('template_url').'/images/header_bg--'.$color.'.svg")
      }
    </style>';
  }

  add_shortcode('background-image', 'insert_background_image');
?>