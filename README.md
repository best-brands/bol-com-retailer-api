# bol-com-retailer-api

A simple bol.com PHP API

## Usage

```php
$client = new \HarmSmits\BolComClient\Client(
    "clientId",
    "clientSecret"
);
```

## Supported requests

All requests are supported. Every method was named by means of converting the API endpoint for sound naming. This could
be changed later, but for now the methods will be like the api endpoint names for sake of usability.

- [Commission](./docs/commission.md)
- [Inbounds](./docs/inbounds.md)
- [Insights](./docs/insights.md)
- [Inventory](./docs/inventory.md)
- [Invoices](./docs/invoices.md)
- [Offers](./docs/offers.md)
- [Orders](./docs/orders.md)
- [Process Status](./docs/process_status.md)
- [Reductions](./docs/reductions.md)
- [Returns](./docs/returns.md)
- [Shipments](./docs/shipments.md)
- [Shipping Labels](./docs/shipping_labels.md)
- [Transports](./docs/transports.md)
