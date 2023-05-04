<?php
$centerHeader = get_sub_field( 'center_header' );
$showArticlesButton = get_sub_field( 'show_articles_button' );
$articleCount = get_sub_field( 'article_count' );
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

    <?php
    $posts = new WP_Query(array(
        'post_type' => 'services',
        'posts_per_page' => $articleCount ?: 3
    ));

    if ( $posts->found_posts ) : ?>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $posts->posts as $key => $p ) : ?>
                        <div class="grid col-sm-6 col-md-6 col-lg-4">
                            <?php include('articles-card.php') ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php if ( $showArticlesButton ) : ?>
            <div class="text-center">
                <a href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-primary">See all posts</a>
            </div>
        <?php endif; ?>

    <?php endif; ?>
</div>