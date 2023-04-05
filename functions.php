<?php

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