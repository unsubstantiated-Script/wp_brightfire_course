<?php

function up_enqueue_scripts()
{
    $authURLs = json_encode([
//        esc_url_raw cleans up the url
        'signup' => esc_url_raw(rest_url('up/v1/signup')),
        'signin' => esc_url_raw(rest_url('up/v1/signin')),
    ]);

//    This allows us to change where the script is loaded in the DOM
    wp_add_inline_script(
     'udemy-plus-auth-modal-script',
        "const up_auth_rest = {$authURLs}",
        'before'
    );
}