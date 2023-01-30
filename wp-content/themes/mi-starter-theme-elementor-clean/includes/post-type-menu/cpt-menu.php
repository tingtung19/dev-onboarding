<?php
/**
 * The template for Create Custom Post Type - Laten Beleggen used in WP-admin
 *
 * Author: Andi Gustanto and Muhammad Rizki
 *
 * @package HelloElementor
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

class ContohMenu extends RegisterMenu{

	public function __construct()
	{

		add_action('init',  [$this, 'exampleCreatCPT']);
		add_action('add_meta_boxes', [$this, 'create_meta_box']);
		if (isset($_POST['publish'])) {
			add_action('save_post', [$this, 'save_editor']);
		}
		

	}

	public function save_editor( $post_id){
		if (isset($_POST['wpc_post_editor'])) {
			$editor_id = sanitize_text_field($_POST['wpc_post_editor']);
			update_post_meta($post_id, 'wpc_post_editor', $editor_id);
		}
	}

	public function create_meta_box(){
        // add_meta_box('wpc_editor','Post Editor', [$this, 'meta_box_html']);

    }

	public function meta_box_html(){
        echo '<input type="text" name="wpc_post_editor" id="post_editor" placeholder="Type the post editor"';
		echo 'value="'.get_post_meta(get_the_ID(), "wpc_post_editor", true).'"';
		echo '>';
	}

	

	public function exampleCreatCPT() {

		// argument cpt
		$title = 'Post Menu';
		$slug_cpt = 'post-menu';
		$args = [
			'menu_position' => 6,
		];
		$this->customPostType($title, $slug_cpt, $args);

		// args taxonomy
		$slug_tax = 'kategori-menu';
		$args = [
			'label' => __('Kategori Menu'),
		];
		$this->taxonomy($slug_cpt, $slug_tax, $args);
	}

	

}

// initialize
new ContohMenu();