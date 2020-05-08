# Orders

## getOrders

Gets a paginated list of all open orders sorted by date in descending order.

```php
$reducedOrders = $client->getOrders();
```

## getOrder

Gets an order by order id.

```php
$order = $client->getOrder("100000");
```

## cancelOrder

This endpoint can be used to either confirm a cancellation request by the customer or to cancel an order you yourself
are unable to fulfil.

```php
$processStatus = $client->cancelOrder("100000", (new \HarmSmits\BolComClient\Models\Cancellation())
    ->setReasonCode(\HarmSmits\BolComClient\Models\Cancellation::REASON_CODE_OUT_OF_STOCK)
);
```

## shipOrder

Ship a single order item within a customer order by providing shipping information. In case you purchased a shipping
label you can add the shippingLabelCode to this message. In that case the transport element must be left empty. If you
ship the item(s) using your own transporter method you must omit the shippingLabelCode entirely.

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