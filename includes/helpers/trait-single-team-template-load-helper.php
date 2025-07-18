<?php
trait MEDIR_Single_Team_Template_Load_Helper {
    function medir_team_single_template($single) {
        global $post;

        if ($post->post_type == 'medir_teams') {
            $plugin_template = MEDIR_PLUGIN_DIR . 'includes/templates/single-medir_teams.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $single;
    }
}
?>