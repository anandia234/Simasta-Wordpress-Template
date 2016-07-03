<?php 
if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if ( !function_exists('imasta_featured_img') ) :
function imasta_featured_img(  ) { 
	global $post;
	$permalink = get_permalink();
	$title = get_the_title();
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); 

	//$img_default = get_template_directory_uri() . '/includes/assets/img/no-image/image-blank.jpg'; 

	if ( $img_url ) { 
		
		
		echo '<img src="' . $img_url . '" class="responsive-img hover-img"/>';
		
	
	} else { 
		echo '';
	} 
} 
endif;
 ?>