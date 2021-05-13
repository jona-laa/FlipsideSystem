<?php
  /*
    * Generates read more
    *
    * @link       link to id
    *
  */
  function insert_read_more( $atts = array()) {
    extract(shortcode_atts(array(
      'link' => null
    ), $atts));

    return '
    <div class="read-more">
    <a href="'.$link.'" class="arrow-link" aria-label="Scroll to About Section">
    <span>Read More</span>
        <i class="fas fa-chevron-down fa-3x"></i>
      </a>
    </div>';
  }

  add_shortcode('read-more', 'insert_read_more');
?>