<?php
trait MEDIR_Frontend_Assets_Load_Helper {
    public function medir_frontend_enqueue_scripts( $hook ) {

        wp_enqueue_style( 'medir-bootstrap-css', plugins_url( '../assets/css/bootstrap.min.css', plugin_dir_path( __DIR__ ) ), [], '5.3.5' );
        wp_enqueue_style( 'medir-main-css', plugins_url( '../assets/css/frontend-style.css', plugin_dir_path( __DIR__ ) ), [], '1.0.0' );
    }
}
?>