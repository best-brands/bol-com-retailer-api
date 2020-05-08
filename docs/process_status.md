# Process status

## getProcessStatuses

```php
$processStatusResponse = $client->getProcessStatuses("100000", "CONFIRM_SHIPMENT");
```

## queryProcessStatuses

```php
$processStatusResponse = $client->queryProcessStatuses((new \HarmSmits\BolComClient\Models\BulkProcessStatusRequest())
    ->setProcessStatusQueries([
        (new \HarmSmits\BolComClient\Models\ProcessStatusId())
            ->setid(1000000),
        (new \HarmSmits\BolComClient\Models\ProcessStatusId())
            ->setid(1000001), 
    ])
);
```

## getProcessStatus

```php
$processStatus = $client->getProcessStatus(1000000);
```