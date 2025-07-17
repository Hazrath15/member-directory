<?php
if ( ! class_exists( 'MEDIR_Load_Template' ) ) {
    class MEDIR_Load_Template {

        public function __construct() {
            // Load the custom single template for 'medir_member' post type
            add_filter('single_template', [$this, 'medir_custom_single_template']);
        }

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
}