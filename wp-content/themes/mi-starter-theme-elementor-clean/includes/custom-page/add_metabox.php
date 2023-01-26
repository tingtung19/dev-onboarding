<?php
/**
 * The template for Create Custom Post Type - Laten Beleggen used in WP-admin
 *
 * Author: Andi Gustanto and Muhammad Rizki
 *
 * @package HelloElementor
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

class AddMetaboxPage {

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'create_meta_box']);
    }

    public function create_meta_box(){
        add_meta_box('wp_editor','Post Editor', [$this, 'meta_box_html'], ['[post']);

    }
    
    public function meta_box_html(){
        echo "<input type='text' name='wpc_post_editor' id='post_editor' placeholder='Type the post editor dari kelas baru'>";
    }
}

new AddMetaboxPage;