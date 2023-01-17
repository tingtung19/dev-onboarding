<?php
/**
 * The template for Create Custom Ajax used in WP-admin
 *
 * Author: Andi, Muhammad Rizki, Angit Joko Tarup
 *
 * Note :
 *
 * @package HelloElementor
 */
defined( 'ABSPATH' ) || die( "Can't access directly" );

class AjaxExample1 extends SanitizeAndValidate{

	private $_data = array(
		'nonce' => false,
		'data'  => null,
		'tes_parsing_data' => null
	);

	public function __construct()
	{
		add_action('wp_ajax_ExampleAction1', [$this, 'ajax']);
		add_action('wp_ajax_nopriv_ExampleAction1', [$this, 'ajax']);
	}

	public function ajax()
	{
		$this->_data = $this->_sanitize($this->_data,$_POST);
		$this->_validate($_POST,'NonceExampleAction1'); // nonce name must exactly the same as in enqueue in file script.php
		$this->_response();
	}

	private function _response()
	{
		wp_send_json_success($this->_data);
	}
}
new AjaxExample1();


