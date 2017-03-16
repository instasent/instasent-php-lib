<?php

// Used for composer based installation
require __DIR__.'/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/SmsClient.php');

$instasentClient = new Instasent\SmsClient('my-token');
$response = $instasentClient->sendSms('test', '+34647188472', 'test message');

echo $response['response_code'];
echo $response['response_body'];
