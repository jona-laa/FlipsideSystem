<?php
  /*
    * Generates read more
    *
    * @link       link to id
    * @returns    <i class="@name" style="font-size: @size; color: @color"></i>
    *
  */
  function insert_read_more( $atts = array()) {
    extract(shortcode_atts(array(
      'link' => null
    ), $atts));

    return '
    <div class="read-more">
      <span>Read More</span>
      <a href="'.$link.'" class="arrow-link" aria-label="Scroll to About Section">
        <i class="fas fa-chevron-down fa-3x"></i>
      </a>
    </div>';
  }

  add_shortcode('read-more', 'insert_read_more');
?>