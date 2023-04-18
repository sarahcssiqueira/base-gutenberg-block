<?php
/**
 * Plugin Name:       Basic Block
 * Author:            Sarah Siqueira
 * Description:       Boilerplate to create a Gutenberg block
 * Version:           0.2.0
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * License:           ''
 * License URI:       ''
 * Text Domain:       basic gutenberg block
 * 
 */

// Register //

function basic_block_register() {
    register_block_type(__DIR__);
}

add_action( 'init', 'basic_block_register' );

// Enqueues //

function basic_block_enqueues() {
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

add_action( 'enqueue_block_editor_assets', 'basic_block_enqueues' );


?>