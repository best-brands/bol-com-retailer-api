# Process status

## getProcessStatuses

Retrieve a list of process statuses, which shows information regarding previously executed PUT/POST/DELETE requests in
descending order. You need to supply an entity id and event type.

```php
$processStatusResponse = $client->getProcessStatuses("100000", "CONFIRM_SHIPMENT");
```

## queryProcessStatuses

Retrieve a list of process statuses, which shows information regarding previously executed PUT/POST/DELETE requests. No
more than 1000 process status id's can be sent in a single request.

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

Retrieve a specific process-status, which shows information regarding a previously executed PUT/POST/DELETE request.
All PUT/POST/DELETE requests on the other endpoints will supply a process-status-id in the related response. You can use
this id to retrieve a status by using the endpoint below.

```php
$processStatus = $client->getProcessStatus(1000000);
```