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

final class Init
{
    /**
     * Setting up all the classes
     * @return string[]
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

    /**
     * Setting up the ability to instantiate
     * @param $class
     * @return mixed
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }

    /**
     * Instantiating and registering each class
     * @return void
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);

            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
}
//use Inc\Admin\Admin;
//
//
//class VanillaPlugin
//{
//
//    public $plugin;
//
////This is really useful when you want to update or wipe the DB of the installation...
//    function __construct()
//    {
//        $this->plugin = plugin_basename(__FILE__);
////        // OOP way of instantiating the add_action...
////        add_action('init', [$this, 'custom_post_type']);
//    }
//
//
//    //For frontend area
//    function register()
//    {
//        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
//
//        add_action('admin_menu', [$this, 'add_admin_pages']);
//
//
//        add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
//    }
//
//    public function add_admin_pages()
//    {
//        add_menu_page('Vanilla Skript Plugin', 'Nilla Killa', 'manage_options', 'skript_nilla_plugin', [$this, 'admin_index'],
//            'dashicons-buddicons-replies', null
//        );
//    }
//
//    function create_post_type()
//    {
//        add_action('init', [$this, 'custom_post_type']);
//    }
//
//    public function admin_index()
//    {
//        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//    }
//
//    public function settings_link($links)
//    {
//        $settings_link = '<a href="options-general.php?page=skript_nilla_plugin">Set it up!</a>';
//        $links[] = $settings_link;
//        return $links;
//    }
//
//    //For frontend area
////    function register_frontend_scripts()
////    {
////        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
////    }
//
//
////    function uninstall()
////    {
////        // Delete Custom Post Type
////        // Delete all the plugin data from the DB
////    }
//
//    function custom_post_type()
//    {
//        register_post_type('book', ['public' => true, 'label' => 'Vanilla Books']);
//    }
//
//    function enqueue()
//    {
//        wp_enqueue_style('vanilla-style', plugins_url('/assets/main.css', __FILE__));
//        wp_enqueue_script('vanilla-script', plugins_url('/assets/main.js', __FILE__));
//    }
//
//
//
//}
//
//if (class_exists('VanillaPlugin')) {
//    $vanillaPlugin = new VanillaPlugin('We are good to go Red Leader');
//    $vanillaPlugin->register();
//}
//
//// activation
////require_once plugin_dir_path(__FILE__) . 'includes / plugin - activate . php';
//register_activation_hook(__FILE__, ['Inc\Activate', 'activate']);
//
//
//// deactivation
////require_once plugin_dir_path(__FILE__) . 'includes / plugin - deactivate . php';
//register_deactivation_hook(__FILE__, ['Inc\Deactivate', 'deactivate']);
//
//
//
//// uninstall
//// This requires a static method in the class...
////register_uninstall_hook(__FILE__, [$vanillaPlugin, 'uninstall']);