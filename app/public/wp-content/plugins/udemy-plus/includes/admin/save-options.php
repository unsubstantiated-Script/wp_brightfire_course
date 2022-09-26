<?php

function up_save_options() {
//    Avoiding spoofing the user's info in the form...
    if(!current_user_can('edit_theme_options')) {
        wp_die(
            __("You are not allowed to be on this page!", 'udemy-plus')
        );
    }

//    Verifying the nonce
    check_admin_referer('up_options_verify');

    $options = get_option('up_options');


    $options['og_title'] = sanitize_text_field($_POST['up_og_title']);
    $options['og_image'] = sanitize_url($_POST['up_og_image']);
    $options['og_description'] = sanitize_text_field($_POST['up_og_description']);
    $options['enable_og'] = absint($_POST['up_enable_og']);

//    Updating the DB
    update_option('up_options', $options);

//    Redirecting back to form

    wp_redirect(admin_url('admin.php?page=up-plugin-options&status=1'));

}