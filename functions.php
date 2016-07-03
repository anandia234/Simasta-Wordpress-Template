<?php 
if ( ! defined('ABSPATH')) { die('Direct access forbidden') ;}

//Initialize the update checker.
require 'theme-updates/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'imasta',
    'http://homecooldesign.net/info.json'
);

//print_r($example_update_checker);

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );
include 'includes/widget/imasta_latest_article.php';
include 'includes/widget/imasta_banner.php';

/**
 * Theme Options
 */
require( trailingslashit( get_template_directory() ) . 'includes/theme-options.php' );

function your_filter_typography_fields( $array, $field_id ) {

	/* only run the filter where the field ID is 'main_font'  */
	if ( $field_id == 'imasta_fontgeneral' ) {
		$array = array( 'font-color', 'font-family', 'font-size', 'font-style');
	}elseif ($field_id == 'imasta_fontheader') {
		$array = array( 'font-color', 'font-family', 'font-style');
	}

	return $array;

}
add_filter('ot_recognized_typography_fields','your_filter_typography_fields', 10, 2);

require_once (TEMPLATEPATH . '/includes/init.php');
$theme_keren_declare = new KEREN();
$theme_keren_declare->init();

//require_once (TEMPLATEPATH .'/functions-vafpress.php');

function register_my_menus()
{
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu'),
			'footer-menu'	=> __('Menu Footer')
			)
		);
}

add_action('init', 'register_my_menus' );

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'	=> 'Sidebar Kanan',
		'id'	=> 'sidebar-kanan',
		'description'	=> 'Bagian area sidebar',
		        'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );

	register_sidebar(array(
		'name' 	=> 'Widget Bawah 1',
		'id'	=> 'Widget-Bawah-1',
		'description'	=> 'Bagian area widget bawah 1',
		        'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );

	register_sidebar(array(
		'name' 	=> 'Widget Bawah 2',
		'id'	=> 'Widget-Bawah-2',
		'description'	=> 'Bagian area widget bawah 2',
		        'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );

	register_sidebar(array(
		'name' 	=> 'Widget Bawah 3',
		'id'	=> 'Widget-Bawah-3',
		'description'	=> 'Bagian area widget bawah 3',
		        'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );

	register_sidebar(array(
		'name' 	=> 'Widget Bawah 4',
		'id'	=> 'Widget-Bawah-4',
		'description'	=> 'Bagian area widget bawah 4',
		        'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );
}

add_theme_support('post-thumbnails' );

add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='kopa-border-1 author-avatar", $class) ;
return $class;
}	

add_filter('the_post_thumbnail','change_the_post_thumbnail');

function change_the_post_thumbnail($class) {
$class = str_replace("class='attachment-post-thumbnail size-post-thumbnail wp-post-image", "class='responsive-img hover-img", $class) ;
return $class;
}	


?>