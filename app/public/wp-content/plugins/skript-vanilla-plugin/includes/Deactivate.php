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

namespace Inc;

class Deactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
