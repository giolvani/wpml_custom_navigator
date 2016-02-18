<?php
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }
    else {
        $title = __( '', WPML_CUSTOM_NAV_ID );
    }

    if ( isset( $instance[ 'tpl_structure' ] ) ) {
        $tpl_structure = $instance[ 'tpl_structure' ];
    }
    else {
        $tpl_structure = __( '', WPML_CUSTOM_NAV_ID );
    }
?>
<p>
    <label for="{{ $_this->get_field_id( 'title' ) }}">{{ _e( 'Title' ) }}</label>
    <input class="widefat" id="{{ $_this->get_field_id( 'title' ) }}" name="{{ $_this->get_field_name( 'title' ) }}" type="text" value="{{ esc_attr( $title ) }}" />
</p>
<p>
    <label for="{{ $_this->get_field_id( 'tpl_structure' ) }}">{{ _e( 'Template' ) }}</label>
    <textarea class="widefat" id="{{ $_this->get_field_id( 'tpl_structure' ) }}" name="{{ $_this->get_field_name( 'tpl_structure' ) }}">{{ esc_attr( $tpl_structure ) }}</textarea>
</p>