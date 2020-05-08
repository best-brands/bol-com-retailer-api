# Orders

## getOrders

```php
$reducedOrders = $client->getOrders();
```

## getOrder

```php
$order = $client->getOrder("100000");
```

## cancelOrder

```php
$processStatus = $client->cancelOrder("100000", (new \HarmSmits\BolComClient\Models\Cancellation())
    ->setReasonCode(\HarmSmits\BolComClient\Models\Cancellation::REASON_CODE_OUT_OF_STOCK)
);
```

## shipOrder

```php
$processStatus = $client->shipOrder("100000", (new \HarmSmits\BolComClient\Models\ShipmentRequest())
    ->setShipmentReference("Your reference")
    ->setShippingLabelCode("TNT")
    ->setTransport((new \HarmSmits\BolComClient\Models\TransportInstruction())
        ->setTransporterCode("TNT")
        ->setTrackAndTrace("AD987FAKJH12349")
    )
);
```