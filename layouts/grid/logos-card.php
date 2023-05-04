<div class="card">
    <div class="card-body">
        <!-- Logo -->
        <?php if ( $card['image'] ) : ?>
            <?php echo wp_get_attachment_image( $card['image']['ID'], 'full', '', false ) ?>
        <?php endif; ?>
    </div>
</div>