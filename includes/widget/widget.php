<?php
// Do not load directly...
if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/*
* Register and includes files widget
*/
function imasta_widget_init() {
	/*
	* Includes Files for widget
	*/


	include_once(keren_inc . '/includes/widget/imasta_latest_article.php');

}