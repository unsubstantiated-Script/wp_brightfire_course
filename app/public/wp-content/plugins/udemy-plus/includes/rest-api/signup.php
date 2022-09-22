<?php

function up_rest_api_signup_handler($request)
{
    $response = ['status' => 1];
    $params = $request->get_json_params();

    if (!isset($params['email'], $params['username'], $params['password'])
        || empty($params['email'])
        || empty($params['username'])
        || empty($params['password'])
    ) {
        return $response;
    }

    $response['status'] = 2;

    return $response;
}