<?php

use Philo\Blade\Blade;

class WPML_Custom_Navigator extends WP_Widget 
{
	private $blade;

	function __construct() 
	{
		parent::__construct(
			'WPML_Custom_Navigator', 
			__('WPML Language Selector', WPML_CUSTOM_NAV_ID), 
			array( 'description' => __( 'Widget to show customized WPML selector', WPML_CUSTOM_NAV_ID ) ) 
		);

		$views = WPML_CUSTOM_NAV_PLUGIN_PATH . '/views';
		$cache = WPML_CUSTOM_NAV_PLUGIN_PATH . '/cache';
		$this->blade = new Blade($views, $cache);
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

		$languages = icl_get_languages('skip_missing=1');
		$activeLang = null;
		foreach ($languages as $lang){
			if ($lang['active'] == true) {
				$activeLang = $lang;
				break;
			}
		}
		$content = $this->blade->view()->make('tpl_structure', ['languages' => $languages, 'active' => $activeLang]);

		echo __( $content, WPML_CUSTOM_NAV_ID );
		echo $args['after_widget'];
	}
			
	// backend
	public function form( $instance ) 
	{
		echo $this->blade->view()->make('backend', ['_this' => $this, 'instance' => $instance]);
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['tpl_structure'] = ( ! empty( $new_instance['tpl_structure'] ) ) ? htmlentities( $new_instance['tpl_structure'] ) : '';

		touch(WPML_CUSTOM_NAV_PLUGIN_PATH . '/views/tpl_structure.blade.php');
		file_put_contents(WPML_CUSTOM_NAV_PLUGIN_PATH . '/views/tpl_structure.blade.php', ($new_instance['tpl_structure']));

		return $instance;
	}
} 