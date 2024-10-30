<?php

new Shortcode_Tinymce();

class Shortcode_Tinymce{
    
    public function __construct(){
        add_action('admin_init', array($this, 'mkwordpress_shortcode_button'));
        add_action('admin_footer', array($this, 'mkwordpress_get_shortcodes'));
    }

    public function mkwordpress_shortcode_button(){
        
        if( current_user_can('edit_posts') &&  current_user_can('edit_pages') ){
            add_filter( 'mce_external_plugins', array($this, 'mkwordpress_add_buttons' ));
            add_filter( 'mce_buttons', array($this, 'mkwordpress_register_buttons' ));
        }
    }

    public function mkwordpress_add_buttons( $plugin_array ){
        
        $plugin_array['mkwordpress_block'] = MKWORDPRESS_ASSETS . 'js/mkwordpress-script.js';
        return $plugin_array;
    }

    public function mkwordpress_register_buttons( $buttons ){
        
        array_push( $buttons, 'separator', 'mkwordpress_block' );
        return $buttons;
    }

    public function mkwordpress_get_shortcodes(){
        
        global $post;
        
        $mkwordpress_block_args = array( 'post_type' => 'mkwordpress-block', 'posts_per_page' => -1 );
        $MKBlock = new WP_Query( $mkwordpress_block_args );
        $MKBlockID = array();
        while ( $MKBlock->have_posts() ) : $MKBlock->the_post(); 
            $MKBlockID[] = $post->post_name;
        endwhile;
        
        echo '<script type="text/javascript">
        var shortcodes_button = new Array();';

        $count = 0;

        foreach($MKBlockID as $tag ){
            echo "shortcodes_button[{$count}] = '{$tag}';";
            $count++;
        }

        echo '</script>';
        wp_reset_postdata();
    }
}

?>