<?php
$header = get_sub_field( 'header' );
$headerSize = get_sub_field( 'header_size' ) ?? 'h2';
$selectArtists = get_sub_field( 'artists' );

if ( $selectArtists) :

    $artists = get_sub_field( 'artists' );

else :

    $currentArtists = new WP_Query(array(
        'post_type' => 'artists',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'archived',
                'value' => true,
                'compare' => '!='
            )
        )
    ));
    $artists = $currentArtists->posts;
    $archivedArtists = new WP_Query(array(
        'post_type' => 'artists',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'archived',
                'value' => true,
                'compare' => '='
            )
        )
    ));

endif;
?>

<div class="container-lg">
    <?php if( $artists ) : ?>
        <div class="row">
            <div class="header text-center col-md-6 offset-md-3 col-lg-12 offset-lg-0">
                <?php if ( $selectArtists && $header ) : ?>
                    <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                <?php else : ?>
                    <h1>Current Artists</h1>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $artists as $key => $artist ) : ?>
                        <div class="grid col-6 col-sm-4 col-md-3">
                            <?php include( 'artist-profiles-card.php' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if( isset( $archivedArtists ) && $archivedArtists->found_posts ) : ?>
        <div class="row">
            <div class="header text-center col-md-6 offset-md-3 col-lg-12 offset-lg-0 mt-5">
                <h1>Archived Artists</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $archivedArtists->posts as $key => $artist ) : ?>
                        <div class="grid col-6 col-sm-4 col-md-3">
                            <?php include( 'artist-profiles-card.php' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>