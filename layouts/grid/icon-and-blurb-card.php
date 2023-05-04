<!-- Icon -->
<?php if ( $card['image'] ) : ?>
    <?php echo wp_get_attachment_image( $card['image']['ID'], 'thumbnail', '', false ) ?>
<?php endif; ?>
<!-- Header -->
<?php if( $card['card_header'] ) : ?>
    <h3><?php echo $card['card_header'] ?></h3>
<?php endif; ?>
<!-- Body -->
<?php if ( $card['card_body'] ) : ?>
    <?php echo apply_filters( 'the_content', $card['card_body'] ) ?>
<?php endif; ?>
<!-- Text link -->
<?php if ( $card['text_link'] ) : ?>
    <a href="<?php echo $card['text_link']['url'] ?>" target="<?php echo $card['text_link']['target'] ?>">
        <?php echo $card['text_link']['title'] ?>
    </a>
<?php endif; ?>