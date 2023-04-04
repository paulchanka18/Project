<?php
get_header();
while (have_posts()) {
    the_post();
?>



    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background_image');
                                                                        echo $pageBannerImage['sizes']['pageBanner'];; ?> );">
        </div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Past Events</h1>

            <div class="page-banner__intro">
                <p style="font-color:white"><?php the_title() ?></p>
            </div>

        </div>

    </div>

    <div class="metabox  metabox--with-home-link" style=margin-left:120px>
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('past-events') ?>">
                <i class="fa fa-home" aria-hidden="true"></i> Back to All Events</a>
            <span class="metabox__main"><?php echo the_title(); ?></span>
        </p>
    </div>

    <div>
        <div>

            <h1> <?php the_content(); ?> </h1>
        </div>
        <div style="text-align: center;">
            <img class="professor-card" src="<?php the_post_thumbnail_url('Landscape'); ?>" style="width: 50%; height: auto;">
        </div>
        <h1 class="event-services" style="margin-top:50px;text-align:center; "><b>Services Provided for this Event</b></h1>
    </div>

    <div class="posts-container">
        <?php
        // Get the values of the custom field with the key "relationship"
        $custom_field_values =  get_field('staff_member');

        // Output the custom field values if they exist
        if (!empty($custom_field_values)) {
            $related_post_ids = array();
            foreach ($custom_field_values as $value) {
                array_push($related_post_ids, $value->ID);
            }

            // Query only the related posts for the current post
            $args = array(
                'post_type' => 'staff_member',
                'post__in' => $related_post_ids,
                'orderby' => 'post__in',
            );
            $loop = new WP_Query($args);

            // Loop through each related post
            while ($loop->have_posts()) : $loop->the_post();
                // Add a new column div for every second post
                if ($loop->current_post % 2 == 0) {
                    echo '<div class="post-row">';
                }
                echo '<div class="post-cell">';
                echo '<img src="' . get_the_post_thumbnail_url($post->ID, 'front_page') . '" class="post-image">';
                echo '<div class="post-content">';
                echo '<b>' . '<h2>' . esc_html(get_the_title()) . '</h2>' . '</b>';
                echo '<p>' . esc_html(get_the_content()) . '</p>';
                echo '</div>';
                echo '</div>';
        ?>

        <?php
                // Close the div for every second post
                if (($loop->current_post + 1) % 2 == 0 || $loop->post_count == $loop->current_post + 1) {
                    echo '</div>';
                    echo '<hr>';
                }
            endwhile;
        }
        ?>
    </div>
    <?php wp_reset_postdata(); ?>
    </div>
    <h1 class="event-services" style="margin-top:50px;text-align:center; "><b>Event Location</b></h1>
    </div>

    <div class="venue_container">
        <?php
        $relatedVenues = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'venues',
            'oderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'related_events',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                )
            )
        ));

        if ($relatedVenues->have_posts()) {
            echo '<hr class="section-break">';

            while ($relatedVenues->have_posts()) {
                $relatedVenues->the_post(); ?>
                <div class="venue_things" style="margin-top:50px;text-align:center; ">
                    <h1> <?php the_title() ?> </h1>
                </div>
                <div class="venue_image">
                    <img src="<?php $pageImage1 = get_field('image1');
                                echo $pageImage1['url'];
                                ?>">
                </div>
        <?php
            }
        }
        ?>
    </div>
    <?php wp_reset_postdata(); ?>
    </div>
    <h1 class="event-services" style="margin-top:50px;text-align:center; "><b>Event's Reviews</b></h1>
    </div>



    <div>
        <?php
        // Get the current post ID
        $post_id = get_the_ID();

        // Get the Related Reviews custom field for the current post
        $related_reviews = get_post_meta($post_id, 'related_reviews', true);

        // If there are related reviews, display them
        if (!empty($related_reviews)) {
            // Create a new query to retrieve the related reviews
            $args = array(
                'post_type' => 'post',
                'post__in' => $related_reviews,
                'orderby' => 'post__in',
                'posts_per_page' => -1 // Display all related reviews
            );
            $related_reviews_query = new WP_Query($args);

            // Display the related reviews
            if ($related_reviews_query->have_posts()) {
                while ($related_reviews_query->have_posts()) {
                    $related_reviews_query->the_post();
                    echo '<div class="dont-color">';
                    echo '<h3><a href="' . get_permalink() . '" style="color: black; margin-bottom:20px">' . get_the_title() . '</a></h3>';
                    echo '<p>' . get_the_content() . '</p>';
                    echo '<hr>';
                    echo '</div>';
                }
            }


            // Reset the query to the current post
            wp_reset_postdata();
        }
        ?>

    </div>






<?php

}
get_footer()
?>