<?php
$id = $teamMember->ID;
$featuredImage = get_the_post_thumbnail( $id );
$title = get_field('title', $id );
$textLink = get_field( 'thumbnail_text_link' , $id );

// Add team member bio to array if exists
global $allGridTeamMembers;

$bio = get_field('bio', $teamMember->ID);
if ( $bio && !$allGridTeamMembers[$id] ) {
    $allGridTeamMembers[$id]['name'] = $teamMember->post_title;
    $allGridTeamMembers[$id]['bio'] = $bio;
}
?>

<div class="card text-center">
    <?php if ( $featuredImage && $imageType !== 'No Image' ) : ?>
        <?php echo $featuredImage ?>
    <?php endif; ?>
    <div class="card-body">
        <div style="flex-basis: 100%;">
            <?php if( $teamMember->post_title ) : ?>
                <h3 class="card-title"><?php echo $teamMember->post_title ?></h3>
            <?php endif; ?>
            <?php if ( $title ) : ?>
                <p class="title mb-0"><?php echo $title ?></p>
            <?php endif; ?>
            <?php if ( $textLink ) : ?>
                <p class="mb-0">
                    <a href="<?php echo $textLink['url'] ?>" target="<?php echo $textLink['target'] ?>">
                        <?php echo $textLink['title'] ?>
                    </a>
                </p>
            <?php endif; ?>
        </div>
        <?php if ( $bio ) : ?>
            <a href="#" class="team-member-open-drawer btn btn-primary" data-id="<?php echo $id ?>">
                View Bio
            </a>
        <?php endif; ?>
    </div>
</div>