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

namespace Inc\Pages;

class Admin
{

    public function register()
    {
        add_action('admin_menu', [$this, 'add_admin_pages']);
    }


    public function add_admin_pages()
    {
        add_menu_page('Vanilla Skript Plugin', 'Nilla Killa', 'manage_options', 'skript_nilla_plugin', [$this, 'admin_index'],
            'dashicons-buddicons-replies', null
        );
    }



    public function admin_index()
    {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}