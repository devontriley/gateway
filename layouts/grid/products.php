<?php
$products = get_sub_field('products');
?>

<div class="container-lg">
    <?php if ( $header ) : ?>
        <div class="row">
            <div class="header text-center col-sm-10 offset-sm-1 col-md-4 col-lg-12 offset-lg-0">
                <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
            </div>
        </div>
    <?php endif; ?>

    <?php if( $products ) : ?>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $products as $key => $prod ) :
                        $product = wc_get_product( $prod->ID ); ?>
                        <div class="grid col-6 col-md-4 col-lg-3">
                            <?php include( 'products-card.php' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php unset( $products ); ?>
