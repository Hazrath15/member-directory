<?php
trait MEDIR_Member_Listing_Template_Load_Helper {

    function medir_member_archive_template($archive) {
        global $post;

        if ($post->post_type == 'medir_member') {
            $plugin_template = MEDIR_PLUGIN_DIR . 'includes/templates/archive-medir_member.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }
        return $archive;
    }

}
?>
