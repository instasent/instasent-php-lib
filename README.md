Welcome to __Instasent PHP SDK__. This repository contains Instasent's PHP SDK and samples for REST API.

## Installation

You can install **instasent-php-lib** via composer or by downloading the source.

#### Via Composer:

You need to run:

```
composer require "instasent/instasent-php-lib"
```

#### Via ZIP file:

[Click here to download the source
(.zip)](https://github.com/instasent/instasent-php-lib/zipball/master)

Once you download the library, move the instasent-php-lib folder to your project
directory and then include the library file:

```
require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/SmsClient.php');
```

and now you can use it!

## SMS

### Send an SMS

You can check 'examples/send-sms.php' or 'examples/send-sms-unicode.php' file.

#### Composer way

```php
<?php

require __DIR__  . '/../vendor/autoload.php';

$instasentClient = new Instasent\SmsClient("my-token");
$response = $instasentClient->sendSms("test", "+34647000000", "test message");

echo $response["response_code"];
echo $response["response_body"];
```

#### Direct way

```php
<?php

require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/SmsClient.php');

$instasentClient = new Instasent\SmsClient("my-token");
$response = $instasentClient->sendSms("test", "+34647000000", "test message");

echo $response["response_code"];
echo $response["response_body"];
```

If you want to send an Unicode SMS (i.e with 😀 emoji) you only need to replace sendSms method with sendUnicodeSms:

```php
$response = $instasentClient->sendUnicodeSms("test", "+34647000000", "Unicode test: ña éáíóú 😀");
```

### Send multiple SMS

You can check 'examples/send-bulk-sms.php' or 'examples/send-bulk-sms-unicode.php' file.

#### Composer way

```php
<?php

require __DIR__  . '/../vendor/autoload.php';

$instasentClient = new Instasent\SmsClient("my-token");
$messages = null;
for ($i=0; $i<100; $i++) {
    $messages[] = ["from" => "test", "to" => "+34647000000", "text" => "test multi"];
}

$response = $instasentClient->sendBulkSms($messages);
```

#### Direct way

```php
<?php

require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/SmsClient.php');

$instasentClient = new Instasent\SmsClient("my-token");
$messages = null;
for ($i=0; $i<100; $i++) {
    $messages[] = ["from" => "test", "to" => "+34647000000", "text" => "test multi"];
}

$response = $instasentClient->sendBulkSms($messages);

echo $response["response_code"];
echo $response["response_body"];
```

If you want to send an Unicode Bulk SMS (i.e with 😀 emoji) you only need to add 'allowUnicode' => true to array

```php
for ($i=0; $i<100; $i++) {
    $messages[] = ["allowUnicode" => true, "from" => "test", "to" => "+34647000000", "text" => "Unicode test: ña éáíóú 😀"];
}
```

### Get SMS Info

#### Composer way

```php

require __DIR__  . '/../vendor/autoload.php';

$instasentClient = new Instasent\SmsClient("my-token");
$response = $instasentClient->getSmsById("smsId");

echo $response["response_code"];
echo $response["response_body"];
```

#### Direct way

```php

require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/SmsClient.php');

$instasentClient = new Instasent\SmsClient("my-token");
$response = $instasentClient->getSmsById("smsId");

echo $response["response_code"];
echo $response["response_body"];
```

## Lookup

### Do a Lookup

#### Composer way

```php

require __DIR__  . '/../vendor/autoload.php';

$instasentClient = new Instasent\LookupClient("my-token");
$response = $instasentClient->doLookup("+34666000000");

echo $response["response_code"];
echo $response["response_body"];
```

#### Direct way

```php

require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/LookupClient.php');

$instasentClient = new Instasent\LookupClient("my-token");
$response = $instasentClient->doLookup("+34666000000");

echo $response["response_code"];
echo $response["response_body"];
```

### Verify

To do a verify workflow, first you need to request a verify code.

### Request Verify

#### Composer way

```php

require __DIR__  . '/../vendor/autoload.php';

$instasentClient = new Instasent\VerifyClient("my-token");
$response = $instasentClient->requestVerify("test", "+34647000000", "Your code is %token%", 6, 300);

echo $response["response_code"];
echo $response["response_body"];
```

#### Direct way

```php

require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/VerifyClient.php');

$instasentClient = new Instasent\VerifyClient("my-token");
$response = $instasentClient->requestVerify("test", "+34647000000", "Your code is %token%", 6, 300);

echo $response["response_code"];
echo $response["response_body"];
```

Then you need to check if verify code entered by your client is correct.

### Check Verify

#### Composer way

```php

require __DIR__  . '/../vendor/autoload.php';

$instasentClient = new Instasent\VerifyClient("my-token");
$response = $instasentClient->checkVerify($requestVerifyId, $token);

$response_body = json_decode($response["response_body"]);
$status = $response_body->entity->status;

if ($status == 'verified') {
    echo "Hooorray!! You are verified!";
} else {
    echo "Verified status is: ".$status;
}
```

#### Direct way

```php

require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/VerifyClient.php');

$instasentClient = new Instasent\VerifyClient("my-token");
$response = $instasentClient->checkVerify($requestVerifyId, $token);

$response_body = json_decode($response["response_body"]);
$status = $response_body->entity->status;

if ($status == 'verified') {
    echo "Hooorray!! You are verified!";
} else {
    echo "Verified status is: ".$status;
}
```

## [Full Documentation](http://docs.instasent.com/)

## Prerequisites

* PHP >= 5.2.3

# Getting help

If you need help installing or using the library, please contact Instasent Support at support@instasent.com first.
If you've instead found a bug in the library or would like new features added, go ahead and open issues or pull requests against this repo!
