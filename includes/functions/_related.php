<?php

// Do not load directly...
if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/*
* Add related post in single page
* add_action( 'do_imasta_singlecontent', 'imasta_relpost' ); in init.php
*/
if ( !function_exists('imasta_relpost') ) {
	function imasta_relpost() {
		if ( ot_get_option('related_post') == 'yes' ) :
			global $post;
		$orig_post = $post;
		if (ot_get_option('imasta_taxonomy_relpost') == 'tags')
		{
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> 4,
					'ignore_sticky_posts'=>1
					);
			}
		} 
		else
		{
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> 4,
					'ignore_sticky_posts'=>1
					);
			} 
		} 
		if (!isset($args)) $args = '';
		$imasta_query = new WP_Query($args);
		if( $imasta_query->have_posts() ) {?> 
		<section class="related-widget">
			<h3><span>Related post</span></h3>
			<ul class="clearfix">
			<?php while($imasta_query->have_posts()) : $imasta_query->the_post(); 
			global $post;
			?>
				<li>
					<article class="clearfix">
						<a class="entry-thumb kopa-border-1" href="#">
							<?php 
							if (has_post_thumbnail( )) {
							    the_post_thumbnail(array(50,50));
							}else{
							    ?>
							    <img width="50" height="50" src="<?php bloginfo('template_url');?>/placeholders/329x194/329x194-1.jpg" class="responsive-img hover-img" alt="" /></a>
							    <?php
							}
							?>
						</a>
						<div class="entry-content">
							<a href="<?php echo the_permalink(); ?>"><?php echo the_title( ); ?></a>
							<span class="entry-date"><?php echo the_time('M Y, d' );; ?></span>
							<span class="entry-meta">&nbsp;&nbsp;-&nbsp;&nbsp;</span>
							<!-- <a class="entry-comments" href="#">16 comments</a> -->
							<div class="entry-comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?></div>
						</div><!--entry-content-->
					</article>
				</li>
			<?php endwhile; ?>
			</ul>
		</section><!--related-widget-->
		<?php
	} // if have posts
	$post = $orig_post; 
	wp_reset_query();
	endif;
}
}