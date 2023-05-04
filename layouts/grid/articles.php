<?php
$postsPage = is_home();
$postSingle = is_singular( 'post' );
$showArticlesButton = get_sub_field( 'show_articles_button' );
$articleCount = get_sub_field( 'article_count' );

function getArticles ( $articleCount ) {
    global $posts, $post;

    $articles = null;

    // If we're on a post single then we're using this module to get related posts
    if ( is_singular( 'post' ) ) :

        $terms = get_the_terms( $post, 'category' );
        $taxArgs = array_map( function( $term ) {
            return array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $term->slug
            );
        }, $terms );
        $relatedPosts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__not_in' => array( $post->ID ),
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                'relation' => 'OR',
                $taxArgs
            )
        ));

        $articles = $relatedPosts->posts;

    // If posts object already exists (Posts page)
    elseif ( $posts && is_home() ) :

        $articles = $posts;

    // Otherwise query for recent posts
    else :

        $isBlogHome = is_page_template( 'page-blog-home.php' );
        $blogPosts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $articleCount ?: 3
        ));
        $articles = $blogPosts->posts;

    endif;

    return $articles;
}

$articles = getArticles( $articleCount );

?>

<div class="container-lg">
    <div class="row">
        <?php if ( !$postsPage && !$postSingle ) : ?>
        <div class="header col-sm-10 offset-sm-1 <?php if ( $centerHeader ) { echo 'text-center'; } else { echo 'col-md-6'; } ?> col-lg-12 offset-lg-0">
            <<?php echo $headerSize ?>>
                <?php echo $header ?>
            </<?php echo $headerSize ?>>
            <?php if ( $bodyCopy ) : ?>
                <div class="col-6">
                    <?php echo $bodyCopy ?>
                </div>
            <?php endif; ?>
        </div>
    <?php elseif ( $postSingle ) : ?>
        <div class="header text-center col-md-8 offset-md-2">
            <h2>Related Articles</h2>
        </div>
    <?php elseif ( $postsPage ) : ?>
        <div class="header text-center col-md-8 offset-md-2">
            <h1><?php echo get_the_title( get_option( 'page_for_posts' ) ) ?></h1>
        </div>
    <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
            <div class="row">
                <?php foreach ( $articles as $key => $article ) : ?>
                    <div class="grid col-sm-6 col-md-6 col-lg-4">
                        <?php include('articles-card.php') ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php if ( !$postsPage ) : ?>
        <?php if ( $showArticlesButton ) : ?>
            <div class="text-center">
                <a href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-primary">See all posts</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>