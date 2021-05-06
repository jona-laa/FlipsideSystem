<?php
  /*
    * Generates sup-heading text in gray text
    *
    * @text       Text
    * @returns    <span class="sup-h"> $text </span>
    *
  */
  function insert_team_member( $atts = array()) {
    extract(shortcode_atts(array(
      'name' => null,
      'title' => null
    ), $atts));

    return  '<p class="team__name">'.$name.'</p>
             <p class="team__title">'.$title.'</p>';
  }

  add_shortcode('team-member', 'insert_team_member');
?>