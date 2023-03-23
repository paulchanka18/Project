

<?php
function project_files()
{

    wp_enqueue_style('project_main_styles', get_stylesheet_uri());
    //nickname for stylesheet, 

    wp_enqueue_script('project-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true); //creates slideshow of pics
}

add_action('wp_enqueue_scripts', 'project_files'); //allows for images to turn to slideshow , and adds all css


function university_features()
{
    add_theme_support('title-tag'); //actual function which adds unique title tab for each page

    //this tells Wordpress to support feature images
    add_theme_support('post-thumbnails');

    add_image_size('Landscape', 400, 260, true);
    add_image_size('front_page', 200, 130, true);
    add_image_size('Portrait', 180, 650, true);
}


add_action('after_setup_theme', 'university_features'); //generates a unique title for each page

register_nav_menu('headerMenuLocation', 'Header Menu Location');

?>