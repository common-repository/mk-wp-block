<?php

/**
 * Function MK Block Register Post Type.
 */
 
if ( ! function_exists( 'mkwordpress_register_post_type' ) ) :    
    
    function mkwordpress_register_post_type() {
    
    $labels = array(
        'name' => __('MK Block ( All Blocks List )', 'mkwordpress'),
        'singular_name' => __('All Blocks', 'mkwordpress'),
        'add_new' => __('Add New Block', 'mkwordpress'),
        'add_new_item' => __('MK Block - Add New Block', 'mkwordpress'),
        'edit_item' => __('Edit Block', 'mkwordpress'),
        'new_item' => __('New Block', 'mkwordpress'),
        'view_item' => __('View Block', 'mkwordpress'),
        'search_items' => __('Search Block', 'mkwordpress'),
        'not_found' => __('No Blocks found', 'mkwordpress'),
        'not_found_in_trash' => __('No Blocks found in Trash', 'mkwordpress'),
        'parent_item_colon' => '',
        'menu_name' => __('MK Block', 'mkwordpress')
    );
    $args = array(
        'label' => __('MK Block', 'mkwordpress'),
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'supports' => array( 'title', 'editor' ),
    );
    
    register_post_type( 'mkwordpress-block' , $args);
    }

    add_action('init','mkwordpress_register_post_type');
    
endif;
?>