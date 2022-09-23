<?php


function up_save_cuisine_meta($termID) {
//    Gotta make sure this is a POST method coming in from the admin form, if not, we're gonna return out of the script
    if(!isset($_POST['up_more_info_url'])) {
        return;
    }

    update_term_meta(
        $termID,
        'more_info_url',
        sanitize_url($_POST['up_more_info_url'])
    );
}