<?php

// Used for composer based installation
require __DIR__.'/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/VerifyClient.php');

$instasentClient = new Instasent\VerifyClient('my-token');
$response = $instasentClient->getVerifyById('verifyId');

echo $response['response_code'];
echo $response['response_body'];
