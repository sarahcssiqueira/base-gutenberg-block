<?php
/**
 * Plugin Name:       Basic Static Block
 * Author:            Sarah Siqueira
 * Description:       Boilerplate to create a static Gutenberg block
 * Version:           0.2.0
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * License:           ''
 * License URI:       ''
 * Text Domain:       basic gutenberg block
 * 
 */


/** Exit if accessed directly **/
if( ! defined( 'ABSPATH' ) ) exit;

new Basic_Block (); // Initialize

    class Basic_Block {

        public function __construct() {
            add_action( 'init', [ $this, 'basic_block_register' ] );
            add_action( 'enqueue_block_editor_assets', [ $this, 'basic_block_enqueues' ] );
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

}

?>