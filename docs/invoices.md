# Invoices

## getInvoices

Gets a list of invoices, by default from the past 4 weeks. The optional period-start and period-end parameters can be
used together to retrieve invoices from a specific date range in the past, the period can be no longer than 31 days.
Invoices and their specifications can be downloaded separately in different media formats with the ‘GET an invoice by
id’ and the ‘GET an invoice specification by id’ calls. The available media types differ per invoice and are listed per
invoice within the response. Note: the media types listed in the response must be given in our standard API format.

```php
$pdfs = $client->getInvoices("2018-03-31", "2019-03-31");
```

## getInvoice

Gets an invoice by invoice id. The available media types differ per invoice and are listed within the response from the
‘GET all invoices’ call. Note: the media types listed in the response must be given in our standard API format.

```php
$pdf = $client->getInvoice(1000000);
```

## getInvoiceSpecification

Gets an invoice specification for an invoice with a paginated list of its transactions. The available media types differ
per invoice specification and are listed within the response from the ‘GET all invoices’ call. Note, the media types
listed in the response must be given in our standard API format.

```php
$data = $client->getInvoiceSpecification(1000000);
```