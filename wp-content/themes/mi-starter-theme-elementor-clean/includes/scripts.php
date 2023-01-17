<?php

/**
 * Enqueue custom scripts and styles.
 */
use GlobalHelper\Helper;
class Script
{
	public function __construct()
	{
		add_action("wp_enqueue_scripts", [$this, "frontEnd"]);
		add_action( "init",[$this, "show_text"]  );
		add_filter( 'the_title', 'wporg_filter_title' );
	}
	
	function wporg_filter_title( $title ) {
		return 'The ' . $title . ' was filtered';
	}
	

	function show_text() {
		echo ("<h1>Hallo, this is text</h1>");
	}

	function frontEnd()
	{
		wp_enqueue_style(
			"frontend_style",
			get_stylesheet_directory_uri() . "/dist/css/build.min.css",
			[],
			filemtime(get_template_directory() . "/dist/css/build.min.css")
		);

		wp_enqueue_script(
			"frontend_script",
			get_template_directory_uri() . "/dist/js/build.min.js",
			["jquery"],
			filemtime(get_template_directory() . "/dist/js/build.min.js"),
			true
		);

		/*
		 * other parameters
		 * */
		$contoh_parameter = [
			'action'    => "ExampleAction1",
			'nonce'     => wp_create_nonce("NonceExampleAction1"),
		];

		/**
		 * enqueue Example Ajax
		 */
		wp_localize_script(
			'frontend_script', // Ajax Name
			'parameters', // Object name parameter
			[
				'url_admin_ajax'       => admin_url( 'admin-ajax.php' ),
				'ajax_tes' => $contoh_parameter
			]
		);


	}

	
	

}

/*
 * initialize
 * */
new Script();


