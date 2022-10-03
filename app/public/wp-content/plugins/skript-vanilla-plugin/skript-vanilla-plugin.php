<?php
/**
 *
 * @package VanillaBooks
 * /
 * /*
 * Plugin Name: Skript Vanilla
 * Plugin URI: https://www.unsubstantiatedscript.com/
 * Description: A vanilla WP Plugin to test things out
 * Version: 0.1
 * Author: Skript
 * Author URI: https://www.unsubstantiatedscript.com/
 **/

//If this file is called directly, abort to prevent haxxors
defined('ABSPATH') or die('I\'m sorry Dave, I can\'t do that\!');

// Require composer autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

//Define CONSTS
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

//Importing
use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * Code for running plugin activation
 * @return void
 */
function activate_vanilla_plugin() {
    Activate::activate();
}

/**
 * Code for running plugin deactivation
 * @return void
 */
function deactivate_vanilla_plugin() {
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_vanilla_plugin');
register_deactivation_hook(__FILE__, 'deactivate_vanilla_plugin');

if (class_exists('Inc\\Init')) {

    Inc\Init::register_services();
}



