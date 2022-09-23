<?php

function up_rest_api_signin_handler($request)
{
    $response = ['status' => 1];
    $params = $request->get_json_params();

    if (!isset($params['user_login'], $params['password'])
        || empty($params['user_login'])
        || empty($params['password'])
    ) {
        return $response;
    }
//
    $email = sanitize_email($params['user_login']);
    $password = sanitize_text_field($params['password']);

//    This function is not great for first time users, so use it here to verify users into signin
    $user = wp_signon([
        'user_login' => $email,
        'user_password' => $password,
        'remember' => true
    ]);

    if(is_wp_error($user)) {
        return $response;
    }

//
//
//    //Preventing Duplicates
//    if (
//        username_exists($username) ||
//        !is_email($email) ||
//        email_exists($email)
//    ) {
//        return $response;
//    }
//
//    $userID = wp_insert_user([
//        'user_login' => $username,
//        'user_pass' => $password,
//        'user_email' => $email
//    ]);
//
//    if(is_wp_error($userID)) {
//        return $response;
//    }
//
//    wp_new_user_notification($userID, null, 'user');
//    wp_set_current_user($userID);
////    Setting up cookies for session
//    wp_set_auth_cookie($userID);
//
//    $user = get_user_by('id', $userID);
//
//    do_action('wp_login', $user->user_login, $user);

    $response['status'] = 2;
    return $response;
}