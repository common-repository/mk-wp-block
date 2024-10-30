<?php
/**
 * @package MK_WordPress
 */
/*
Plugin Name: MK WP Block
Plugin URI: https://mkwordpress.com/plugins/block
Description: This Plugin Create Block for your website and you can use block any where in your theme just add block shortcode and enhance your website functions and layout.
Version: 1.0.0
Author: MK WordPress
Author URI: https://mkwordpress.com/
License: GPLv2 or later
Text Domain: mkwordpress
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// Define Plugin Version and compatibility.
define( 'MKWORDPRESS_VERSION', '1.0.0' );
define( 'MKWORDPRESS_MINIMUM_WP_VERSION', '4.4' );
// Define Plugin Url.
define( 'MKWORDPRESS_URL', plugin_dir_url(__FILE__));
define( 'MKWORDPRESS_ASSETS', MKWORDPRESS_URL . "assets/");
// Define Plugin Dir Paht.
define( 'MKWORDPRESS_DIR', dirname(__FILE__) . '/' );
define( 'MKWORDPRESS_ADMIN', MKWORDPRESS_DIR . "admin/");
define( 'MKWORDPRESS_FUNCTIONS', MKWORDPRESS_DIR . "functions/");
define( 'MKWORDPRESS_TEMPLATES', MKWORDPRESS_DIR . "templates/");
define( 'MKWORDPRESS_WIDGETS', MKWORDPRESS_DIR . "widgets/");

// Include Configration
include_once( MKWORDPRESS_FUNCTIONS . 'index.php' );

// Plugin Activation Hook.
function mkwordpress_plugin_action_bar( $actions, $plugin_file ){
    static $plugin;
    if (!isset($plugin))
    $plugin = plugin_basename(__FILE__);
        if ( $plugin == $plugin_file ) {
            //$mkwordpress_settings = array('settings' => '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=mkwordpress-block') ) .'">' . __('Settings', 'General') . '</a>');
            $mkwordpress_support = array('support' => '<a href="https://mkwordpress.com/support" target="_blank">Support</a>');
            //$actions = array_merge( $mkwordpress_settings, $actions );
            $actions = array_merge( $mkwordpress_support, $actions );
        }
    return $actions;
}
add_filter( 'plugin_action_links', 'mkwordpress_plugin_action_bar', 10, 5 );