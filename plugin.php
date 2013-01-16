<?php
/*
Plugin Name: Simple Administrative Messages
Plugin URI: http://markitekt.ee/wordpress/simple-administrative-messages
Description: Lets you display helpful messages to your (usually) administrative users (usually) about why various stuff in your system works the way it does
Version: 0.2
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

function admin_message( $message, $level = "info", $mincap = "delete_users", $return = false ) {
    if ( ! current_user_can( $mincap ) ) return;

    if ( $return ) ob_start();
?>
    <div class="administrative-message">
        <p class="<?php echo $level; ?>"><?php echo $message; ?></p>
    </div>
<?php
    if ( $return ) return ob_get_clean();
}

function get_admin_message( $message, $level = "info", $mincap = "delete_users" ) {
    return admin_message( $message, $level, $mincap, true );
}
