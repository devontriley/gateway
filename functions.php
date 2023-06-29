<?php

// Enable GA4 tracking
function enableGA4() { ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SLX3XSGZ9W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-SLX3XSGZ9W');
    </script>
<?php }
add_action( 'wp_head', 'enableGA4', -100 );

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
add_action( 'wp_enqueue_scripts', 'gateway_scripts' );

include( 'inc/woocommerce.php' );