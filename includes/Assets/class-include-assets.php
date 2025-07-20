<?php
if( !class_exists('MEDIR_Include_Assets') ) {
    class MEDIR_Include_Assets {
        use MEDIR_Admin_Assets_Load_Helper;
        use MEDIR_Frontend_Assets_Load_Helper;
        
        public function __construct() {

            add_action( 'admin_enqueue_scripts', [ $this, 'medir_admin_enqueue_scripts' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'medir_frontend_enqueue_scripts' ] );
        }
        
        
    }
}

?>
