# Reductions

## getReductions

This endpoint will return a list EAN’s that are eligible for reductions on the commission fee.

```php
$data = $client->getReductions();
```

## getReductionsLatest

This endpoint below will return a filename of the latest reductions list. The response from this endpoint can be
compared to the response header that was given back from the Get Reductions List endpoint

```php
$data = $client->getReductionsLatest();
```