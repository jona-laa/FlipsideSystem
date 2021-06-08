<?php
  /**
    * Generates team member for section "our team"
    *
    * @param    string    $name         team member name
    * @param    string    $title        team member title
    *
    * @return   html      html p-elements
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