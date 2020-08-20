Welcome to **Instasent PHP SDK**. This repository contains PHP SDK for Instasent's REST API.

# Notice!

> **Verify** product is currently deprecated and will be removed in the next release. The same functionality can be easily implemented by sending an SMS. If you need help migrating please contact us

## Installation

The easiest way to install the SDK is either via composer:

```
composer require instasent/instasent-php-lib
```

or manually by downloading the source:

[Click here to download the source
(.zip)](https://github.com/instasent/instasent-php-lib/zipball/master)

Once you download the library, move the instasent-php-lib folder to your project
directory and then include the library file:

```
require_once(__DIR__ . '/path/to/lib/Abstracts/InstasentClient.php');
require_once(__DIR__ . '/path/to/lib/SmsClient.php');
```

# Usage

Check the [examples directory](https://github.com/instasent/instasent-php-lib/tree/master/examples) to see working examples of this SDK usage

### Sending an SMS

```php
$instasentClient = new Instasent\SmsClient('my-token');
$response = $instasentClient->sendSms('Company', '+34666666666', 'test message');

echo $response['response_code'];
echo $response['response_body'];
```

If you want to send an Unicode SMS (i.e with 😀 emoji) you only need to replace `sendSms` call to `sendUnicodeSms`

```php
$response = $instasentClient->sendUnicodeSms('Company', '+34666666666', 'Unicode test: ña éáíóú 😀');
```

## Available actions

```
SMS
SmsClient::sendSms(sender, to, text)
SmsClient::sendUnicodeSms(sender, to, text)
SmsClient::getSms(page, per_page)
SmsClient::getSmsById(message_id)

LOOKUP
LookupClient::doLookup(to)
LookupClient::getLookups(page, per_page)
LookupClient::getLookupById(id)

ACCOUNT
instasent::getAccountBalance()
```

# Full documentation

Full documentation of the API can be found at http://docs.instasent.com/

# Getting help

If you need help installing or using the SDK, please contact Instasent Support at support@instasent.com

If you've instead found a bug in the library or have a feature request, go ahead and open an issue or pull request!
