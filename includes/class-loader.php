<?php
if( !class_exists('MEDIR_Autoloader') ) {
    class MEDIR_Autoloader {
        public static function init() {

            //Load Activator and Deactivator
            require_once MEDIR_PLUGIN_DIR . 'includes/class-activator.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/class-deactivator.php';
        }
    }
}

?>