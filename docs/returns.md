# Returns

## getReturns

```php
$returnsResponse = $client->getReturns();
```

## getReturnsByRmaId

```php
$returnItem = $client->getReturnsByRmaId(100000);
```

## putReturnsByRmaId

```php
$processStatus = $client->putReturnsByRmaId(100000, (new \HarmSmits\BolComClient\Models\ReturnRequest())
    ->setHandlingResult(\HarmSmits\BolComClient\Models\ReturnRequest::HANDLING_RESULT_RETURN_DOES_NOT_MEET_CONDITIONS)
    ->setQuantityReturned(1)
);
```