<?php

function create_gtag_product( $cartTotal, $products ) {

    return array(
        'currency' => 'USD',
        'value' => $cartTotal,
        'items' => $products
    );
}

function custom_add_to_cart() {
    global $woocommerce;

    $cartProducts = array();

    // Loop over $cart items
    foreach ( WC()->cart->get_cart_contents() as $cart_item_key => $cart_item ) {
        $product = wc_get_product( $cart_item['product_id'] );

        $gtag_product_array = array(
            'item_id' => strval( $product->id ),
            'item_name' => $product->name,
            'price' => floatval( $product->price ),
            'quantity' => $cart_item['quantity']
        );

        // Add categories
        foreach( $product->category_ids as $index => $catID ) {
            $term = get_term_by( 'id', $catID, 'product_cat' );
            if ( $index === 0 ) {
                $gtag_product_array['item_category'] = $term->name;
            } else {
                $gtag_product_array['item_category'.$index] = $term->name;
            }
        }

        array_push( $cartProducts, $gtag_product_array );
    }

    $gtag_product = create_gtag_product( WC()->cart->total, $cartProducts );
    ?>

    <script type="text/javascript">
        window.addEventListener( 'load', function() {
            gtag("event", "add_to_cart", <?php echo json_encode( $gtag_product ); ?> );
            console.log('add to cart fired')
        })
    </script>

<?php }
add_action('woocommerce_add_to_cart', 'custom_add_to_cart');