<?php

/*
Plugin Name: Amazon Ads
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Plugin to display Amazon affiliate links. Requires ACF Pro.
Version: 1.0
Author: iruneitoiz
Author URI: http://URI_Of_The_Plugin_Author
License: GPL2
*/

//Include plugin files
include_once('carousel_shortcode.php');
include_once('item_shortcode.php');
include_once('acf_fields.php');

add_action( 'admin_init', 'child_plugin_has_parent_plugin' );
function child_plugin_has_parent_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
        add_action( 'admin_notices', 'child_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) );

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    } else {
        include_once('acf_fields.php');
    }
}

function child_plugin_notice(){
    ?><div class="error"><p>Sorry, but Child Plugin requires the <a href="https://www.advancedcustomfields.com/pro/">ACF Pro plugin</a> to be installed and active.</p></div><?php
}

function add_my_stylesheet()
{
    wp_enqueue_style( 'myCSS', plugins_url( '/assets/styles.css', __FILE__ ) );
}

add_action('wp_enqueue_scripts', 'add_my_stylesheet');

add_action( 'after_setup_theme', 'custom_image_size_carousel' );

function custom_image_size_carousel ()
{
    add_image_size( 'amazon_thumbnail', 150, 150, false );
}

