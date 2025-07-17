<?php
if ( ! class_exists( 'MEDIR_Save_Member_Handler' ) ) {
    class MEDIR_Save_Member_Handler {

        public function __construct() {
            add_action('save_post_medir_member', [$this, 'update_title_and_slug'], 20, 2);
        }

        public function update_title_and_slug($post_id, $post) {
            remove_action('save_post_medir_member', [$this, 'update_title_and_slug'], 20);

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
            if ($post->post_type !== 'medir_member') return;

            $first_name = sanitize_text_field($_POST['medir_first_name'] ?? '');
            $last_name  = sanitize_text_field($_POST['medir_last_name'] ?? '');

            if ($first_name && $last_name) {
                $full_name = $first_name . ' ' . $last_name;
                $slug      = sanitize_title($first_name . '_' . $last_name);

                wp_update_post([
                    'ID'         => $post_id,
                    'post_title' => $full_name,
                    'post_name'  => $slug,
                ]);
            }
            add_action('save_post_medir_member', [$this, 'update_title_and_slug'], 20, 2);
        }
    }
}
