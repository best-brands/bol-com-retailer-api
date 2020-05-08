# Offers

## createOffer

```php
$processStatus = $client->createOffer((new \HarmSmits\BolComClient\Models\CreateOfferRequest())
    ->setEan("123456789")
    ->setCondition((new \HarmSmits\BolComClient\Models\Condition())
        ->setName(\HarmSmits\BolComClient\Models\Condition::NAME_AS_NEW)
        ->setCategory(\HarmSmits\BolComClient\Models\Condition::CATEGORY_NEW)
        ->setComment("")
    )
    ->setReferenceCode("My own reference")
    ->setOnHoldByRetailer(false)
    ->setUnknownProductTitle("")
    ->setPricing((new \HarmSmits\BolComClient\Models\Pricing())
        ->setBundlePrices([
            (new \HarmSmits\BolComClient\Models\BundlePrice())
                ->setQuantity(1)
                ->setPrice(1000),
            (new \HarmSmits\BolComClient\Models\BundlePrice())
                ->setQuantity(5)
                ->setPrice(9000)
        ])
    )
    ->setStock((new \HarmSmits\BolComClient\Models\StockCreate())
        ->setAmount(999)
        ->setManagedByRetailer(true)
    )
    ->setFulfilment((new \HarmSmits\BolComClient\Models\Fulfilment())
        ->setType(\HarmSmits\BolComClient\Models\Fulfilment::TYPE_FBB)
        ->setDeliveryCode(\HarmSmits\BolComClient\Models\Fulfilment::DELIVERY_CODE_4_8d)
        ->setPickUpPoints([
            (new \HarmSmits\BolComClient\Models\PickUpPoint())
                ->setCode("PUP_AH_NL")
        ])
    )
);
```

## requestOfferExportFile

```php
$processStatus = $client->requestOfferExportFile((new \HarmSmits\BolComClient\Models\CreateOfferExportRequest())
    ->setFormat("CSV")
);
```

## getOfferExportFile

```php
$raw_data = $client->getOfferExportFile("12390-123123-1231-23");
```

## getOffer

```php
$retailerOffer = $client->getOffer("100000");
```

## updateOffer

```php
$processStatus = $client->updateOffer("100000", (new \HarmSmits\BolComClient\Models\UpdateOfferRequest())
    ->setReferenceCode("My reference")
    ->setOnHoldByRetailer(false)
    ->setUnknownProductTitle("")
    ->setFulfilment((new \HarmSmits\BolComClient\Models\Fulfilment())
        ->setType(\HarmSmits\BolComClient\Models\Fulfilment::TYPE_FBB)
        ->setDeliveryCode(\HarmSmits\BolComClient\Models\Fulfilment::DELIVERY_CODE_4_8d)
        ->setPickUpPoints([
            (new \HarmSmits\BolComClient\Models\PickUpPoint())
                ->setCode("PUP_AH_NL")
        ])
    )
);
```

## deleteOffer

```php
$processStatus = $client->deleteOffer("100000");
```

## updateOfferPrice

```php
$processStatus = $client->updateOfferPrice("100000", (new \HarmSmits\BolComClient\Models\UpdateOfferPriceRequest())
    ->setPricing((new \HarmSmits\BolComClient\Models\Pricing())
        ->setBundlePrices([
            (new \HarmSmits\BolComClient\Models\BundlePrice())
                ->setQuantity(1)
                ->setPrice(1000)
        ])
    )
);
```

## updateOfferStock

```php
$processStatus = $client->updateOfferStock("100000", (new \HarmSmits\BolComClient\Models\UpdateOfferStockRequest())
    ->setAmount(999)
    ->setManagedByRetailer(true)
);
```