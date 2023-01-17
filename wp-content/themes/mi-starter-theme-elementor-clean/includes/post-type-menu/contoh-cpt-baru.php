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
		add_filter('the_content', [$this, 'xai_my_class']);

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
		// $slug_tax = 'kategori-menu';
		// $args = [
		// 	'label' => __('Kategori Menu'),
		// ];
		// $this->taxonomy($slug_cpt, $slug_tax, $args);
	}

	public function xai_my_class($content)
	{
		var_dump($content);
		die;
		// //Replace the instance with the Class/ID markup.
		// $string = '<ul'; //your tag
		// $replace = '<ul class="detail-list"'; //add your class/id and tag
		// $content = str_replace( $string, $replace, $content );
		// return $content;
	}

}

// initialize
new ContohMenu();