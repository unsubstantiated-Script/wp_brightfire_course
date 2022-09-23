<?php //Kak is lacking!

/**
 * Plugin Name:       Udemy Plus
 * Plugin URI:        https://udemy.com
 * Description:       A plugin for adding blocks to a theme.
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Author:            Justin Fulton
 * Author URI:        https://unsubstantiatedscript.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       udemy-plus
 * Domain Path:       /languages
 */

// Security measures
if (!function_exists('add_action')) {
    echo 'Seems as if you do not belong here...';
    exit;
}

//Setup
//System paths consts need to be defined before including them to avoid errors
define('UP_PLUGIN_DIR', plugin_dir_path(__FILE__));

//Includes
//Importing the files we need
//include(UP_PLUGIN_DIR . 'includes/register-blocks.php');
//include(UP_PLUGIN_DIR . 'includes/blocks/search-form.php');
//include(UP_PLUGIN_DIR . 'includes/blocks/page-header.php');

//This method eliminates the need for doing the above...
$rootFiles = glob(UP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(UP_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach ($allFiles as $filename) {
    include_once($filename);
}

//Hooks
register_activation_hook(__FILE__, 'up_activate_plugin');
add_action('init', 'up_register_blocks');
add_action('rest_api_init', 'up_rest_api_init');
add_action('wp_enqueue_scripts', 'up_enqueue_scripts');
add_action('init', 'up_recipe_post_type');
add_action('cuisine_add_form_fields', 'up_cuisine_add_form_fields');
add_action('create_cuisine', 'up_save_cuisine_meta');
add_action('cuisine_edit_form_fields', 'up_cuisine_edit_form_fields');
add_action('edited_cuisine', 'up_save_cuisine_meta');
add_action('save_post_recipe', 'up_save_post_recipe');