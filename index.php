<?php
/**
 * Plugin Name:       Base Gutenberg Block
 * Plugin URI:        https://sarahjobs.com/wordpress/plugins/base-block
 * Description:       Displays the anatomy of a gutenberg block project and also can used as base to you start build your own block
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Sarah Siqueira
 * Author URI:        https://sarahjobs.com/about
 * License:           MIT
 * License URI:       https://opensource.org/license/mit/
 * Text Domain:       base-block
 * Domain Path:       /languages
 * Update URI:        https://sarahjobs.com/wordpress/plugins/base-block/update
 *
 * @package base-gutenberg-block
 */

defined( 'ABSPATH' ) || exit;

new Base_Block();

class Base_Block {

    /**
     * Hooks
     */
	public function __construct() {
		add_action( 'init', array( $this, 'base_gutenberg_register' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'base_gutenberg_enqueues' ) );
		add_filter( 'block_categories_all', array( $this, 'register_new_category' ), 10, 2 );
	}

	/**
	 * Register Block
	 */
	public function base_gutenberg_register() {
		register_block_type( __DIR__ );
	}

	/**
	 * Enqueues
	 */
	public function base_gutenberg_enqueues() {
		wp_enqueue_script(
			'base-block',
			plugin_dir_url( __FILE__ ) . '.build/index.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-editor' )
		);

		wp_enqueue_style(
			'base-block',
			plugin_dir_url( __FILE__ ) . '.src/style/main.css',
			array(),
		);
	}

	/**
	 * Register custom category
	 */
	public function register_new_category( $categories ) {
		$categories[] = array(
			'slug'  => 'custom-category',
			'title' => 'Custom Category',
		);

		return $categories;
	}
}
