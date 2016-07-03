<?php 
// Do not load directly...
if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/*******************************************
# Breadcrumbs on hook system with rich snipped
*******************************************/
if ( !function_exists('imasta_crumbs') ) {
function imasta_crumbs() {
	global $post;
	
		//return;

		if ( ot_get_option('imasta_breadcrumbs') == 'yes' ) :
		echo "<span>You are here:</span>";
		echo '<a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo "</a>";
        if (is_category()) {
			global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            
				echo ' / <a href="';
                echo get_category_link( $parentCat->term_id );
                echo '">';
				echo single_cat_title( '', false );
				echo "</a>";

        } elseif (is_post_type_archive()) {
			echo post_type_archive_title();
        }  elseif (is_single()) {
		$category = get_the_category();
		foreach($category as $category) {
		echo ' / <a href="';
			echo get_category_link($category->term_id);
		echo '">' . $category->name . '</a>';
			}
                echo " / " . get_the_title() ;
		} elseif (is_page()) {
                echo " / " . get_the_title() ;
        }
		elseif (is_tag()) {
				echo " / ";
				echo single_tag_title();
		}
		elseif (is_day()) {echo " / Archive for " . get_the_time('F jS, Y') ;}
		elseif (is_month()) {echo " / Archive for " . get_the_time('F, Y') ;}
		elseif (is_year()) {echo " / Archive for " . get_the_time('Y') ;}
		elseif (is_author()) {echo " / Author Archive" ;}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo " / Blog Archives";}
		elseif (is_search()) {echo " / Search Results";}
		elseif (is_404()) {echo " / Page not found";}
		endif;
		
	}
}
 ?>