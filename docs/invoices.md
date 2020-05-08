# Invoices

## getInvoices

```php
$pdfs = $client->getInvoices("2018-03-31", "2019-03-31");
```
## getInvoicesByInvoiceId

```php
$pdf = $client->getInvoicesByInvoiceId(1000000);
```

## getInvoicesByInvoiceIdSpecification

```php
$data = $client->getInvoicesByInvoiceIdSpecification(1000000);
```