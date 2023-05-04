<div class="card">
    <?php if ( $card['text_link'] ) : ?>
        <a href="<?php echo $card['text_link']['url'] ?>" target="_blank" class="cover-link"></a>
    <?php endif; ?>
    <div class="card-body">
        <!-- Header -->
        <?php if ( $card['card_header'] ) : ?>
            <h3 class="card-title"><?php echo $card['card_header'] ?></h3>
        <?php endif; ?>
        <!-- Card body -->
        <?php if ( $card['card_body'] ) : ?>
            <p class="mb-0"><?php echo $card['card_body'] ?></p>
        <?php endif; ?>
    </div>
</div>