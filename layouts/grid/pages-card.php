<?php
// $article variable must exist for this module to function properly
$pageID = $page->ID;
$pageTitle = $page->post_title;
$fImage = wp_get_attachment_image( get_post_thumbnail_id( $pageID ), 'full', false, array( 'sizes' => '(max-width: 575px) 100vw, (min-width: 576px) and (max-width: 992px) 50vw, 33vw' ) );
$featuredImage = get_the_post_thumbnail( $pageID );
?>

<div class="card">
    <?php if ( $page ) : ?>
        <a href="<?php echo get_permalink( $pageID ); ?>" target="" class="cover-link"></a>
    <?php endif; ?>
    <div class="image">
        <?php if ( $fImage ) : ?>
            <?php echo $fImage ?>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <?php if( $pageTitle ) : ?>
            <h3 class="card-title"><?php echo $pageTitle ?></h3>
        <?php endif; ?>
    </div>
</div>

<?php unset( $pageID, $pageTitle, $fImage, $featuredImage ); ?>