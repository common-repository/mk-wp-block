<?php

/**
 * Function MK WordPress ShortCode.
 */

if ( ! function_exists( 'mkwordpress_MK_Block_shortcode' ) ) :

    function mkwordpress_MK_Block_shortcode($atts){
        ob_start();
        extract(shortcode_atts(array(
          'class' => '',
          'slug' => '',
        ), $atts));
        
        global $post;
        $MKBlockslug = $slug;
        
        $mkwordpress_block_args = array( 'post_type' => 'mkwordpress-block', 'posts_per_page' => -1 );
        $MKBlock = new WP_Query( $mkwordpress_block_args );
        
        while ( $MKBlock->have_posts() ) : $MKBlock->the_post(); 
            
            if ( $MKBlockslug == $post->post_name ) :
                echo '<div class="mkwordpress-block-container" id="mkwordpress-block-container">';
                    echo '<div class="mkwordpress-block slug-'. $post->post_name .' '. $class .'" id="mkwordpress-block-id-'. $post->ID .'">';
                        the_content();
                    echo '</div>';
                echo '</div>';
            endif;
            
        endwhile;
        
        wp_reset_postdata();
        return ob_get_clean();
    }
    add_shortcode( 'mkblock', 'mkwordpress_MK_Block_shortcode' );

endif;
?>
