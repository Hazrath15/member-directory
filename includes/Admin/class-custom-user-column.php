<?php
if (!class_exists('MEDIR_Custom_User_Column')) {
    class MEDIR_Custom_User_Column {
        public function __construct() {
            add_filter('manage_medir_member_posts_columns', [$this, 'medir_add_custom_columns']);
        }

        public function medir_add_custom_columns($columns) {
            unset($columns['date']);
            $columns['first_name'] = 'First Name';
            $columns['last_name']  = 'Last Name';
            $columns['email']      = 'Email';
            $columns['team']       = 'Team';
            $columns['status']     = 'Status';
            $columns['date']       = 'Date';
            return $columns;
        }
    }
}
?>