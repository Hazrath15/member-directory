<?php
trait MEDIR_Team_Listing_Template_Load_Helper {
    function medir_team_archive_template($archive) {
        global $post;

        if ($post->post_type == 'medir_teams') {
            $plugin_template = MEDIR_PLUGIN_DIR . 'includes/templates/archive-medir_teams.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }
        return $archive;
    }
}
?>