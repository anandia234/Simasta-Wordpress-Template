<?php 
if( ! defined('ABSPATH')) { die('Direct access forbidden.');}

/**
* LOAD ALL FUNCTION IN KEREN FRAMEWORK
*/
class KEREN
{
	public static function init(){
		self::keren_definitions();
		self::keren_functions();
	}

	public static function keren_definitions(){
		define('keren_inc', get_template_directory() . '/includes/' );
	}

	public static function keren_functions(){
		require_once (keren_inc . 'functions/_navigation_keren.php');
		require_once (keren_inc . 'functions/_agc.php');
		require_once (keren_inc . 'functions/_comments.php');
		require_once (keren_inc . 'functions/_related.php');
		require_once (keren_inc . 'functions/_breadcumbs.php');
		require_once (keren_inc . 'functions/_thumbnail.php');
		/*require_once (keren_inc . 'widget/widget.php');*/
		add_action('do_keren_navigation', 'keren_navigation' );
	}


}

 ?>