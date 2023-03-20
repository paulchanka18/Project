

<?php
function project_files()
{

    wp_enqueue_style('project_main_styles', get_stylesheet_uri());
    //nickname for stylesheet, 

    wp_enqueue_script('project-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true); //creates slideshow of pics
}

function project_features()
{
    add_theme_support('title-tag'); //actual function which adds unique title tab for each page
    add_theme_support('post-thumbnails'); //this tells Wordpress to support feature images
}


add_action('wp_enqueue_scripts', 'project_files'); //allows for images to turn to slideshow , and adds all css
add_action('after_setup_theme', 'project_features'); //generates a unique title for each page

register_nav_menu('headerMenuLocation', 'Header Menu Location');

?>