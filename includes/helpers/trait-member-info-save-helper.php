<?php
trait MEDIR_Member_Info_Save_Helper {
    function medir_save_member_meta_fields($post_id) {
        // Nonce check (unslash before verify)
        if ( ! isset($_POST['medir_meta_nonce']) 
            || ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['medir_meta_nonce'])), 'medir_save_meta_fields' ) ) {
            return;
        }

        // Autosave and permissions check
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
        if ( ! current_user_can('edit_post', $post_id) ) return;

        // Fields to save
        $fields = ['first_name', 'last_name', 'email', 'address', 'color', 'status', 'profile_image', 'cover_image'];

        foreach ( $fields as $field ) {
            if ( isset($_POST["medir_$field"]) ) {
                update_post_meta(
                    $post_id,
                    "_medir_$field",
                    sanitize_text_field( wp_unslash( $_POST["medir_$field"] ) )
                );
            }
        }
    }
}
?>
