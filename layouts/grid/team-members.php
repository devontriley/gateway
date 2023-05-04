<?php
$teamMembers = get_sub_field('team_members');
?>

<div class="container-lg">
    <?php if ( $header || $bodyCopy ) : ?>
        <div class="row">
            <div class="header col-sm-10 offset-sm-1 col-md-6 <?php echo ( in_array( $columns, array( 'Three', 'Four' ) ) ) ? 'col-lg-6 offset-lg-0' : 'col-lg-6 offset-lg-2'; ?>">
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

    <?php if( $teamMembers ) : ?>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 <?php echo ( in_array( $columns, array( 'Three', 'Four' ) ) ) ? 'col-lg-12 offset-lg-0' : 'col-lg-8 offset-lg-2'; ?>">
                <div class="row">
                    <?php foreach ( $teamMembers as $key => $teamMember ) : ?>
                        <div class="grid col-sm-6 <?php echo ( in_array( $columns, array( 'Three', 'Four' ) ) ) ? 'col-lg-3' : 'col-lg-6'; ?>">
                            <?php include( 'team-members-card.php' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>