<?php
if ( ! class_exists( 'MEDIR_Admin_Settings' ) ) {
    class MEDIR_Admin_Settings extends MEDIR_Admin_Dashboard {
        public function __construct() {
            add_action( 'admin_menu', [$this, 'medir_add_admin_menu'] );
        }
        public function medir_add_admin_menu() {
            add_menu_page(
                __('Member Directory', 'member-directory'),
                __('Member Directory', 'member-directory'),
                'manage_options',
                'medir-admin-dashboard',
                [ $this, 'medir_admin_dashboard' ],
                'dashicons-visibility'
            );
        }
    }
}
