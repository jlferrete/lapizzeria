<?php

/** CSS y  JS */

function lapizzeria_styles() {
    //Normalize
    wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), '8.0.1');
    //Slicknav
    wp_enqueue_style('slicknavcss', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/slicknav.min.css', array('normalize'), '1.0.10');
    //Google Fonts
    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900&display=swap', array(), '1.0.0');
    //Hojas Styles
    wp_enqueue_style('style' , get_stylesheet_uri(), array('normalize'), '1.0.0');


    // SCRIPTS

    wp_enqueue_script('slicknavjs', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);


}
add_action('wp_enqueue_scripts', 'lapizzeria_styles');

/** Menus **/

function lapizzeria_menus() {
    register_nav_menus( array(
        'header-menu' => 'Header Menu'
    ));

}
add_action('init', 'lapizzeria_menus');