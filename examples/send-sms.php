<?php

// Used for composer based installation
require __DIR__  . '/../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../src/Instasent/InstasentClient.php');

$instasentClient = new Instasent\InstasentClient("my-token");
$response = $instasentClient->sendSms("test", "+34647000000", "test message");

echo $response["response_code"];
echo $response["response_body"];
