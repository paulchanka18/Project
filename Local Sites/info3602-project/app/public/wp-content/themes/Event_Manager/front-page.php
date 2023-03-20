<?php get_header() ?>



<div class="hero-slider">
    <div class="hero-slider__slide" style="height: auto; background-image: url(<?php echo get_theme_file_uri('images/demo/corporate-events.jpg') ?>);">
        <div class=" hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Country Wide Event Planner</h2>
                <p class="t-center">One Stop Event Providers.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="height: auto; background-image: url(<?php echo get_theme_file_uri('images/demo/weddings1.jpg'); ?>)">
        <div class=" hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Event Planning solutions with imaginative design</h2>
                <p class="t-center">Conception, Creation and production of events.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="height: auto; background-image: url(<?php echo get_theme_file_uri('images/demo/live-show-events.webp'); ?>)">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Visit Our Proffesionals</h2>
                <p class="t-center">FEvery Event is a live and Unforgettable show.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
</div>




<br class="clear" />



<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events </h2>

            <!--Custom Query-->
            <?php
            $homepageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'past-events'
            ));
            while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post(); ?>
                <li> <?php the_title(); ?> </li>
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
                        <span class="event-summary__month">
                            <?php
                            $eventDate = new DateTime(get_field('event_date'));
                            echo $eventDate->format('M') ?>
                        </span>
                        <span class="event-summary__day"><?php
                                                            $eventDate = new DateTime(get_field('event_date'));
                                                            echo $eventDate->format('d') ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title(); ?> </a></h5>
                        <p><?php
                            if (has_excerpt()) echo get_the_excerpt();
                            else echo wp_trim_words(get_the_content(), 18);
                            ?>
                            <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
                        </p>
                    </div>
                </div>
            <?php }
            ?>



            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>

        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>


            <?php $homepagePosts = new WP_Query(array(
                'posts_per_page' => 2,
                'category_name' => 'News'

            ));
            while ($homepagePosts->have_posts()) {
                $homepagePosts->the_post(); ?>
                <li> <?php the_title(); ?></li>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink() ?>">
                        <span class="event-summary__month">
                            <?php the_time('M') ?>
                        </span>
                        <span class="event-summary__day">
                            <?php the_time('d') ?>
                        </span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                        <p><?php
                            if (has_excerpt()) echo get_the_excerpt();
                            else echo wp_trim_words(get_the_content(), 18);
                            ?> <a href="<?php the_permalink() ?>" class="nu gray">Read more</a></p>
                    </div>
                </div>

            <?php } ?>

            ,
            <p class="t-center no-margin"><a href="<?php site_url('/blog') ?> class=" btn btn--yellow">View All Blog Posts</a></p>
        </div>
    </div>
</div>
<div class="wrapper">
    <div id="container">
        <div id="content">
            <h2>About This Free CSS Template</h2>
            <p>This is a W3C standards compliant free website template from <a href="http://www.os-templates.com/">OS Templates</a>.</p>
            <p>This template is distributed using a <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>, which allows you to use and modify the template for both personal and commercial use when you keep the provided credit links in the footer.</p>
            <p>For more CSS templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
        </div>
        <div id="column">
            <div class="holder">
                <h2>Nullamlacus loborttis</h2>
                <ul id="latestnews">
                    <li class="last"><img class="imgl" src="images/demo/80x80.gif" alt="" />
                        <p><strong>Indonectetus facilis leo nibh.</strong></p>
                        <p>Nullamlacus dui ipsum cons eque loborttis non euis que morbi penas dapibulum orna.</p>
                        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                    </li>
                </ul>
            </div>
        </div>
        <br class="clear" />
    </div>
</div>
<div class="wrapper">
    <?php

    get_footer();
    ?>