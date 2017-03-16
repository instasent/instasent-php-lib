<?php

// Used for composer based installation
require __DIR__.'/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/VerifyClient.php');

$instasentClient = new Instasent\VerifyClient('my-token');

//replace with verifyId provided by verifyRequest and client token input
$requestVerifyId = 'verify-id';
$token = 'client-input-token';

$response = $instasentClient->checkVerify($requestVerifyId, $token);

//echo $response["response_code"];
//echo $response["response_body"];

$response_body = json_decode($response['response_body']);
$status = $response_body->entity->status;

if ($status == 'verified') {
    echo 'Hooorray!! You are verified!';
} else {
    echo 'Verified status is: '.$status;
}
