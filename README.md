# bol-com-retailer-api

A simple bol.com PHP API

## Usage

```php
$client = new \HarmSmits\BolComClient\Client(
    "clientId",
    "clientSecret"
);
```

## Supported requests

All requests are supported. Every method was named by means of converting the API endpoint for sound naming. This could
be changed later, but for now the methods will be like the api endpoint names for sake of usability.