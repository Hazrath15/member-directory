<?php
if ( ! class_exists( 'MEDIR_Email_Submission_Handler') ) {
    class MEDIR_Email_Submission_Handler {
        public function __construct() {
            add_action('init', [$this, 'medir_handle_contact_form']);
        }
        function medir_handle_contact_form() {

            if ( ! isset($_POST['medir_form_nonce']) || 
                ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['medir_form_nonce'])), 'medir_save_form_action') ) {
                return; // Nonce is missing or invalid — abort saving
            }

            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['to_email'])) {
                $to   = isset($_POST['to_email']) ? sanitize_email( wp_unslash( $_POST['to_email'] ) ) : '';
                $name = isset($_POST['full_name']) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
                $from = isset($_POST['from_email']) ? sanitize_email( wp_unslash( $_POST['from_email'] ) ) : '';
                $msg  = isset($_POST['message']) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
 
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