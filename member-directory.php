<?php
/*
* Plugin Name: Member Directory
* Description: This is a member directory plugin. From this plugin the plugin development lession is starting.
* Version: 1.0.0
* Author: Hazrath Ali
* Author URI: https://github.com/Hazrath15
* License: GPL-2.0+
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: member-directory
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
define( 'MEDIR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once MEDIR_PLUGIN_DIR . 'includes/class-loader.php';
MEDIR_Autoloader::init();

// Register activation and deactivation hooks
register_activation_hook(__FILE__, ['MEDIR_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['MEDIR_Deactivator', 'deactivate']);

function medir_handle_contact_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['to_email'])) {
        $to = sanitize_email($_POST['to_email']);
        $name = sanitize_text_field($_POST['full_name']);
        $from = sanitize_email($_POST['from_email']);
        $msg = sanitize_textarea_field($_POST['message']);

        wp_mail($to, "New Message from $name", $msg, ['From: ' . $from]);

        // Save to DB
        $post_id = wp_insert_post([
            'post_type' => 'medir_submission',
            'post_title' => "Message from $name",
            'post_status' => 'private',
        ]);
        add_post_meta($post_id, '_medir_member_email', $to);
        add_post_meta($post_id, '_medir_message', $msg);
        add_post_meta($post_id, '_medir_sender_email', $from);
		add_post_meta($post_id, '_medir_sender_name', $name);
    }
}
add_action('init', 'medir_handle_contact_form');

add_filter('manage_medir_member_posts_columns', function($cols) {
    $cols['messages'] = 'Messages';
    return $cols;
});
add_action('manage_medir_member_posts_custom_column', function($col, $post_id) {
    if ($col === 'messages') {
        global $wpdb;
        $email = get_post_meta($post_id, '_medir_email', true);
        $count = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = '_medir_member_email' AND meta_value = %s",
            $email
        ));
        echo intval($count);
    }
}, 10, 2);


?>