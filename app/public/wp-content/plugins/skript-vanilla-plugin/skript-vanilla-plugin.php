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


class VanillaPlugin
{

//This is really useful when you want to update or wipe the DB of the installation...
    function __construct()
    {
        // OOP way of instantiating the add_action...
        add_action('init', [$this, 'custom_post_type']);
    }


    function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }


    function activate()
    {
        //Generate a Custom Post Type
        //Flush Rewrite Rules

        $this->custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate()
    {
        //Flush Rewrite Rules
    }

//    function uninstall()
//    {
//        // Delete Custom Post Type
//        // Delete all the plugin data from the DB
//    }

    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Vanilla Books']);
    }

    function enqueue()
    {
       wp_enqueue_style('vanilla-style', plugins_url('/assets/main.css', __FILE__));
       wp_enqueue_script('vanilla-script', plugins_url('/assets/main.js', __FILE__));
    }


}

if (class_exists('VanillaPlugin')) {
    $vanillaPlugin = new VanillaPlugin('We are good to go Red Leader');
    $vanillaPlugin->register();
}

// activation
register_activation_hook(__FILE__, [$vanillaPlugin, 'activate']);


// deactivation
register_deactivation_hook(__FILE__, [$vanillaPlugin, 'deactivate']);



// uninstall
// This requires a static method in the class...
//register_uninstall_hook(__FILE__, [$vanillaPlugin, 'uninstall']);


