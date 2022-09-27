<?php



use Elementor\Widget_Base;

/**
 * Have the widget code for the Custom Elementor Nav Menu.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nav_Menu extends Widget_Base {

    /**
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'skript-menu';
    }

    /**
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Skript Menu', 'skript-land' );
    }

    public function get_icon() {
        // return 'fa fa-menu';
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        // TODO: Add out own category in Elementor.
        return ['skript'];

        // pro-elements
        // woocommerce-elements
        // general
        // basic
    }

    public function _register_control() {

    }

    protected function render() {
        ?>
        <div>Hello widget</div>
        <?php
    }

    protected function _content_template() {
        ?>
        <div>Hello widget</div>
        <?php
    }

}