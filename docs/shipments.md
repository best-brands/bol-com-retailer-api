# Shipments

## getShipments

A paginated list to retrieve all your shipments up to 3 months old. The shipments will be sorted by date in descending
order.

```php
$shipmentResponse = $client->getShipments();
```

## getShipment

Retrieve a single shipment by its corresponding id.

```php
$shipment = $client->getShipment(100000);
```
