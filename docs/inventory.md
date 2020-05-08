# Inventory

## getInventories

The inventory endpoint is a specific LVB/FBB endpoint. It provides a paginated list containing your fulfilment by
bol.com inventory. This endpoint does not provide information about your own stock.

```php
$inventoryResponse = $client->getInventories(1, ["0-10"]);
```