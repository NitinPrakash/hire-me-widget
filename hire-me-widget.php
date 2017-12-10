<?php
/**
 * Hire Me Widget
 *
 * Effortlessly display if your team or you are available for hire using this widget. Useful for freelance developers or designers like me.
 *
 * @link              http://www.nitin247.com/
 * @since             1.0.0
 * @package           Hire_Me_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Hire Me Widget
 * Plugin URI:        http://www.nitin247.com/wp-plugins/hire-me-widget/
 * Description:       Effortlessly display if your team or you are available for hire using this widget. Useful for freelance developers or designers like me.
 * Version:           1.0.0
 * Author:            Nitin Prakash
 * Author URI:        http://www.nitin247.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hire-me-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('HMW_DIRECTORY', plugins_url().'/hire-me-widget/');

/**
 * The code that runs during plugin activation.
 */
function activate_hire_me_widget() {
 // Do Nothing    
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_hire_me_widget() {
        // Do Nothing
}

register_activation_hook( __FILE__, 'activate_hire_me_widget' );
register_deactivation_hook( __FILE__, 'deactivate_hire_me_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'inc/class-hire-me-widget.php';

/**
 * Begins execution of the plugin.
 * @since    1.0.0
 */
function run_hire_me_widget() {
    
wp_enqueue_style( 'hire-me-widget', HMW_DIRECTORY . 'assets/hmw.css' );    

$plugin = new Hire_Me_Widget();
$plugin->run();

}

// Fire the Hire Me Widget
run_hire_me_widget();
