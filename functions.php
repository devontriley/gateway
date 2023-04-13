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

// Enable Bughed on development
if ( wp_get_environment_type() !== 'production' ) {
    function load_bugherd() { ?>
        <!-- Bugherd -->
        <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=6ipxiwxmh49xiq8v0ohidq" async="true"></script>
    <?php }
    add_action( 'wp_head', 'load_bugherd' );
}

function gateway_enqueue_styles() {
    wp_enqueue_style( 'gateway-style', get_stylesheet_uri(), array( 'heretic-style' ), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'gateway_enqueue_styles' );