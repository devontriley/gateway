<div class="card">
    <?php if ( $card['text_link'] ) : ?>
        <a href="<?php echo $card['text_link']['url'] ?>" target="<?php echo $card['text_link']['target'] ?>" class="cover-link"></a>
    <?php endif; ?>
    <!-- Image -->
    <?php if ( $card['image'] ) : ?>
        <div class="card-img-top">
            <?php echo wp_get_attachment_image( $card['image']['ID'], 'full' ) ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <!-- Header -->
        <?php if( $card['card_header'] ) : ?>
            <h3 class="card-title"><?php echo $card['card_header'] ?></h3>
        <?php endif; ?>
        <!-- Body -->
        <?php if ( $card['card_body'] ) : ?>
            <?php echo apply_filters( 'the_content', $card['card_body'] ) ?>
        <?php endif; ?>
    </div>
</div>