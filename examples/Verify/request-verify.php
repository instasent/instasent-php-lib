<?php

// Used for composer based installation
require __DIR__.'/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/VerifyClient.php');

$instasentClient = new Instasent\VerifyClient('my-token');

//SMS text must have %token% chain to replace with generated token
$response = $instasentClient->requestVerify('test', '+34647000000', 'Your code is %token%', 6, 300);

echo $response['response_code'];
echo $response['response_body'];
