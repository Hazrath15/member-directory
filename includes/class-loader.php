<?php
if( !class_exists('MEDIR_Autoloader') ) {
    class MEDIR_Autoloader {
        public static function init() {

            //Load Helpers
            require_once MEDIR_PLUGIN_DIR . 'includes/helpers/trait-add-meta-fileds-helper.php';

            // Load Admin Classes
            require_once MEDIR_PLUGIN_DIR . 'includes/Admin/class-admin-dashboard.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/Admin/class-admin-settings.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/Admin/class-fill-custom-column-value.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/Admin/class-custom-user-column.php';

            //Load Post Type Classes
            require_once MEDIR_PLUGIN_DIR . 'includes/post-type/class-register-post-type.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/post-type/class-add-meta-box.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/post-type/class-save-meta-fields.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/post-type/class-member-hendler.php';

            //Load Activator and Deactivator
            require_once MEDIR_PLUGIN_DIR . 'includes/class-activator.php';
            require_once MEDIR_PLUGIN_DIR . 'includes/class-deactivator.php';

            //Load Template Loader
            require_once MEDIR_PLUGIN_DIR . 'includes/class-load-template.php';

            new MEDIR_Admin_Settings();
            new MEDIR_Register_Post_Type();
            new MEDIR_Add_Meta_Box();
            new MEDIR_Save_Meta_Fields();
            new MEDIR_Save_Member_Handler();
            new MEDIR_Load_Template();
            new MEDIR_Custom_User_Column();
            new MEDIR_Fill_Custom_Column_Value();
        }
    }
}

?>