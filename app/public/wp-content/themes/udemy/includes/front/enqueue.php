<?php

function u_enqueue()
{
    //Register first
    wp_register_style(
        'u_font_rubik_and_pacifico',
        "https://fonts.googleapis.com/css2?family=Pacifico&family=Rubik:wght@300;400;500;700&display=swap",
        //Third param needs to be here, so we're just leaving it empty
        [],
        //Null here to avoid WP trying to tag our url with a version number which breaks the API call.
        null
    );
    wp_register_style(
        'u_bootstrap_icons',
        //The solution to not having an actual url. The "path" function returns a file path on the system. The URI to the web.
        get_theme_file_uri("assets/bootstrap-icons/bootstrap-icons.css")
    );
    wp_register_style(
        'u_theme',
        get_theme_file_uri("assets/public/index.css")
    );

    //Then enqueue
    wp_enqueue_style('u_font_rubik_and_pacifico');
    wp_enqueue_style('u_bootstrap_icons');
    wp_enqueue_style('u_theme');

}