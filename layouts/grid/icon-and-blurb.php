<div class="container-lg">

    <div class="row">
        <?php if ( $columns === 'Four' ) : ?>
        <div class="header col-sm-10 offset-sm-1 col-md-6 offset-lg-0">
        <?php elseif ( $columns === 'Three' ) : ?>
        <div class="header col-sm-10 offset-sm-1 col-md-6 offset-lg-2">
        <?php elseif ( $columns === 'Two' ) : ?>
        <div class="header col-sm-10 offset-sm-1 col-md-6 offset-lg-2">
        <?php endif; ?>
            <<?php echo $headerSize ?>>
                <?php echo $header ?>
            </<?php echo $headerSize ?>>
        </div>
    </div>

    <?php if ( $columns === 'Four' ) : ?>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $cards as $key => $card ) : ?>
                        <div class="grid col-sm-6 col-md-4 col-lg-3">
                            <?php include( 'icon-and-blurb-card.php'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <?php elseif ( $columns === 'Three' ) : ?>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">
                <div class="row">
                    <?php foreach ( $cards as $key => $card ) : ?>
                        <div class="grid col-sm-6 col-md-4">
                            <?php include( 'icon-and-blurb-card.php'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <?php elseif ( $columns === 'Two' ) : ?>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">
                <div class="row">
                    <?php foreach ( $cards as $key => $card ) : ?>
                        <div class="grid col-sm-6 col-md-4 col-lg-6">
                            <?php include( 'icon-and-blurb-card.php'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>
