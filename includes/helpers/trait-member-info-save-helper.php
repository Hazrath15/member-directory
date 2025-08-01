<?php
trait MEDIR_Member_Info_Save_Helper {
    function medir_save_member_meta_fields($post_id) {
        if (!isset($_POST['medir_meta_nonce']) || !wp_verify_nonce($_POST['medir_meta_nonce'], 'medir_save_meta_fields')) return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (!current_user_can('edit_post', $post_id)) return;

        $fields = ['first_name', 'last_name', 'email', 'address', 'color', 'status', 'profile_image', 'cover_image'];

        foreach ($fields as $field) {
            if (isset($_POST["medir_$field"])) {
                update_post_meta($post_id, "_medir_$field", sanitize_text_field($_POST["medir_$field"]));
            }
        }
    }
}
?>