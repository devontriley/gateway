<?php

if (!function_exists('gateway_enqueue_styles')) :
    function gateway_enqueue_styles() {
        wp_enqueue_style( 'gateway-style', get_stylesheet_uri(), array( 'heretic-style' ), filemtime(get_stylesheet_directory() . '/style.css') );
    }
endif;
add_action( 'wp_enqueue_scripts', 'gateway_enqueue_styles' );

// Register scripts
if (!function_exists('gateway_scripts')) :
    function gateway_scripts() {
        wp_enqueue_script( 'gateway-script', get_site_url().'/wp-content/themes/gateway/main.js', array('jquery'), filemtime(get_stylesheet_directory() . '/main.js'), true );
    }
endif;
//add_action( 'wp_enqueue_scripts', 'gateway_scripts' );

include( 'inc/woocommerce.php' );