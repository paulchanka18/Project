

<?php
function project_files()
{

    wp_enqueue_style('project_main_styles', get_stylesheet_uri());
    //nickname for stylesheet, 

    wp_enqueue_script('project-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true); //creates slideshow of pics
}

add_action('wp_enqueue_scripts', 'project_files'); //allows for images to turn to slideshow , and adds all css

?>