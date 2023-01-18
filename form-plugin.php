<?php
/**
 * Plugin Name:       Form Plugin
 * Description:       Training Plugin
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Parsa
 * Text Domain:       formplugin
 */

 add_action( 'admin_enqueue_scripts', 'formplugin_admin_enqueue_scripts' );
 add_action( 'admin_menu', 'fp_init_menu' );

 function fp_init_menu() {
    add_menu_page( __( 'Form Plugin', 'formplugin'),  __( 'Form Plugin', 'formplugin'), 'manage_options', 'formplugin', 'formplugin_admin_page', 'dashicons-admin-post' );
    }
    function formplugin_admin_page() {
        require_once plugin_dir_path( __FILE__ ) . 'templates/app.php';
    }
 /**
  * Enqueue scripts and styles.
  *
  * @return void
  */
 function formplugin_admin_enqueue_scripts() {
     wp_enqueue_style( 'formplugin-style', plugin_dir_url( __FILE__ ) . 'build/index.css' );
     wp_enqueue_script( 'formplugin-script', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-element' ), '1.0.0', true );
     wp_localize_script( 'formplugin', 'appLocalizer', [
        'apiUrl' => home_url( '/wp-json' ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
    ] );
 }

require_once plugin_dir_path(__FILE__) . 'templates/create-route-settings.php';