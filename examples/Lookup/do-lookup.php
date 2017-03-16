<?php

// Used for composer based installation
require __DIR__.'/../../vendor/autoload.php';

// Use below for direct download installation
//require_once(__DIR__ . '/../../src/Instasent/Abstracts/InstasentClient.php');
//require_once(__DIR__ . '/../../src/Instasent/LookupClient.php');

$instasentClient = new Instasent\LookupClient('my-token');
$response = $instasentClient->doLookup('+34666000000');

echo $response['response_code'];
echo $response['response_body'];
