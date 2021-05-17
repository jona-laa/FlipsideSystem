<?php 
include(get_theme_root() . '/Flipside/includes/component-shortcodes.php');


/* Register menus */
add_action('init', 'register_my_menus');

function register_my_menus() {
    register_nav_menus(array(
        'main-menu' => 'Top menu',
        'footer-menu' => 'Footer menu'
    ));
}



/* Thumbnail Support */
add_theme_support('post-thumbnails');
add_image_size('media-medium', 650);



/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	$content = preg_replace( '(^<p>\s*[^\n]*<\/p>$)', '', $content );
	return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);



// Prevent WP from adding <p> tags on pages
function disable_wp_auto_p( $content ) {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
  return $content;
}
add_filter( 'the_content', 'disable_wp_auto_p', 0 );



/* Custom Logo Support */
add_theme_support( 'custom-logo' );
// 
function themename_custom_logo_setup() {
    $defaults = array(
        'width'                => 300,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}



/* Use theme JS files */
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);



/* Contact Info Hook */
function get_footer_about() {
    do_action('get_footer_about');
}

function include_footer_about() {
	include './wp-content/themes/Flipside/includes/footer-about.php';
}

add_action('get_footer_about', 'include_footer_about', 1);



/* Contact Info Hook */
function get_footer_contact() {
    do_action('get_footer_contact');
}

function include_footer_contact() {
	include './wp-content/themes/Flipside/includes/footer-contact.php';
}

add_action('get_footer_contact', 'include_footer_contact', 1);

?>