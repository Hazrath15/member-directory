<?php
trait MEDIR_Team_Save_Helper {
    public function medir_save_member_team($post_id) {
        if (isset($_POST['medir_assigned_teams'])) {
            $teams = array_map('intval', $_POST['medir_assigned_teams']);
            update_post_meta($post_id, '_medir_assigned_teams', $teams);
        } else {
            delete_post_meta($post_id, '_medir_assigned_teams');
        }
    }
}
?>