# Offers

## createOffer

Creates a new offer, and adds it to the catalog. After creation, status information can be retrieved to review if the
offer is valid and published to the shop.

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

Request an offer export file containing all offers.

```php
$processStatus = $client->requestOfferExportFile((new \HarmSmits\BolComClient\Models\CreateOfferExportRequest())
    ->setFormat("CSV")
);
```

## getOfferExportFile

Retrieve an offer export file containing all offers.

```php
$raw_data = $client->getOfferExportFile("12390-123123-1231-23");
```

## getOffer

Retrieve an offer by using the offer id provided to you when creating or listing your offers.

```php
$retailerOffer = $client->getOffer("100000");
```

## updateOffer

Use this endpoint to send an offer update. This endpoint returns a process status.

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

Delete an offer by id.

```php
$processStatus = $client->deleteOffer("100000");
```

## updateOfferPrice

Update price(s) for offer by id.

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

Update stock for offer by id.

```php
$processStatus = $client->updateOfferStock("100000", (new \HarmSmits\BolComClient\Models\UpdateOfferStockRequest())
    ->setAmount(999)
    ->setManagedByRetailer(true)
);
```