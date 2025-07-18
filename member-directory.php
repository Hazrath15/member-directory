<?php
/*
* Plugin Name: Member Directory
* Description: This is a member directory plugin. From this plugin the plugin development lession is starting.
* Version: 1.0.0
* Author: Hazrath Ali
* Author URI: https://github.com/Hazrath15
* License: GPL-2.0+
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: member-directory
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
define( 'MEDIR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once MEDIR_PLUGIN_DIR . 'includes/class-loader.php';
MEDIR_Autoloader::init();

// Register activation and deactivation hooks
register_activation_hook(__FILE__, ['MEDIR_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['MEDIR_Deactivator', 'deactivate']);

?>