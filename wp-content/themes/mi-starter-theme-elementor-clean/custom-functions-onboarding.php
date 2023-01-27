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
		add_action('in_admin_footer',  [$this,'add_this_script_footer']);
		add_action( 'wp_ajax_example_ajax_request', [$this,'example_ajax_request'] );
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

	// This would normally be enqueued as a file, but for the sake of ease we will just print to the footer
	public function add_this_script_footer(){ ?>

		<script>
		jQuery(document).ready(function($) {
		
			var fruit = 'Banana';
		
			$.ajax({
				url: ajaxurl, 
				data: {
					'action':'example_ajax_request', // This is our PHP function below
					'fruit' : fruit // This is the variable we are sending via AJAX
				},
				success:function(data) {
					window.alert("sukses" + data);
				},
				error: function(errorThrown){
					window.alert(errorThrown);
				}
			});
		
		});
		</script>

	<?php }

	public function example_ajax_request() {

		if ( isset($_REQUEST) ) {

			$fruit = $_REQUEST['fruit'];

			if ( $fruit == 'Banana' ) {
				$fruit = 'Apple';
			}

			echo $fruit;
		}

	die();
	}
	
	
	
}

new CustomFunctionOnboarding();