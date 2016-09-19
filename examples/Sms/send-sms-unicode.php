<?php

// Used for composer based installation
require __DIR__  . '/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/SmsClient.php');

$instasentClient = new Instasent\SmsClient("my-token");
$response = $instasentClient->sendUnicodeSms("test", "+34647000000", "Unicode test: ña éáíóú 😀");

echo $response["response_code"];
echo $response["response_body"];
