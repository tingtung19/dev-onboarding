<?php
/**
 * Description : add all functionalities in here MF
 */
defined( 'ABSPATH' ) || die( "Can't access directly" );


class CustomFunctionOnboarding
{

	public function __construct()
	{
		$this->hook();
		$this->add_acf_option_page();
	}

	/**
	 * call all functions
	 */
	public function hook()
	{
		// add_filter("upload_mimes", [$this, "addFileTypesToUploads"]); // ini harus dipindah
		add_action( 'login_enqueue_scripts', [$this, 'my_login_logo' ]);
		add_filter( 'login_headerurl', [$this, 'my_login_logo_url'] );
	}
    public function my_login_logo() { 
		// echo "Lokasi ".THEME_URL;
		?>
	
	
		<style type="text/css">
			#login h1 a, .login h1 a {
				background-image: url(<?php echo THEME_URL; ?>/assets/images/logo.png);
				height:200px;
				width:320px;
				background-size: 320px 200px;
				background-repeat: no-repeat;
				padding-bottom: 30px;
			}
		</style>
	<?php 
	}

	function my_login_logo_url() {
		// return home_url();
		return "https://madeindonesia.com";
	}

	function add_acf_option_page(){
		if( function_exists('acf_add_options_page') ) {
    
			acf_add_options_page(array(
				'page_title'    => 'Website Settings',
				'menu_title'    => 'Website Settings',
				'menu_slug'     => 'website-general-settings',
				'capability'    => 'edit_posts',
				'redirect'      => false
			));
			
			acf_add_options_sub_page(array(
				'page_title'    => 'Website Header Settings',
				'menu_title'    => 'Header',
				'parent_slug'   => 'website-general-settings',
			));
			
			acf_add_options_sub_page(array(
				'page_title'    => 'Website Footer Settings',
				'menu_title'    => 'Footer',
				'parent_slug'   => 'website-general-settings',
			));

						
		}
	}

	
	

	
	
}

new CustomFunctionOnboarding();