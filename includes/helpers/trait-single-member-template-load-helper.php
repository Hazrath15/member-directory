<?php
trait MEDIR_Single_Member_Template_Load_Helper {
    function medir_custom_single_template($single) {
        global $post;

        if ($post->post_type == 'medir_member') {
            $plugin_template = MEDIR_PLUGIN_DIR . 'includes/templates/single-medir_member.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $single;
    }
}
?>