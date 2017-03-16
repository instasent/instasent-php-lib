<?php

// Used for composer based installation
require __DIR__.'/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/SmsClient.php');

$instasentClient = new Instasent\SmsClient('my-token');

$messages = null;
for ($i = 0; $i < 100; $i++) {
    $messages[] = ['allowUnicode' => true, 'from' => 'test', 'to' => '+34647000000', 'text' => 'Unicode test multi ña éáíóú 😀'];
}

$response = $instasentClient->sendBulkSms($messages);

echo $response['response_code'];
echo $response['response_body'];
