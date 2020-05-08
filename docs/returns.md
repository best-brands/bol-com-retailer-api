# Returns

## getReturns

```php
$returnsResponse = $client->getReturns();
```

## getReturn

```php
$returnItem = $client->getReturn(100000);
```

## updateReturn

```php
$processStatus = $client->updateReturn(100000, (new \HarmSmits\BolComClient\Models\ReturnRequest())
    ->setHandlingResult(\HarmSmits\BolComClient\Models\ReturnRequest::HANDLING_RESULT_RETURN_DOES_NOT_MEET_CONDITIONS)
    ->setQuantityReturned(1)
);
```