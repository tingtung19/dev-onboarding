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
	

	
	
}

new CustomFunctionOnboarding();