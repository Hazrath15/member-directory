<?php
if( !class_exists('MEDIR_Activator') ){
    class MEDIR_Activator {
        public static function activate() {
            // Actions to perform on plugin activation
            flush_rewrite_rules();
        }
    }
}

?>