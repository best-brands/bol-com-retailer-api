# Inbounds

## getInbounds

```php
$inbounds = $client->getInbounds(null, null, null, null, "ArrivedAtWH", 2);
```

##  postInbound

```php
$processStatus = $client->postInbounds((new \HarmSmits\BolComClient\Models\InboundRequest())
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

## getInboundsDeliveryWindows

```php
$deliveryWindowsForInboundShipments = $client->getInboundsDeliveryWindows(null, 10);
```

## getInboundsFbbTransporters

```php
$transportersResponse = $client->getInboundsFbbTransporters();
```

## postInboundsProductlabels

```php
$pfds = $client->postInboundsProductlabels((new \HarmSmits\BolComClient\Models\ProductLabelsRequest())
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

## getInboundsByInboundId

```php
$inbound = $client->getInboundsByInboundId(123456789);
```

## getInboundsByInboundIdPackinglist

```php
$pdfs = $client->getInboundsByInboundIdPackinglist(123456789);
```

## getInboundsByInboundIdShippinglabel

```php
$pdfs = $client->getInboundsByInboundIdShippinglabel(123456789);
```