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

defined('ABSPATH') or die('I\'m sorry Dave, I can\'t do that\!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (class_exists('Inc\\Init')) {

    Inc\Init::register_services();
}



