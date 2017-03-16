<?php

// Used for composer based installation
require __DIR__.'/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/SmsClient.php');

$instasentClient = new Instasent\SmsClient('my-token');

$messages = null;
for ($i = 0; $i < 100; $i++) {
    $messages[] = ['from' => 'test', 'to' => '+34647000000', 'text' => 'test multi'];
}

$response = $instasentClient->sendBulkSms($messages);

echo $response['response_code'];
echo $response['response_body'];
