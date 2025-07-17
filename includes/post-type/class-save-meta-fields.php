<?php
if( !class_exists('MEDIR_Save_Meta_Fields') ) {
    class MEDIR_Save_Meta_Fields {

        use MEDIR_Team_Save_Helper;
        use MEDIR_Member_Info_Save_Helper;
        public function __construct() {
            add_action('save_post_medir_member', [$this, 'medir_save_member_meta_fields']);
            add_action('save_post_medir_member', [$this, 'medir_save_member_team']);
        }
        
    }
}
?>