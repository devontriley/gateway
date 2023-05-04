<?php
$checkoutURL = wc_get_checkout_url();
$price = $product->get_price();
$featuredImage = wp_get_attachment_image( $product->get_image_id(), 'full' );
?>

    <div class="card">
        <!-- Image -->
        <div class="image">
            <?php if ( $featuredImage ) : ?>
                <a href="<?php echo $product->get_permalink(); ?>">
                    <?php echo $featuredImage ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <!-- Header -->
            <h3 class="card-title">
                <a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_title() ?></a>
            </h3>
            <!-- Price -->
            <p class="price"><?php echo $price ?></p>
            <!-- Add to cart button -->
            <a href="<?php echo $checkoutURL . $product->add_to_cart_url() ?>" class="btn btn-primary"><?php echo $product->add_to_cart_text() ?></a>
        </div>
    </div>

<?php
unset( $featuredImage );
?>