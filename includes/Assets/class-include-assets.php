<?php
if( !class_exists('MEDIR_Include_Assets') ) {
    class MEDIR_Include_Assets {
        public function __construct() {
            // Use 'admin_enqueue_scripts' (not 'wp_enqueue_admin_scripts')
            add_action( 'admin_enqueue_scripts', [ $this, 'medir_admin_enqueue_scripts' ] );
        }

        public function medir_admin_enqueue_scripts( $hook ) {
            // Ensure styles load only on your plugin settings page
            // if ( $hook !== 'toplevel_page_member-directory' ) {
            //     return;
            // }

            // wp_enqueue_style( 'medir-admin-css', plugins_url( 'assets/css/admin-style.css', plugin_dir_path( __DIR__ ) ), [], '1.0.0' );
            // wp_enqueue_style( 'medir-fontawesome-css', plugins_url( 'assets/fontawesome/css/all.min.css', plugin_dir_path( __DIR__ ) ), [], '6.7.2' );
            // wp_enqueue_script( 'medir-fontawesome-js', plugins_url( 'assets/fontawesome/js/all.min.js', plugin_dir_path( __DIR__ ) ), [], '6.7.2' );
            wp_enqueue_script( 'medir-admin-js', plugins_url( 'assets/js/admin-main.js', plugin_dir_path( __DIR__ ) ), [], '1.0.0' );
            wp_enqueue_media();
        }
        
        
    }
}

?>
