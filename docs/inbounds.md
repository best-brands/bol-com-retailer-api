# Inbounds

## getInboundShipments

A paginated list of all inbound shipments.

```php
$inbounds = $client->getInboundShipments(null, null, null, null, "ArrivedAtWH", 2);
```

##  createInboundShipment

Create a new inbound shipment.

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

Retrieve a list of available delivery windows when creating a new inbound shipment.

```php
$deliveryWindowsForInboundShipments = $client->getDeliveryWindows(null, 10);
```

## getFbbTransporters

Get all transporters that carry out FBB shipments.

```php
$transportersResponse = $client->getFbbTransporters();
```

## getProductLabel

Get FBB productlabels by EAN.

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

Get inbound details by inbound id.

```php
$inbound = $client->getInboundShipment(123456789);
```

## getPackingList

Get packing list by inbound id.

```php
$pdfs = $client->getPackingList(123456789);
```

## getShippingLabel

Get FBB shippinglabel by inbound id.

```php
$pdfs = $client->getShippingLabel(123456789);
```