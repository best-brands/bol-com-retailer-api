# Transports

## updateShipment

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