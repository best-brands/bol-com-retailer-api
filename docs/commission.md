# Commission

## getCommissions

Gets all commissions and possible reductions by EAN, condition and optionally price. No more than 100 EAN`s can be sent
in a single request.

```php
$bulkCommissionResponse = $client->getCommissions((new \HarmSmits\BolComClient\Models\BulkCommissionRequest())
    ->setCommissionQueries([
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("123456789"),
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("987654321"),
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("111111111"),
        (new \HarmSmits\BolComClient\Models\BulkCommissionQuery())->setEan("999999999"),
    ])
);
```

## getCommission

Commissions can be filtered by condition, which defaults to NEW. If price is provided, the exact commission amount will
also be calculated.

```php
$commission = $client->getCommission("123456789");
```
