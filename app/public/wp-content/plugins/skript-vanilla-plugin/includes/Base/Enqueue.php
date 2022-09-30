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

namespace Inc\Base;

class Enqueue
{

    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);

//        add_action('admin_menu', [$this, 'add_admin_pages']);
//
//
//        add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
    }


    function enqueue()
    {
        wp_enqueue_style('vanilla-style', PLUGIN_URL . 'assets/main.css');
        wp_enqueue_script('vanilla-script', PLUGIN_URL . 'assets/main.js');
    }


}