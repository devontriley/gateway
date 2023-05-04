<?php
$productCategories = get_sub_field ( 'product_categories' );
?>

<div class="container-lg">
    <div class="row">
        <div class="header text-center col-sm-10 offset-sm-1 col-md-4 col-lg-12 offset-lg-0">
            <<?php echo $headerSize ?>>
                <?php echo $header ?>
            </<?php echo $headerSize ?>>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
            <?php if ( $productCategories ) : ?>
                <div class="row">
                    <?php foreach ( $productCategories as $row ) :
                        $category = $row['term']; ?>
                        <div class="grid col-6 col-md-4 col-xl-3">
                            <?php include( 'product-categories-card.php' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>You must select at least one product category</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php unset( $productCategories ); ?>
