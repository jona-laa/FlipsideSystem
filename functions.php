<?php 
$themeroot = get_theme_root();
include('./wp-content/themes/Flipside/includes/component-shortcodes.php');



/* Registrera meny */
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
// set_post_thumbnail_size(300);
// add_image_size('media-thumb', 300);
// add_image_size('media-big', 1200);



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



/* Use JS files */
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);



/* Contact Info Hook */
function get_footer_about() {
    do_action('get_footer_about');
}

function include_footer_about() {
	include './wp-content/themes/Flipside/includes/footer-about.php';
}

add_action('get_footer_about', 'include_footer_about', 1);

?>