<?php 
// Creating the widget 
class imasta_banner extends WP_Widget {

	function __construct() {
		parent::__construct(
// Base ID of your widget
			'imasta_banner', 

// Widget name will appear in UI
			'Imasta Banner', 

// Widget description
			array( 'description' => 'Your Code Banner Here') 
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
			<h4 class="widgettitle"><?php echo $instance['title']; ?></h4>
			<?php echo $instance['banner']; ?>
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
			$title = 'Banner';
		}

		if ( isset( $instance[ 'banner' ] ) ) {
			$banner = $instance[ 'banner' ];
		}
		else {
			$banner = '<a href="#" title="example banner link"><img class="responsive-img hover-img" src="http://s27.postimg.org/4qpr6f0z7/436.png" alt="example banner" title="banner" width="336" height="280"/></a>';
		}
// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			<label for="<?php echo $this->get_field_id( 'banner' ); ?>"><?php echo 'Banner Code:'; ?></label> 
			<textarea class="widefat" rows="5" cols="20" name="<?php echo $this->get_field_name( 'banner' ); ?>"><?php echo $banner; ?></textarea>
		</p>
		<?php 
	}
	 
// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['banner'] = ( ! empty( $new_instance['banner'] ) ) ? stripslashes( $new_instance['banner'] ) : '';
		return $instance;
	}
} // Class imasta_banner ends here

// Register and load the widget
function load_banner() {
	register_widget( 'imasta_banner' );
}

add_action( 'widgets_init', 'load_banner' );
?>