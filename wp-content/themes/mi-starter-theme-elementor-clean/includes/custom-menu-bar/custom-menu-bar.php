<?php

defined( 'ABSPATH' ) || die( "Can't access directly" );
class adminMenuBar{
    public function __construct()
    {
        add_action( 'admin_menu', 'add_new_menu_items');
    }


    public function add_new_menu_items () {
        add_menu_page(
            "Theme Option",
            "Theme Option Page",
            "manage_options",
            "theme-options",
            "theme_options_page",
            100
        );
        add_submenu_page(
            'theme-options',
            'wpautop-control',
            'wpautop control',
            'manage_options',
            'wpautop-control-menu',
            'wpautop_control_options'
        );
    }

}

// new adminMenuBar;

