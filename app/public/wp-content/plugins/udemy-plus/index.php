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
include(UP_PLUGIN_DIR . 'includes/register-blocks.php');
include(UP_PLUGIN_DIR . 'includes/blocks/search-form.php');
include(UP_PLUGIN_DIR . 'includes/blocks/page-header.php');

//Hooks
add_action('init', 'up_register_blocks');
