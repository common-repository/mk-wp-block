<?php

function mkwordpress_register_widgets() {
	register_widget( 'MKWordPress_Block_Widget');
}
add_action( 'widgets_init', 'mkwordpress_register_widgets' );

class MKWordPress_Block_Widget extends WP_Widget {
	
    function MKWordPress_Block_Widget() {
		
		parent::__construct(
	            'mkwordpress_block_widget',
        	    __('MK Block Widget', 'mkwordpress'),
 	           array( 'description' => __( 'Please add you MK Block Slug', 'mkwordpress' ), )
		);
	}

	function widget( $args, $instance ) {
	    
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        
		echo $args['before_widget'];
        
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];


		echo do_shortcode( '[mkblock slug="' . $instance['mkblockslug'] . '" class="' . $instance['mkblockslug'] . '"]' );
		echo $args['after_widget'];
	}

	function update($new_instance, $old_instance) {
		
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
		$instance['mkblockslug'] = strip_tags($new_instance['mkblockslug']);
		return $instance;
	}

	function form($instance) {
	   
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $instance = wp_parse_args( (array) $instance, array( 'mkblockslug' => '' ) );
        $title = $instance['title'];
        $mkblockslug = $instance['mkblockslug'];
		
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'mkwordpress'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('mkblockslug'); ?>"><?php _e('Block Slug', 'mkwordpress'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('mkblockslug'); ?>" name="<?php echo $this->get_field_name('mkblockslug'); ?>" type="text" value="<?php echo $mkblockslug; ?>" />
		</p>
		 
		
		
	<?php }
}

?>