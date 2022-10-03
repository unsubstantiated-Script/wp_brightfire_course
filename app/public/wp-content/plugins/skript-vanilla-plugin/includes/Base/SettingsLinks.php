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

class SettingsLinks
{


    public  function register()
    {
        add_filter("plugin_action_links_" . PLUGIN, [$this, 'settings_link']);
    }

        public function settings_link($links)
    {
        $settings_link = '<a href="options-general.php?page=skript_nilla_plugin">Set it up!</a>';
        $links[] = $settings_link;
        return $links;
    }
}
