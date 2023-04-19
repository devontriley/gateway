<?php

/*
 * Create product array for gtag event
 */

function create_gtag_product( $cartTotal, $products ) {
    return array(
        'currency' => 'USD',
        'value' => $cartTotal,
        'items' => $products
    );
}

/*
 * Send gtag GA4 "add_to_cart" event when product is added to cart from PDP
 */

function custom_add_to_cart() {
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

/*
 * Send gtag GA4 "purchase" event on successful purchase
 * Documentation: https://developers.google.com/analytics/devguides/collection/ga4/ecommerce?client_type=gtag#make_a_purchase_or_issue_a_refund
 */
function create_gtag_order( $order_id ) {
    $order = wc_get_order( $order_id );
    $total = $order->get_total();
    $currency = get_woocommerce_currency();
    $discountTotal = $order->get_discount_total();
    $shippingTotal = $order->get_shipping_total();
    $taxTotal = $order->get_total_tax();
    $coupons = $order->get_coupon_codes();
    $items = $order->get_items();

    $data = array(
        'transaction_id' => $order_id,
        'value' => floatval( $total ),
        'tax' => floatval( $taxTotal ),
        'shipping' => floatval( $shippingTotal ),
        'currency' => $currency
    );

    if ( $coupons ) {
//        $data['coupon'] = implode( ',', $coupons );
    }

    if ( $items ) {
        $ga4Items = array_map(function($item) {
            return array(
                'item_id' => "SKU_12345",
                'item_name' => "Stan and Friends Tee",
                'coupon' => '',
                'discount' => '',
                'item_category' => "Apparel",
                'price' => 9.99,
                'quantity' => 1
            );
        }, $items);

//        $data['items'] = $ga4Items;
    }

    return $data;
}

function gateway_payment_complete( $order_id ){
    $gtag_order = create_gtag_order( $order_id ); ?>
        <script type="text/javascript">
            console.log(JSON.parse('<?php echo json_encode( $gtag_order ); ?>'));
        </script>
<?php }
add_action( 'woocommerce_thankyou', 'gateway_payment_complete' );