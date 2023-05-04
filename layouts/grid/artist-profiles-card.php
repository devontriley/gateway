<?php
$id = $artist->ID;
$featuredImage = get_the_post_thumbnail( $id );
$permalink = get_permalink( $id );
?>

<div class="artist-card text-center position-relative">
    <a href="<?php echo $permalink ?>">
        <!-- Image -->
        <?php if ( $featuredImage ) : ?>
            <?php echo $featuredImage ?>
        <?php endif; ?>
        <!-- Header -->
        <?php if( $artist->post_title ) : ?>
            <h3 class="artist-name"><?php echo $artist->post_title ?></h3>
        <?php endif; ?>
    </a>
</div>