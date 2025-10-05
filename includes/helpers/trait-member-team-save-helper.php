<?php
trait MEDIR_Team_Save_Helper {
    public function medir_save_member_team($post_id) {

        if ( ! isset($_POST['medir_team_nonce']) || 
             ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['medir_team_nonce'])), 'medir_save_member_team_action') ) {
            return; // Nonce is missing or invalid — abort saving
        }
        if (isset($_POST['medir_assigned_teams'])) {
            $teams = array_map('intval', wp_unslash($_POST['medir_assigned_teams']));
            update_post_meta($post_id, '_medir_assigned_teams', $teams);
        } else {
            delete_post_meta($post_id, '_medir_assigned_teams');
        }
    }
}
?>