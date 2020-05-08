# Transports

## updateShipment

Add information to an existing transport. The transport id is part of the shipment. You can retrieve the transport id
through the GET shipment list request.

```php
$processStatus = $client->updateShipment(10000, (new \HarmSmits\BolComClient\Models\ChangeTransportRequest())
    ->setTrackAndTrace("SDOFS897SADF")
    ->setTransporterCode("TNT")
);
```

## getShipmentLabel

```php
$pdfs = $client->getShipmentLabel(10000);
```