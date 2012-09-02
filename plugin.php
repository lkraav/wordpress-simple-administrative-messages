<?php
/*
Plugin Name: Simple Administrative Messages
Plugin URI: http://markitekt.ee/wordpress/simple-administrative-messages
Description: Let's you display helpful messages about whatever system you built to your users
Version: 0.1
Author: Leho Kraav
Author URI: http://leho.kraav.com
Author Email: leho@kraav.com
License: GPL-2
*/

class SimpleAdministrativeMessages {
    function __construct() {
        add_action( 'admin_print_styles', array( &$this, 'register_admin_styles' ) );
        add_action( 'wp_enqueue_scripts', array( &$this, 'register_plugin_styles' ) );
    }

    public function register_admin_styles() {
        wp_register_style( 'simple-administrative-messages-admin-styles', plugins_url( 'simple-administrative-messages/css/style.css' ) );
        wp_enqueue_style( 'simple-administrative-messages-admin-styles' );
    }

    public function register_plugin_styles() {
        wp_register_style( 'simple-administrative-messages-plugin-styles', plugins_url( 'simple-administrative-messages/css/style.css' ) );
        wp_enqueue_style( 'simple-administrative-messages-plugin-styles' );
    }
}

new SimpleAdministrativeMessages();
