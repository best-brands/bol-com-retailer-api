# Inbounds

## getInboundShipments

```php
$inbounds = $client->getInboundShipments(null, null, null, null, "ArrivedAtWH", 2);
```

##  postInbound

```php
$processStatus = $client->createInboundShipment((new \HarmSmits\BolComClient\Models\InboundRequest())
    ->setTimeSlot((new \HarmSmits\BolComClient\Models\TimeSlot())
        ->setStart("Starting date")
        ->setEnd("Ending date")
    )
    ->setFbbTransporter((new \HarmSmits\BolComClient\Models\Transporter())
        ->setCode("TNT")
        ->setName("TNT")
    )
    ->setLabellingService(false)
    ->setProducts([
        (new \HarmSmits\BolComClient\Models\InboundProductRequest())
            ->setEan("123456789")
            ->setState("Announced")
            ->setReceivedQuantity(10)
            ->setAnnouncedQuantity(10),
        (new \HarmSmits\BolComClient\Models\InboundProductRequest())
            ->setEan("987654321")
            ->setState("Unknown")
            ->setReceivedQuantity(1)
            ->setAnnouncedQuantity(1)
    ])
);
```

## getDeliveryWindows

```php
$deliveryWindowsForInboundShipments = $client->getDeliveryWindows(null, 10);
```

## getFbbTransporters

```php
$transportersResponse = $client->getFbbTransporters();
```

## getProductLabel

```php
$pfds = $client->getProductLabel((new \HarmSmits\BolComClient\Models\ProductLabelsRequest())
    ->setFormat("AVERY_J8159")
    ->setProductLabels([
        (new \HarmSmits\BolComClient\Models\ProductLabel())
            ->setEan("123456789")
            ->setQuantity(1),
        (new \HarmSmits\BolComClient\Models\ProductLabel())
            ->setEan("987654321")
            ->setQuantity(10)
    ])
);
```

## getInboundShipment

```php
$inbound = $client->getInboundShipment(123456789);
```

## getPackingList

```php
$pdfs = $client->getPackingList(123456789);
```

## getShippingLabel

```php
$pdfs = $client->getShippingLabel(123456789);
```