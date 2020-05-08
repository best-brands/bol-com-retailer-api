# Process status

## getProcessStatus

```php
$processStatusResponse = $client->getProcessStatus("100000", "CONFIRM_SHIPMENT");
```

## postProcessStatus

```php
$processStatusResponse = $client->postProcessStatus((new \HarmSmits\BolComClient\Models\BulkProcessStatusRequest())
    ->setProcessStatusQueries([
        (new \HarmSmits\BolComClient\Models\ProcessStatusId())
            ->setid(1000000),
        (new \HarmSmits\BolComClient\Models\ProcessStatusId())
            ->setid(1000001), 
    ])
);
```

## getProcessStatusByProcessStatusId

```php
$processStatus = $client->getProcessStatusByProcessStatusId(1000000);
```