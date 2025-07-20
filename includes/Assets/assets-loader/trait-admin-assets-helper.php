<?php
trait MEDIR_Admin_Assets_Load_Helper {
    public function medir_admin_enqueue_scripts( $hook ) {

        wp_enqueue_style( 'medir-main-css', plugins_url( '../assets/css/admin-style.css', plugin_dir_path( __DIR__ ) ), [], '1.0.0' );
        wp_enqueue_script( 'medir-admin-js', plugins_url( '../assets/js/admin-main.js', plugin_dir_path( __DIR__ ) ), [], '1.0.0' );
        wp_enqueue_media();
    }
}
?>