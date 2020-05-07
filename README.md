# bol-com-retailer-api

A simple bol.com PHP API

## Usage

```php
$client = new \HarmSmits\BolComClient\Client(
    "...",
    "..."
);
```

Everything is object mapped, with setters and getters, so accessing e.g. returns and printing the
first name of the first 50 people can be done as follows:

```php
foreach ($client->getReturns()->getReturns() as $reducedReturnItem) {
    $returnItem = $client->getReturnsByRmaId($reducedReturnItem->getRmaId());
    print($returnItem->getCustomerDetails()->getFirstName());
}
```php
