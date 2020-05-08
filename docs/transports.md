# Transports

## putTransportsByTransportId

```php
$processStatus = $client->putTransportsByTransportId(10000, (new \HarmSmits\BolComClient\Models\ChangeTransportRequest())
    ->setTrackAndTrace("SDOFS897SADF")
    ->setTransporterCode("TNT")
);
```

## getTransportsByTransportIdShippingLabel

```php
$pdfs = $client->getTransportsByTransportIdShippingLabel(10000);
```