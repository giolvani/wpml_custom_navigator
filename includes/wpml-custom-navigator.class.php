<?php

use Philo\Blade\Blade;

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
        $blade = new Blade($views, $cache);
        
		/*if ( isset( $instance[ 'title' ] ) ) 
		{
			$title = $instance[ 'title' ];
		}
		else 
		{
			//set default value
			//$title = __( '', WPML_CUSTOM_NAV_ID );
		}*/
		
		echo $blade->view()->make('backend'); 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} 