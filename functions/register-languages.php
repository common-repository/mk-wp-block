<?php

/**
 * Function MK WordPress ShortCode.
 */

if ( ! function_exists( 'mkwordpress_load_textdomain' ) ) :
 
    function mkwordpress_load_textdomain() {
      load_plugin_textdomain( 'mkwordpress', false, MKWORDPRESS_DIR . 'languages' ); 
    }
    add_action( 'init', 'mkwordpress_load_textdomain' );
    
endif;
?>