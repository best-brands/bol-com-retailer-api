# Commission

## postCommission

```php
$bulkCommissionResponse = $client->postCommission((new \HarmSmits\BolComClient\Models\BulkCommissionRequest())
    ->setCommissionQueries([
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("123456789"),
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("987654321"),
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("111111111"),
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("999999999"),
    ])
);
```

## getCommissionByEan

```php
$commission = $client->getCommissionByEan("123456789");
```
