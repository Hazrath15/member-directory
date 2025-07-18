<?php
if ( ! class_exists( 'MEDIR_Email_Submission_Handler') ) {
    class MEDIR_Email_Submission_Handler {
        public function __construct() {
            add_action('init', [$this, 'medir_handle_contact_form']);
        }
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
    }
}

?>