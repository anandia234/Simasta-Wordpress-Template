<?php 
// Creating the widget 
class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
// Base ID of your widget
			'wpb_widget', 

// Widget name will appear in UI
			'Imasta Recent Post', 

// Widget description
			array( 'description' => 'Simple Recent Post by Imasta', ) 
			);
	}

// Creating widget front-end
// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			/*echo $args['before_title'] . $title . $args['after_title'];*/
		?>
		<section class="widget">
			<h4 class="widgettitle"><?php echo "$title"; ?></h4>
			<?php 
			query_posts(array('cat' => 3, 'posts_per_page' => 3) );
			$args = array('cat' => 3, 'posts_per_page' => 1);
			$the_query = new WP_Query($args);
			$do_not_duplicate = array();

			if ($the_query->have_posts()) {
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$excerpt = get_the_excerpt( );
					$do_not_duplicate[] = $post->ID;?>
					<a href="#" class="entry-categories"><?php single_cat_title(); ?></a>
					<div class="entry-item">
						<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h5>
						<a href="#" class="entry-thumb kopa-border-1"><?php imasta_featured_img(); ?></a>
						<p><?php $article = substr($excerpt, 0, 300); $short = substr($article, 0, strrpos($article, " ")); echo $short."..."; ?></p>
					</div><!--entry-item-->
					<?PHP
				}
			}
			?>

			<ul class="other-categories clearfix">
				<?php 
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						if (in_array($post->ID, $do_not_duplicate)) {
							continue;
						}
						update_post_caches($posts);?>
						<li class="clearfix">
							<a href="#" class="entry-categories"><?php single_cat_title() ?></a>
							<span class="entry-date"><?php the_time('M d, Y' ); ?></span>
							<a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a>
						</li>
						<?php
					}
				}
				?>

			</ul><!--other-categories-->
		</section><!--widget-->
		
		<?php
			echo $args['after_widget'];
		}
	
// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = 'Recent Post';
		}
// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	
// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}

add_action( 'widgets_init', 'wpb_load_widget' );
?>