<?php

function up_activate_plugin()
{
    //Method to make sure our plugin is jiving with the intended version of WP
    if (version_compare(get_bloginfo('version'), '5.9', '<')) {
        //if we are not in the correct version of WP, this will kill the script. We're looking for 5.9 or above
        wp_die(__('You must update Wordpress to use this plugin', 'udemy-plus'));
    }

    up_recipe_post_type();
    flush_rewrite_rules();

    global $wpdb;
    $tableName = "{$wpdb->prefix}recipe_ratings";
    $charsetCollate = $wpdb->get_charset_collate();

    //Query to create table upon installation of plugin
    $sql = "
    CREATE TABLE {$tableName} (
        ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
        post_id bigint(20) unsigned NOT NULL,
        user_id bigint(20) unsigned NOT NULL,
        rating float(3,2) unsigned NOT NULL
    ) ENGINE='InnoDB' {$charsetCollate};";

    require_once(ABSPATH . "/wp-admin/includes/upgrade.php");
//    creating DB but also avoids creating multiple tables if user repeatedly activates/deactivates tables.
    dbDelta($sql);
}

