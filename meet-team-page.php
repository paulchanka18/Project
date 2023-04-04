<?php
/*
Template Name: Meet the Team Page
*/
?>

<?php get_header() ?>


<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background_image');
                                                                    echo $pageBannerImage['sizes']['pageBanner'];; ?> );">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Meet Our Team</h1>
        <div class="page-banner__intro">
            <p>Your Dream Event, Delivered</p>
        </div>
    </div>
</div>


<div class="description">


    <?php
    $theParent = wp_get_post_parent_ID(get_the_ID());
    if ($theParent) { ?>
        <div class="metabox metabox metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent) ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent)  ?></a>
                <span class="metabox__main"><?php echo the_title(); ?></span>
            </p>
        </div>
    <?php
    }
    ?>

</div>

<?php
// this returns the pages but doesn't output it. If the pages has a parent or 
$testArray = get_pages(array(
    'child_of' => get_the_ID()
));
if ($theParent or $testArray) { ?>
    <div class="page-links">
        <h2 class="page-links__title">
            <a href="<?php echo get_permalink($theParent); ?>">
                <?php echo get_the_title($theParent); ?>
            </a>
        </h2>
        <ul class="min-list">
            <?php
            if ($theParent) { // if the current page has a parent
                $findChildrenOf = $theParent;
            } else { //viewing a parent page
                $findChildrenOf = get_the_ID();
            }
            wp_list_pages(array(
                'title_li' => NULL,
                'child_of' => $findChildrenOf,
                'sort_column' => 'menu_order'
            ));
            ?>
        </ul>
    </div>
<?php } ?>

<h1>About Our Team</h1>
<p>We are a group of passionate individuals dedicated to providing the best service to our clients. Meet our team members below:</p>
</div>

<div class="team_container">
    <div class="team_member">
        <div class="img-container">
            <img src="<?php echo get_theme_file_uri("/images/demo/Event Coordinator.jpg") ?>" alt="Person 1">
        </div>
        <div class="name">Head of Event Coordination</div>
    </div>
    <div class="team_member">
        <div class="img-container">
            <img src="<?php echo get_theme_file_uri("/images/demo/Head of Design.webp") ?>" alt="Person 2">
        </div>
        <div class="name">Head Of Design</div>
    </div>
    <div class="team_member">
        <div class="img-container">
            <img src="<?php echo get_theme_file_uri("/images/demo/Head of Visual and Sound Effects.png") ?>" alt="Person 3">
        </div>
        <div class="name">Head of Visual and Sound Effects</div>
    </div>
    <div class="team_member">
        <div class="img-container">
            <img src="<?php echo get_theme_file_uri("/images/demo/kevin_malone.webp") ?>" alt="Person 4">
        </div>
        <div class="name">Executive Management</div>
    </div>
    <div class="team_member">
        <div class="img-container">
            <img src="<?php echo get_theme_file_uri("/images/demo/Vice President.webp") ?>" alt="Person 5">
        </div>
        <div class="name">Vice President</div>
    </div>
    <div class="team_member">
        <div class="img-container">
            <img src="<?php echo get_theme_file_uri("/images/demo/executive manage.jpg") ?>" alt="Person 6">
        </div>
        <div class="name">CEO</div>
    </div>
</div>

<?php get_footer(); ?>