<?php

function respond($data, $result ='success', $message='Request Successfull'){
    echo json_encode([
        'result' => $result,
        'message' => $message,
        'data' => $data
    ]);
}

function checkRequestMethod($requiredMethod)
{
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        respond(null, 'failed', 'wrong method');
        die;
    }
}
