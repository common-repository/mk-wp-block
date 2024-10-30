<?php

/**
 * Function for get MK Block Title.
 */

if ( ! function_exists( 'mkwordpress_get_MKblock_title' ) ) :

function mkwordpress_get_MKblock_title(){
    
    global $post;
        
    $mkwordpress_block_args = array( 'post_type' => 'mkwordpress-block', 'posts_per_page' => -1 );
    $MKBlock = new WP_Query( $mkwordpress_block_args );
    $MKBlockID[] = 'Select Your Block';
    while ( $MKBlock->have_posts() ) : $MKBlock->the_post(); 
        $MKBlockID[] = $post->post_name;
    endwhile;
    
    return $MKBlockID;  
    
    wp_reset_postdata();
    
}

endif;


/**
 * Function create Visual Composer MK Block element.
 */

if ( ! function_exists( 'mkwordpress_vc_block_element' ) ) :


function mkwordpress_vc_block_element() {
   vc_map( array(
      "name" => __( "MK Block", "mkwordpress" ),
      "base" => "mkblock",
      "class" => "vc-mkblock",
      "category" => __( "MKWordPress", "mkwordpress"),
      "icon" => "icon-wpb-application-icon-large",
      "description" => __( "Click here to add block", "mkwordpress" ),
      'admin_enqueue_js' => array( MKWORDPRESS_ASSETS . 'js/vc-mkblock.js' ),
      'admin_enqueue_css' => array( MKWORDPRESS_ASSETS .'css/vc-mkblock.css' ),
      "params" => array(
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Please Select Your Block", "mkwordpress" ),
            "param_name" => "slug",
            "value" => mkwordpress_get_MKblock_title(),
            "description" => __( "You can add block by slug or blow by id.", "mkwordpress" )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Extra class name", "mkwordpress" ),
            "param_name" => "class",
            "value" => __( "", "mkwordpress" ),
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mkwordpress" )
         )
      )
   ) );
}

add_action( 'vc_before_init', 'mkwordpress_vc_block_element' );

endif;
?>