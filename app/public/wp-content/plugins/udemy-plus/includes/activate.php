<?php

function up_activate_plugin() {
    //Method to make sure our plugin is jiving with the intended version of WP
    if(version_compare(get_bloginfo('version'), '5.9', '<')) {
        //if we are not in the correct version of WP, this will kill the script. We're looking for 5.9 or above
        wp_die(__('You must update Wordpress to use this plugin', 'udemy-plus'));
    }

    up_recipe_post_type();
    flush_rewrite_rules();
}