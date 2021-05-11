<?php
  /*
    * Inserts background styles
    *
    * @text       text to style
    * @returns    <p class="--big-blue"> your text here </p>
    *
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