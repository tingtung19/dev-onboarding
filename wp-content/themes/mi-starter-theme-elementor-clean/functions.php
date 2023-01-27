<?php

/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if (!defined("ABSPATH")) {
	exit(); // Exit if accessed directly.
}

define("HELLO_ELEMENTOR_VERSION", "2.4.1");


if (!isset($content_width)) {
	$content_width = 800; // Pixels.
}

if (!function_exists("hello_elementor_setup")) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup()
	{
		if (is_admin()) {
			hello_maybe_update_theme_version_in_db();
		}

		$hook_result = apply_filters_deprecated(
			"elementor_hello_theme_load_textdomain",
			[true],
			"2.0",
			"hello_elementor_load_textdomain"
		);
		if (apply_filters("hello_elementor_load_textdomain", $hook_result)) {
			load_theme_textdomain("hello-elementor", get_template_directory() . "/languages");
		}

		$hook_result = apply_filters_deprecated(
			"elementor_hello_theme_register_menus",
			[true],
			"2.0",
			"hello_elementor_register_menus"
		);
		if (apply_filters("hello_elementor_register_menus", $hook_result)) {
			register_nav_menus(["menu-1" => __("Header", "hello-elementor")]);
			register_nav_menus(["menu-2" => __("Footer", "hello-elementor")]);
		}

		$hook_result = apply_filters_deprecated(
			"elementor_hello_theme_add_theme_support",
			[true],
			"2.0",
			"hello_elementor_add_theme_support"
		);
		if (apply_filters("hello_elementor_add_theme_support", $hook_result)) {
			add_theme_support("post-thumbnails");
			add_theme_support("automatic-feed-links");
			add_theme_support("title-tag");
			add_theme_support("html5", ["search-form", "comment-form", "comment-list", "gallery", "caption"]);
			add_theme_support("custom-logo", [
				"height" => 100,
				"width" => 350,
				"flex-height" => true,
				"flex-width" => true,
			]);

			/*
			 * Editor Style.
			 */
			add_editor_style("classic-editor.css");

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support("align-wide");

			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated(
				"elementor_hello_theme_add_woocommerce_support",
				[true],
				"2.0",
				"hello_elementor_add_woocommerce_support"
			);
			if (apply_filters("hello_elementor_add_woocommerce_support", $hook_result)) {
				// WooCommerce in general.
				add_theme_support("woocommerce");
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support("wc-product-gallery-zoom");
				// lightbox.
				add_theme_support("wc-product-gallery-lightbox");
				// swipe.
				add_theme_support("wc-product-gallery-slider");
			}
		}
	}
}
add_action("after_setup_theme", "hello_elementor_setup");

function hello_maybe_update_theme_version_in_db()
{
	$theme_version_option_name = "hello_theme_version";
	// The theme version saved in the database.
	$hello_theme_db_version = get_option($theme_version_option_name);

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if (!$hello_theme_db_version || version_compare($hello_theme_db_version, HELLO_ELEMENTOR_VERSION, "<")) {
		update_option($theme_version_option_name, HELLO_ELEMENTOR_VERSION);
	}
}

if (!function_exists("hello_elementor_scripts_styles")) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles()
	{
		$enqueue_basic_style = apply_filters_deprecated(
			"elementor_hello_theme_enqueue_style",
			[true],
			"2.0",
			"hello_elementor_enqueue_style"
		);
		$min_suffix = defined("SCRIPT_DEBUG") && SCRIPT_DEBUG ? "" : ".min";

		if (apply_filters("hello_elementor_enqueue_style", $enqueue_basic_style)) {
			wp_enqueue_style(
				"hello-elementor",
				get_template_directory_uri() . "/style" . $min_suffix . ".css",
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if (apply_filters("hello_elementor_enqueue_theme_style", true)) {
			wp_enqueue_style(
				"hello-elementor-theme-style",
				get_template_directory_uri() . "/theme" . $min_suffix . ".css",
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action("wp_enqueue_scripts", "hello_elementor_scripts_styles");

if (!function_exists("hello_elementor_register_elementor_locations")) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations($elementor_theme_manager)
	{
		$hook_result = apply_filters_deprecated(
			"elementor_hello_theme_register_elementor_locations",
			[true],
			"2.0",
			"hello_elementor_register_elementor_locations"
		);
		if (apply_filters("hello_elementor_register_elementor_locations", $hook_result)) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action("elementor/theme/register_locations", "hello_elementor_register_elementor_locations");

if (!function_exists("hello_elementor_content_width")) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width()
	{
		$GLOBALS["content_width"] = apply_filters("hello_elementor_content_width", 800);
	}
}
add_action("after_setup_theme", "hello_elementor_content_width", 0);

if (is_admin()) {
	require get_template_directory() . "/includes/admin-functions.php";
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
 */

// Allow active/inactive via the Experiments
require get_template_directory() . "/includes/elementor-functions.php";

/**
 * Include customizer registration functions
 */
function hello_register_customizer_functions()
{
	if (hello_header_footer_experiment_active() && is_customize_preview()) {
		require get_template_directory() . "/includes/customizer-functions.php";
	}
}
add_action("init", "hello_register_customizer_functions");

if (!function_exists("hello_elementor_check_hide_title")) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title($val)
	{
		if (defined("ELEMENTOR_VERSION")) {
			$current_doc = Elementor\Plugin::instance()->documents->get(get_the_ID());
			if ($current_doc && "yes" === $current_doc->get_settings("hide_title")) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter("hello_elementor_page_title", "hello_elementor_check_hide_title");

/**
 * Wrapper function to deal with backwards compatibility.
 */
if (!function_exists("hello_elementor_body_open")) {
	function hello_elementor_body_open()
	{
		if (function_exists("wp_body_open")) {
			wp_body_open();
		} else {
			do_action("wp_body_open");
		}
	}
}

/**
 * DON'T CHANGE THE CODE ABOVE!
 */

/**
 * Initiate Custom Functions : CustomFunction()
 */
require_once __DIR__ . '/custom-functions.php';

require_once __DIR__ . '/custom-functions-onboarding.php';

define('IS_LOCAL', true);



function users_page() {
	$current_user = wp_get_current_user();
	if (isset($_GET['act'])) {
		$id = isset($_GET['id']) ? $_GET['id'] : '' ;
		$del = wp_delete_user($id);
		if ($del) {
			echo "User Delete successfully.";
		}
	}
	?>
			<h1>			
				<?php esc_html_e( 'Welcome '.$current_user->user_login.' to Users Add Page (Custom).', 'my-plugin-textdomain' ); ?>
				<a class="button" href="<?=admin_url().'admin.php?page=users-add' ?>">New User</a>
			</h1>
			<label>Search</label><input type="text" id="search_name" class="search_name"><button id="btnSearch">Seacrh</button>			
			<span class="spinner" style="float:none;"></span>
			
			<div class="row">
				<table style="width:100%; border: 1px;">
					<head>
						<tr>
							<th>ID</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</head>
					<body>
						<?php
							$no=1;
							$show_users = showUsers();

							foreach($show_users as $data){

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
						?>
					</body>
					
					

				</table>
			</div>
		
	<?php
}

function users_add_page() {
	
	$id = isset($_GET['id']) ? $_GET['id'] : '' ;
	if (isset($_POST['submit'])) {
		$username = isset($_POST['user_name']) ? $_POST['user_name'] : '' ;
		$password = isset($_POST['user_password']) ? $_POST['user_password'] : '' ;
		$email = isset($_POST['user_email']) ? $_POST['user_email'] : '' ;

		if (isset($_GET['act'])) {  //Update proccess
			 
			$userdata = array(
				'user_login'    =>   $username,
				'user_email'    =>   $email,
			);
			$id_array = array('ID'=>   $id);
			$user_update = updateDataUsers( $userdata, $id_array );
			if($user_update) {
				echo "User Edited successfully.";
			}else{
				echo "Error: Gagal.";
			}	

		}else{  //add user
			wp_create_user_custom($username, $password,$email );
		}
		
	}
	$show_user = getDataUsers($id);	
	$current_user = wp_get_current_user();

	?>
			<h1>			
				<?php esc_html_e( 'Welcome '.$current_user->user_login.' to Users Page (Custom).', 'my-plugin-textdomain' ); ?>
				
			</h1>
			<div class="row">
				<form method="POST" action="#">
				<table style="width:50%; border: 1px;">
					<head>
						<tr>
							<td>User Name</td>
							<td>:</td>
							<td><input type="text" name="user_name" value="<?=isset($show_user->user_login) ?  $show_user->user_login : '' ?>"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="text" name="user_email" value="<?=isset($show_user->user_email) ?  $show_user->user_email : '' ?>"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="password" name="user_password" value="<?=isset($show_user->user_pass) ?  $show_user->user_pass : '' ?>"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><input type="submit" class="button" name="submit"></td>
						</tr>
					</head>
				</table>
				</form>
				
			</div>
		
	<?php
}

function showUsers(){
	global $wpdb;

	$sql="select * from wp_users order by user_registered asc";
	$query = $wpdb->get_results($sql);
	
	return $query;

}

function getDataUsers($id){
	global $wpdb;

	$sql="select * from wp_users where ID=$id";
	$query = $wpdb->get_row($sql);
	
	return $query;

}

function updateDataUsers($data=array(),$id=array()){
	global $wpdb;
	$query = $wpdb->update('wp_users', $data,$id );
	
	return $query; 

}

function wp_create_user_custom($username, $password,$email ){
	$user_id = username_exists( $username );
	if ( !$user_id and email_exists($email) == false ) {
		$user_id = wp_create_user( $username, $password, $email );
		if( !is_wp_error($user_id) ) {
			// User created successfully
			echo "User created successfully.";
		}
	} else {
		// Error: username or email already exists
		echo "Error: username or email already exists.";
	}

}
// adding metabox into custom page

function wporg_add_custom_box() {
	// $screens = ['post','employees-menu','employees_page'];
	$screens = ['post'];
	
	add_meta_box(
		'wporg_box_id',                 // Unique ID
		'Custom Meta Box Title',      // Box title
		'wporg_custom_box_html',  // Content callback, must be of type callable
		['post','employees-menu','contoh-cpt','post-menu','page','options-general','contoh-taxonomy' ]                      // Post type
	);

}

function wporg_custom_box_html( $post ) {
	?>
	<table>
	<tr>
		<td><label for="wporg_field">Name </label></td>
		<td>:</td>
		<td><input type="text" name="wporg_name" id="wporg_name" class="postbox"></td>
	</tr>
	<tr>
		<td><label for="wporg_field">Category </label></td>
		<td>:</td>
		<td>
			<select name="wporg_category" id="wporg_category" class="postbox">
				<option value="">Select something...</option>
				<option value="something">Something</option>
				<option value="else">Else</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<?php 
				$current_screen = get_current_screen();
				print_r($current_screen); ?>
		</td>
	</tr>
	</table>	
	
	<?php
}


// add_action( 'add_meta_boxes', 'wporg_add_custom_box' );

// add_action('current_screen', 'detecting_current_screen');

function detecting_current_screen()
{
  $current_screen = get_current_screen();

  print_r($current_screen);
}

// add_action( 'admin_menu', 'wp_create_user_custom' );

function redirect_to_custom_login_page(){
    wp_redirect(site_url()."/login");
    exit;

}

add_action("wp_logout","redirect_to_custom_login_page");

function redirect_wp_admin(){
    global $pagenow;
    if ($pagenow =="wp-login.php" && $_GET['action'] != "logout") {
        wp_redirect(home_url()."/login");
        exit;
    }
 }

// add_action("init", "redirect_wp_admin");


// Fungsi halaman
function wp_testing_admin_ajax_content() {
	global $hook_suffix;
?>

	<div class="wrap">
		<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
		<hr>
		<p><strong>Hook Suffix:</strong> : <?php echo $hook_suffix; ?></p>
		<p>Ketika tombol di klik, maka akan melakukan request AJAX untuk mendapatkan info email administrator website.</p>
		<button id="info-email" class="button">Info Email Admin Website</button>
		<span class="spinner" style="float:none;"></span>
	</div>

<?php }



