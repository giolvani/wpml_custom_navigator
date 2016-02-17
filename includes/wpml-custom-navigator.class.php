<?php

class WPML_Custom_Navigator extends WP_Widget 
{
	function __construct() 
	{
		parent::__construct(
			'WPML_Custom_Navigator', 
			__('WPML Language Selector', WPML_CUSTOM_NAV_ID), 
			array( 'description' => __( 'Widget to show customized WPML selector', WPML_CUSTOM_NAV_ID ) ) 
		);
	}

	//frontend
	public function widget( $args, $instance ) 
	{
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
		{
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo __( 'Hello, World!', WPML_CUSTOM_NAV_ID );
		echo $args['after_widget'];
	}
			
	// backend
	public function form( $instance ) 
	{
		if ( isset( $instance[ 'title' ] ) ) 
		{
			$title = $instance[ 'title' ];
		}
		else 
		{
			//set default value
			//$title = __( '', WPML_CUSTOM_NAV_ID );
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
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} 