<?php

defined( 'ABSPATH' ) || die( "Can't access directly" );
class adminMenuBar{
    public function __construct()
    {
        add_action( 'admin_menu', [$this,'add_new_menu_items']);
    }

    public function add_new_menu_items () {
		add_menu_page(
			"Users",
			"Users Page",
			"manage_options",
			"users-menu",
			"users_page",
			"dashicons-admin-users",
			5
		);
		add_submenu_page(
			'users-menu',
			'list-user',
			'List Users',
			'manage_options',
			'users-menu',
			'users_page'
		);
		add_submenu_page(
			'users-menu',
			'add-user',
			'Add Users',
			'manage_options',
			'users-add',
			'users_add_page'
		);
	

		
	}

	
	
	

}

new adminMenuBar;

