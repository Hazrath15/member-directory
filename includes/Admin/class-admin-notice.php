<?php
if ( ! class_exists( 'MEDIR_Admin_Notice' ) ) {
    class MEDIR_Admin_Notice {
        public function __construct() {
            add_action( 'admin_notices', [$this, 'medir_admin_notice' ] );
        }
        public function medir_admin_notice() {
            if (isset($_GET['email_error'])) {
                echo '<div class="notice notice-error"><p>Email already exists for another member.</p></div>';
            }
        }
    }
}
?>