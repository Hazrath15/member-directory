<?php
if( !class_exists('MEDIR_Add_Meta_Box') ) {
    class MEDIR_Add_Meta_Box {
        use MEDIR_Add_Meta_Fields_Helper;
        use MEDIR_Team_Meta_Fields_Helper;
        public function __construct() {
            add_action('add_meta_boxes', [$this, 'medir_add_member_meta_boxes']);
        }
        function medir_add_member_meta_boxes() {
            add_meta_box('medir_member_fields', 'Member Info', [$this, 'medir_member_fields'], 'medir_member', 'normal', 'default');
            add_meta_box('medir_team_fields', 'Member Team', [$this, 'medir_render_team_selector'], 'medir_member', 'normal', 'default');
        }
    }
}
?>