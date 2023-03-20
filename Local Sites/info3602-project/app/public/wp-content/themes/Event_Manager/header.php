<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Darkness
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php wp_head(); ?>
    <title>Darkness</title>
    <meta http-equiv="Content-Type" content="width=device-width, initial-scale =1" />
</head>

<body id="top">
    <div class="wrapper">
        <div id="header">
            <div id="logo">
                <h1><a href="index.php">Event Horizon</a></h1>
                <p>The Best Event Managers in the Nation</p>
            </div>
            <div id="topnav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'headerMenuLocation',
                ));
                ?>
                <!-- <ul>
                    <li class="active"><a href=<?php echo site_url() ?>>Home</a></li>
                    <li><a href="<?php echo site_url('/services') ?>">Services</a></li>
                    <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li class="last"><a href="#">A Long Link Text</a></li>
                </ul> -->
            </div>
            <br class="clear" />
        </div>
    </div>