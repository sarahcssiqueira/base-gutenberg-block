<?php
/**
 * Plugin Name:       Basic Block
 * Plugin URI:        https://sarahjobs.com/wp-plugins/basic-block
 * Description:       Boilerplate to create a static Gutenberg block
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Sarah Siqueira
 * Author URI:        https://sarahjobs.com/about
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl.html
 * Text Domain:       basic-block
 * Domain Path:       /languages
 * Update URI:        https://sarahjobs.com/wp-plugins/basic-block/update
 * 
 */


/** Exit if accessed directly **/
if( ! defined( 'ABSPATH' ) ) exit;

new Basic_Block (); // Initialize

    class Basic_Block {

        public function __construct() {
            add_action( 'init', [ $this, 'basic_block_register' ] );
            add_action( 'enqueue_block_editor_assets', [ $this, 'basic_block_enqueues' ] );
            add_filter( 'block_categories_all' , [$this, 'register_new_category'], 10, 2 );
        }

        /* 
        * Register Block 
        *
        */
        public function basic_block_register() {
            register_block_type(__DIR__);
        }

        /*
        * Enqueues
        *
        */
        public function basic_block_enqueues() {
            wp_enqueue_script( 
                'basic-block' ,
                plugin_dir_url(__FILE__). '.build/index.js', 
                array('wp-blocks', 'wp-i18n', 'wp-editor')
            );

            wp_enqueue_style(
                'basic-block',
                plugin_dir_url(__FILE__) . '.style/style.css',
                array(),
            );
        }

        /*
        * Register custom category
        *
        */
        public function register_new_category ($categories) {
            $categories[] = array(
                'slug'  => 'custom-category',
                'title' => 'Custom Category'
            );
        
            return $categories;

        }

    }

?>