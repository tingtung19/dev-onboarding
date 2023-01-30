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

		// Fungsi ajax pada admin
		// add_action('wp_ajax_wp_test_admin_ajax', [$this, 'wp_test_admin_ajax_response']);
		// Buat contoh halaman admin
		// add_action('admin_menu', [$this, 'wp_testing_admin_ajax_page']);
		// Fungsi script javascript pada admin footer menggunakan hook suffix
		// add_action('admin_footer-toplevel_page_admin-ajax', [$this, 'wp_testing_admin_ajax_script']);

		add_action('admin_footer-toplevel_page_users-menu', [$this, 'wp_search_users_ajax_script']);
		add_action('wp_ajax_wp_getdata_user', [$this, 'wp_get_data_user_where']);
		add_action('wp_ajax_nopriv_wp_getdata_user', [$this, 'wp_get_data_user_where']);


		//ajax show post
		add_action('wp_ajax_wp_getdata_user', [$this, 'data_post']);
		add_action('wp_ajax_nopriv_wp_getdata_user', [$this, 'data_post']);
		
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

	
	/*
	Plugin Name: WP Testing Admin AJAX
	Plugin URI: https://www.dhimaskirana.com/
	Description: Testing AJAX pada wp-admin dashboard
	Author: Dhimas Kirana
	Version: 1.0
	Author URI: https://www.dhimaskirana.com/
	*/

	
	public function wp_testing_admin_ajax_page() {
		add_menu_page('Admin AJAX', 'Admin AJAX', 'manage_options', 'admin-ajax', 'wp_testing_admin_ajax_content', 'dashicons-chart-pie', 2);
	}

	

	
	public function wp_testing_admin_ajax_script() { ?>
		<script>
			jQuery(document).on('click', '#info-email', function() {
				jQuery.ajax({
					url: ajaxurl, // secara otomatis menuju admin-ajax.php
					type: 'GET', // Ubah mau ajax GET/POST
					data: {
						'action': 'wp_test_admin_ajax'
					},
					beforeSend: function() {
						jQuery('.spinner').addClass('is-active');
					},
					complete: function() {
						jQuery('.spinner').removeClass('is-active');
					},
					success: function(response) {
						alert(response);
						console.log(response);
					}
				});
			});
		</script>
	<?php }


	public function wp_search_users_ajax_script() { ?>
		<script>
			jQuery(document).on('click', '#btnSearch', function() {				
				var name = jQuery('#search_name').val();
				jQuery.ajax({
					url: ajaxurl, // secara otomatis menuju admin-ajax.php
					type: 'GET', // Ubah mau ajax GET/POST
					data: {
						'action' : 'wp_getdata_user',
						'name': name
					},
					beforeSend: function() {
						jQuery('.spinner').addClass('is-active');
					},
					complete: function() {
						jQuery('.spinner').removeClass('is-active');
					},
					success: function(response) {
						// alert(response);
						// console.log(response);

						$('#data_user').append(response);
					}
				});
			});
		</script>
	<?php }
	
	public function wp_test_admin_ajax_response  () {
		echo get_bloginfo('admin_email');
		echo "halo ini ajax dari get";
		wp_die();
	}


	function wp_get_data_user_where (){
		global $wpdb;
		$name = $_GET['name'];
		$sql="select * from wp_users where user_login='wawan' order by user_registered asc";
		$query = $wpdb->get_results($sql);
		// echo "halo";
		foreach($query as $data){
			?>
			<tr>
				<td><?=$no;?></td>
				<td><?=$data->user_login;?></td>
				<td><?=$data->user_email;?></td>
				<td>xxxxxxx</td>
				<td>
					<a class="button" href="<?= admin_url().'admin.php?page=users-add&act=edit&id='.$data->ID?>">Edit</a> 
					<a class="button" href="<?= admin_url().'admin.php?page=users-menu&act=delete&id='.$data->ID?>">Delete</a></td>
			</tr>
			<?php
				$no++;
		}

	}

	function data_post(){
		$the_query = new WP_Query(array('post_per_page'=>10));
		if ($the_query->have_posts()) {
			while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<p><?php the_content(); ?></p>
			<?php endwhile;
			wp_reset_postdata();

		}
		die();

	}
	
	
	
}

new CustomFunctionOnboarding();