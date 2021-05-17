<?php
  /*
    * Generates sub-heading text in gray text
    *
    * @param    string    $link        button link
    * @param    string    $text        text
    * @param    string    $top         margin top
    * @param    string    $bottom      margin bottom
    *
    * @return   html      html div-element
  */
  function insert_single_button( $atts = array()) {
    extract(shortcode_atts(array(
      'link' => '#',
      'text' => null,
      'top' => 0,
      'bottom' => 0
    ), $atts));

    return '<div class="single-btn" style="margin-top: '.$top.'px; margin-bottom: '. $bottom .'px">
              <a href="'.$link.'" class="single-btn__btn">'.$text.'</a>
            </div>';
  }

  add_shortcode('single-button', 'insert_single_button');
?>