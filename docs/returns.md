# Returns

## getReturns

Get a paginated list of all returns, which are sorted by date in descending order.

```php
$returnsResponse = $client->getReturns();
```

## getReturn

Retrieve a return based on the rma id.

```php
$returnItem = $client->getReturn(100000);
```

## updateReturn

Allows the user to handle a return. This can be to either handle an open return, or change the handlingResult of an
already handled return. The latter is only possible in limited scenarios, please check the returns documentation for a
complete list.

```php
$processStatus = $client->updateReturn(100000, (new \HarmSmits\BolComClient\Models\ReturnRequest())
    ->setHandlingResult(\HarmSmits\BolComClient\Models\ReturnRequest::HANDLING_RESULT_RETURN_DOES_NOT_MEET_CONDITIONS)
    ->setQuantityReturned(1)
);
```