<?php
/**
 * Plugin Name:       Skript Widgets
 * Plugin URI:        https://udemy.com
 * Description:       A plugin for adding widgets to an Elementor Theme.
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Skript
 * Author URI:        https://unsubstantiatedscript.com
 * Text Domain:       skript-land
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function register_nav_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/nav-menu.php' );

    $widgets_manager->register( new \Nav_Menu() );

}

add_action( 'elementor/widgets/register', 'register_nav_widget' );