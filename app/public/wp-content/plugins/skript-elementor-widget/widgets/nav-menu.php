<?php


use Elementor\Widget_Base;

/**
 * Have the widget code for the Custom Elementor Nav Menu.
 */

if (!defined('ABSPATH')) {
    exit;
}

class Nav_Menu extends Widget_Base
{

    /**
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'skript-menu';
    }

    /**
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Skript Menu', 'skript-land');
    }

    public function get_icon()
    {
        // return 'fa fa-menu';
        return 'eicon-nav-menu';
    }

    public function get_categories()
    {
        // TODO: Add our own category in Elementor.
        return ['skript-keep'];

        // pro-elements
        // woocommerce-elements
        // general
        // basic
    }

    public function _register_control()
    {

    }


    //Font end
    protected function render()
    {
        echo wp_nav_menu(
            [
                'container' => '',
                'menu_class' => 'skript-menu'
            ]
        );
    }

    //Backend
    protected function content_template()
    {
        echo wp_nav_menu(
            [
                'container' => '',
                'menu_class' => 'skript-menu',
            ]
        );
    }

}