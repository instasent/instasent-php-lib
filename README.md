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

    require '/path/to/instasent-php-lib/src/Instasent/InstasentClient.php';

and now you can use it!

## Quickstart

### Send an SMS

You can check 'examples/send-sms.php' file.

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

## [Full Documentation](http://docs.instasent.com/)

## Prerequisites

* PHP >= 5.2.3

# Getting help

If you need help installing or using the library, please contact Instasent Support at support@instasent.com first.
If you've instead found a bug in the library or would like new features added, go ahead and open issues or pull requests against this repo!
