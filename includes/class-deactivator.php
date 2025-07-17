<?php
if( !class_exists('MEDIR_Deactivator') ){
    class MEDIR_Deactivator {
        public static function deactivate() {
            // Actions to perform on plugin deactivation
            flush_rewrite_rules();
        }
    }
}

?>