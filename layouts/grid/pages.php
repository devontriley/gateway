<?php
$centerHeader = get_sub_field( 'center_header' );
$pages = get_sub_field( 'pages' );
?>

<div class="container-lg">
    <?php if ( $header || $bodyCopy ) : ?>
        <div class="row">
            <div class="header col-sm-10 offset-sm-1 col-lg-12 offset-lg-0 <?php if ( $centerHeader ) { echo 'text-center'; } ?>">
                <?php if ( $header ) : ?>
                    <<?php echo $headerSize ?>>
                        <?php echo $header ?>
                    </<?php echo $headerSize ?>>
                <?php endif; ?>
                <?php if ( $bodyCopy ) : ?>
                    <div class="col-lg-6 <?php if ( $centerHeader ) { echo 'offset-lg-3'; } ?>">
                        <?php echo $bodyCopy ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
            <div class="row">
                <?php foreach ( $pages as $key => $page ) : ?>
                    <div class="grid col-sm-6 col-md-6 col-lg-4">
                        <?php include('pages-card.php') ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php unset( $centerHeader, $pages, $headerSize, $header ); ?>