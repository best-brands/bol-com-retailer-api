# Orders

## getOrders

```php
$reducedOrders = $client->getOrders();
```

## getOrdersByOrderID

```php
$order = $client->getOrdersByOrderId("100000");
```

## putOrdersByOrderItemIdCancellation

```php
$processStatus = $client->putOrdersByOrderItemIdCancellation("100000", (new \HarmSmits\BolComClient\Models\Cancellation())
    ->setReasonCode(\HarmSmits\BolComClient\Models\Cancellation::REASON_CODE_OUT_OF_STOCK)
);
```

## putOrdersByOrderItemIdShipment

```php
$processStatus = $client->putOrdersByOrderItemIdShipment("100000", (new \HarmSmits\BolComClient\Models\ShipmentRequest())
    ->setShipmentReference("Your reference")
    ->setShippingLabelCode("TNT")
    ->setTransport((new \HarmSmits\BolComClient\Models\TransportInstruction())
        ->setTransporterCode("TNT")
        ->setTrackAndTrace("AD987FAKJH12349")
    )
);
```