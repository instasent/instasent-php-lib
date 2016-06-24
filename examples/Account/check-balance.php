<?php

// Used for composer based installation
require __DIR__  . '/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/AccountClient.php');

$instasentClient = new Instasent\AccountClient("my-token");

$response = $instasentClient->getAccountBalance();

//echo $response["response_code"];
//echo $response["response_body"];

$response_body = json_decode($response["response_body"]);
$available = $response_body->entity->available;
$currency = $response_body->entity->currency;

echo sprintf("You have a balance of %s %s ", $available, $currency);
