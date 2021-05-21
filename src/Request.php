<?php

namespace HarmSmits\BolComClient;

use HarmSmits\BolComClient\Models\BulkCommissionRequest;
use HarmSmits\BolComClient\Models\CreateProductContentRequest;
use HarmSmits\BolComClient\Models\CreateOfferRequest;
use HarmSmits\BolComClient\Models\CreateOfferExportRequest;
use HarmSmits\BolComClient\Models\CreateUnpublishedOfferReportRequest;
use HarmSmits\BolComClient\Models\UpdateOfferRequest;
use HarmSmits\BolComClient\Models\UpdateOfferPriceRequest;
use HarmSmits\BolComClient\Models\UpdateOfferStockRequest;
use HarmSmits\BolComClient\Models\CancelOrderItemsRequest;
use HarmSmits\BolComClient\Models\ShipmentRequest;
use HarmSmits\BolComClient\Models\BulkProcessStatusRequest;
use HarmSmits\BolComClient\Models\CreateReplenishmentRequest;
use HarmSmits\BolComClient\Models\PickupTimeSlotsRequest;
use HarmSmits\BolComClient\Models\ProductLabelsRequest;
use HarmSmits\BolComClient\Models\UpdateReplenishmentRequest;
use HarmSmits\BolComClient\Models\CreateReturnRequest;
use HarmSmits\BolComClient\Models\ReturnRequest;
use HarmSmits\BolComClient\Models\ShippingLabelRequest;
use HarmSmits\BolComClient\Models\DeliveryOptionsRequest;
use HarmSmits\BolComClient\Models\CreateSubscriptionRequest;
use HarmSmits\BolComClient\Models\UpdateSubscriptionRequest;
use HarmSmits\BolComClient\Models\ChangeTransportRequest;

class Request
{
    /**
     * Gets all commissions and possible reductions by EAN, price, and optionally condition.
     *
     * @param BulkCommissionRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function getCommissions(BulkCommissionRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/commission";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'       => 'OBJ',
                    '$ref'        => 'HarmSmits\\BolComClient\\Models\\BulkCommissionResponse',
                    'commissions' =>
                        [
                            '$type'      => 'OBJ_ARRAY',
                            '$ref'       => 'HarmSmits\\BolComClient\\Models\\Commission',
                            'reductions' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\Reduction',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Commissions can be filtered by condition, which defaults to NEW. We will calculate the commission amount from
     * the EAN and price.
     *
     * @param string $ean       The EAN number associated with this product.
     * @param string $condition The condition of the offer.
     * @param int    $unitPrice The price of the product with a period as a decimal separator. The price should always
     *                          have two decimals precision.
     *
     * @return array
     */
    public function getCommission(string $ean, string $condition, int $unitPrice): array
    {
        $data                        = [];
        $url                         = "https://api.bol.com/retailer/commission/{ean}";
        $method                      = "get";
        $url                         = str_replace("{ean}", $ean, $url);
        $data["query"]               = [];
        $data["query"]["condition"]  = $condition;
        $data["query"]["unit-price"] = $unitPrice;
        $data["headers"]             = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                    = [
            200 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Commission',
                    'reductions' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Reduction',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                        = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create content for existing products or new products.
     *
     * @param CreateProductContentRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createProductContent(CreateProductContentRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/content/product";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a validation report of the product content upload based on the upload id.
     *
     * @param string $uploadId The identifier of the product content upload.
     *
     * @return array
     */
    public function getContentValidationReport(string $uploadId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/content/validation-report/{uploadId}";
        $method          = "get";
        $url             = str_replace("{uploadId}", $uploadId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'           => 'OBJ',
                    '$ref'            => 'HarmSmits\\BolComClient\\Models\\ValidationReportResponse',
                    'productContents' =>
                        [
                            '$type'              => 'OBJ_ARRAY',
                            '$ref'               => 'HarmSmits\\BolComClient\\Models\\ProductContentResponse',
                            'rejectedAttributes' =>
                                [
                                    '$type'           => 'OBJ_ARRAY',
                                    '$ref'            => 'HarmSmits\\BolComClient\\Models\\RejectedAttributeResponse',
                                    'rejectionErrors' =>
                                        [
                                            '$type' => 'OBJ_ARRAY',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\RejectionError',
                                        ],
                                ],
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get the product visits and the buy box percentage for an offer during a given period.
     *
     * @param string $offerId         Unique identifier for an offer.
     * @param string $period          The time unit in which the offer insights are grouped.
     * @param int    $numberOfPeriods The number of periods for which the offer insights are requested back in time.
     * @param array  $name            The name of the requested offer insight.
     *
     * @return array
     */
    public function getOfferInsights(string $offerId, string $period, int $numberOfPeriods, array $name): array
    {
        $data                               = [];
        $url                                = "https://api.bol.com/retailer/insights/offer";
        $method                             = "get";
        $data["query"]                      = [];
        $data["query"]["offer-id"]          = $offerId;
        $data["query"]["period"]            = $period;
        $data["query"]["number-of-periods"] = $numberOfPeriods;
        $data["query"]["name"]              = $name;
        $data["headers"]                    = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                           = [
            200 =>
                [
                    '$type'         => 'OBJ',
                    '$ref'          => 'HarmSmits\\BolComClient\\Models\\OfferInsights',
                    'offerInsights' =>
                        [
                            '$type'     => 'OBJ_ARRAY',
                            '$ref'      => 'HarmSmits\\BolComClient\\Models\\OfferInsight',
                            'countries' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\OfferInsightsCountry',
                                ],
                            'periods'   =>
                                [
                                    '$type'     => 'OBJ_ARRAY',
                                    '$ref'      => 'HarmSmits\\BolComClient\\Models\\Periods',
                                    'period'    =>
                                        [
                                            '$type' => 'OBJ',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\OfferInsightsPeriod',
                                        ],
                                    'countries' =>
                                        [
                                            '$type' => 'OBJ_ARRAY',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\OfferInsightsCountry',
                                        ],
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                               = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets the measurements for your performance indicators per week.
     *
     * @param array  $name The type of the performance indicator
     * @param string $year Year number in the ISO-8601 standard.
     * @param string $week Week number in the ISO-8601 standard. If you would like to get the relative scores from the
     *                     current week, please provide the current week number here. Be advised that measurements can
     *                     change heavily over the course of the week.
     *
     * @return array
     */
    public function getPerformanceIndicatorInsights(array $name, string $year, string $week): array
    {
        $data                  = [];
        $url                   = "https://api.bol.com/retailer/insights/performance/indicator";
        $method                = "get";
        $data["query"]         = [];
        $data["query"]["name"] = $name;
        $data["query"]["year"] = $year;
        $data["query"]["week"] = $week;
        $data["headers"]       = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response              = [
            200 =>
                [
                    '$type'                 => 'OBJ',
                    '$ref'                  => 'HarmSmits\\BolComClient\\Models\\PerformanceIndicators',
                    'performanceIndicators' =>
                        [
                            '$type'   => 'OBJ_ARRAY',
                            '$ref'    => 'HarmSmits\\BolComClient\\Models\\PerformanceIndicator',
                            'details' =>
                                [
                                    '$type'  => 'OBJ',
                                    '$ref'   => 'HarmSmits\\BolComClient\\Models\\Details',
                                    'period' =>
                                        [
                                            '$type' => 'OBJ',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\PerformanceIndicatorPeriod',
                                        ],
                                    'score'  =>
                                        [
                                            '$type' => 'OBJ',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Score',
                                        ],
                                    'norm'   =>
                                        [
                                            '$type' => 'OBJ',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Norm',
                                        ],
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                  = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get sales forecast to estimate the sales expectations on the total bol.com platform for the requested number of
     * weeks ahead.
     *
     * @param string $offerId    Unique identifier for an offer.
     * @param int    $weeksAhead The number of weeks into the future, starting from today.
     *
     * @return array
     */
    public function getSalesForecastInsights(string $offerId, int $weeksAhead): array
    {
        $data                         = [];
        $url                          = "https://api.bol.com/retailer/insights/sales-forecast";
        $method                       = "get";
        $data["query"]                = [];
        $data["query"]["offer-id"]    = $offerId;
        $data["query"]["weeks-ahead"] = $weeksAhead;
        $data["headers"]              = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                     = [
            200 =>
                [
                    '$type'     => 'OBJ',
                    '$ref'      => 'HarmSmits\\BolComClient\\Models\\SalesForecastResponse',
                    'total'     =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Total',
                        ],
                    'countries' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Countries',
                        ],
                    'periods'   =>
                        [
                            '$type'     => 'OBJ_ARRAY',
                            '$ref'      => 'HarmSmits\\BolComClient\\Models\\SalesForecastPeriod',
                            'total'     =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\Total',
                                ],
                            'countries' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\Countries',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                         = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieves the search volume for a specified search term and period. The search volume allows you to see what
     * bol.com customers are searching for. Based on the search volume per search term you can optimize your product
     * content, or spot opportunities to extend your assortment, or analyzing trends for inventory management.
     *
     * @param string $searchTerm         The search term for which you want to request the search volume.
     * @param string $period             The time unit in which the offer insights are grouped.
     * @param int    $numberOfPeriods    The number of periods for which the offer insights are requested back in time.
     * @param bool   $relatedSearchTerms Indicates whether or not you want to retrieve the related search terms.
     *
     * @return array
     */
    public function getSearchTermsInsights(
        string $searchTerm,
        string $period,
        int $numberOfPeriods,
        bool $relatedSearchTerms = true
    ): array {
        $data                                  = [];
        $url                                   = "https://api.bol.com/retailer/insights/search-terms";
        $method                                = "get";
        $data["query"]                         = [];
        $data["query"]["search-term"]          = $searchTerm;
        $data["query"]["period"]               = $period;
        $data["query"]["number-of-periods"]    = $numberOfPeriods;
        $data["query"]["related-search-terms"] = $relatedSearchTerms;
        $data["headers"]                       = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                              = [
            200 =>
                [
                    '$type'       => 'OBJ',
                    '$ref'        => 'HarmSmits\\BolComClient\\Models\\SearchTerms',
                    'searchTerms' =>
                        [
                            '$type'              => 'OBJ',
                            '$ref'               => 'HarmSmits\\BolComClient\\Models\\SearchTerm',
                            'countries'          =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\SearchTermsCountry',
                                ],
                            'periods'            =>
                                [
                                    '$type'     => 'OBJ_ARRAY',
                                    '$ref'      => 'HarmSmits\\BolComClient\\Models\\TotalPeriod',
                                    'period'    =>
                                        [
                                            '$type' => 'OBJ',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\SearchTermsPeriod',
                                        ],
                                    'countries' =>
                                        [
                                            '$type' => 'OBJ_ARRAY',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\SearchTermsCountry',
                                        ],
                                ],
                            'relatedSearchTerms' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\RelatedSearchTerm',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                                  = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * The inventory endpoint is a specific LVB/FBB endpoint. It provides a paginated list containing your fulfilment
     * by bol.com inventory. This endpoint does not provide information about your own stock.
     *
     * @param int    $page     The requested page number with a page size of 50 items.
     * @param array  $quantity Filter inventory by providing a range of quantity (min-range)-(max-range). Note that if
     *                         no state query is submitted in the same request, then the quantity will be filtered on
     *                         regularStock by default.
     * @param string $stock    Filter inventory by stock level.
     * @param string $state    Filter inventory by stock type.
     * @param string $query    Filter inventory by EAN or product title.
     *
     * @return array
     */
    public function getInventory(
        int $page = 1,
        ?array $quantity = null,
        ?string $stock = null,
        ?string $state = null,
        ?string $query = null
    ): array {
        $data                      = [];
        $url                       = "https://api.bol.com/retailer/inventory";
        $method                    = "get";
        $data["query"]             = [];
        $data["query"]["page"]     = $page;
        $data["query"]["quantity"] = $quantity;
        $data["query"]["stock"]    = $stock;
        $data["query"]["state"]    = $state;
        $data["query"]["query"]    = $query;
        $data["headers"]           = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                  = [
            200 =>
                [
                    '$type'     => 'OBJ',
                    '$ref'      => 'HarmSmits\\BolComClient\\Models\\InventoryResponse',
                    'inventory' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Inventory',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                      = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a list of invoices, by default from the past 4 weeks. The optional period-start-date and
     * period-end-date-date parameters can be used together to retrieve invoices from a specific date range in the
     * past, the period can be no longer than 31 days. Invoices and their specifications can be downloaded separately
     * in different media formats with the ‘GET an invoice by id’ and the ‘GET an invoice specification by id’ calls.
     * The available media types differ per invoice and are listed per invoice within the response. Note: the media
     * types listed in the response must be given in our standard API format.
     *
     * @param string $periodStartDate Period start date in ISO 8601 standard.
     * @param string $periodEndDate   Period end date in ISO 8601 standard.
     *
     * @return array
     */
    public function getInvoices(?string $periodStartDate = null, ?string $periodEndDate = null): array
    {
        $data                               = [];
        $url                                = "https://api.bol.com/retailer/invoices";
        $method                             = "get";
        $data["query"]                      = [];
        $data["query"]["period-start-date"] = $periodStartDate;
        $data["query"]["period-end-date"]   = $periodEndDate;
        $data["headers"]                    = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                           = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                               = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets an invoice by invoice id. The available media types differ per invoice and are listed within the response
     * from the ‘GET all invoices’ call. Note: the media types listed in the response must be given in our standard
     * API format.
     *
     * @param string $invoiceId The id of the invoice
     *
     * @return array
     */
    public function getInvoice(string $invoiceId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/invoices/{invoice-id}";
        $method          = "get";
        $url             = str_replace("{invoice-id}", $invoiceId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets an invoice specification for an invoice with a paginated list of its transactions. The available media
     * types differ per invoice specification and are listed within the response from the ‘GET all invoices’ call.
     * Note, the media types listed in the response must be given in our standard API format.
     *
     * @param string $invoiceId The id of the invoice.
     * @param int    $page      The page to get, defaults to page 1. Each page contains a maximum of 25,000 lines.
     *
     * @return array
     */
    public function getInvoiceSpecifications(string $invoiceId, int $page = 1): array
    {
        $data                  = [];
        $url                   = "https://api.bol.com/retailer/invoices/{invoice-id}/specification";
        $method                = "get";
        $url                   = str_replace("{invoice-id}", $invoiceId, $url);
        $data["query"]         = [];
        $data["query"]["page"] = $page;
        $data["headers"]       = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response              = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                  = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Creates a new offer, and adds it to the catalog. After creation, status information can be retrieved to review
     * if the offer is valid and published to the shop.
     *
     * @param CreateOfferRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createOffer(CreateOfferRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Request an offer export file containing all offers.
     *
     * @param CreateOfferExportRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createOfferExport(CreateOfferExportRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/export";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve an offer export file containing all offers.
     *
     * @param string $reportId Unique identifier for an offer export report.
     *
     * @return array
     */
    public function getOfferExport(string $reportId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/export/{report-id}";
        $method          = "get";
        $url             = str_replace("{report-id}", $reportId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+csv',
        ];
        $response        = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Request an unpublished offer report containing all unpublished offers and reasons.
     *
     * @param CreateUnpublishedOfferReportRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createUnpublishedOfferReport(CreateUnpublishedOfferReportRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/unpublished";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve an unpublished offer report containing all unpublished offers and reasons.
     *
     * @param string $reportId Unique identifier for unpublished offer report.
     *
     * @return array
     */
    public function getUnpublishedOfferReport(string $reportId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/unpublished/{report-id}";
        $method          = "get";
        $url             = str_replace("{report-id}", $reportId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+csv',
        ];
        $response        = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve an offer by using the offer id provided to you when creating or listing your offers.
     *
     * @param string $offerId Unique identifier for an offer.
     *
     * @return array
     */
    public function getOffer(string $offerId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/{offer-id}";
        $method          = "get";
        $url             = str_replace("{offer-id}", $offerId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'                 => 'OBJ',
                    '$ref'                  => 'HarmSmits\\BolComClient\\Models\\RetailerOffer',
                    'pricing'               =>
                        [
                            '$type'        => 'OBJ',
                            '$ref'         => 'HarmSmits\\BolComClient\\Models\\Pricing',
                            'bundlePrices' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\BundlePrice',
                                ],
                        ],
                    'stock'                 =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Stock',
                        ],
                    'fulfilment'            =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Fulfilment',
                        ],
                    'store'                 =>
                        [
                            '$type'   => 'OBJ',
                            '$ref'    => 'HarmSmits\\BolComClient\\Models\\Store',
                            'visible' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\CountryCode',
                                ],
                        ],
                    'condition'             =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Condition',
                        ],
                    'notPublishableReasons' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\NotPublishableReason',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Use this endpoint to send an offer update. This endpoint returns a process status.
     *
     * @param string             $offerId Unique identifier for an offer.
     * @param UpdateOfferRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateOffer(string $offerId, UpdateOfferRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/{offer-id}";
        $method          = "put";
        $url             = str_replace("{offer-id}", $offerId, $url);
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Delete an offer by id.
     *
     * @param string $offerId Unique identifier for an offer.
     *
     * @return array
     */
    public function deleteOffer(string $offerId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/{offer-id}";
        $method          = "delete";
        $url             = str_replace("{offer-id}", $offerId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Update price(s) for offer by id.
     *
     * @param string                  $offerId Unique identifier for an offer.
     * @param UpdateOfferPriceRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateOfferPrice(string $offerId, UpdateOfferPriceRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/{offer-id}/price";
        $method          = "put";
        $url             = str_replace("{offer-id}", $offerId, $url);
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Update stock for offer by id.
     *
     * @param string                  $offerId Unique identifier for an offer.
     * @param UpdateOfferStockRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateOfferStock(string $offerId, UpdateOfferStockRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/offers/{offer-id}/stock";
        $method          = "put";
        $url             = str_replace("{offer-id}", $offerId, $url);
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a paginated list of all orders sorted by date in descending order. To create a pick list you can set state
     * to open.
     *
     * @param int    $page             The requested page number with a page size of 50 items.
     * @param string $fulfilmentMethod The fulfilment method. Fulfilled by the retailer (FBR) or fulfilled by bol.com
     *                                 (FBB).
     * @param string $status           Determines whether you want to retrieve orders including or excluding shipped
     *                                 and/or cancelled items.
     *
     * @return array
     */
    public function getOrders(?int $page = null, ?string $fulfilmentMethod = null, ?string $status = null): array
    {
        $data                               = [];
        $url                                = "https://api.bol.com/retailer/orders";
        $method                             = "get";
        $data["query"]                      = [];
        $data["query"]["page"]              = $page;
        $data["query"]["fulfilment-method"] = $fulfilmentMethod;
        $data["query"]["status"]            = $status;
        $data["headers"]                    = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                           = [
            200 =>
                [
                    '$type'  => 'OBJ',
                    '$ref'   => 'HarmSmits\\BolComClient\\Models\\ReducedOrders',
                    'orders' =>
                        [
                            '$type'      => 'OBJ_ARRAY',
                            '$ref'       => 'HarmSmits\\BolComClient\\Models\\ReducedOrder',
                            'orderItems' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReducedOrderItem',
                                ],
                        ],
                ],
        ];
        $data                               = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * This endpoint can be used to either confirm a cancellation request by the customer or to cancel an order item you
     * yourself are unable to fulfil.
     *
     * @param CancelOrderItemsRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function cancelOrderItems(CancelOrderItemsRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/orders/cancellation";
        $method          = "put";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Ship a single order item within a customer order by providing shipping information. In case you purchased a
     * shipping label you can add the shippingLabelId to this message; in that case the transport element must be left
     * empty. If you ship the item(s) using your own transporter method you must omit the shippingLabelId entirely.
     *
     * @param ShipmentRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateShipment(ShipmentRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/orders/shipment";
        $method          = "put";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets an order by order id. The order can be partially shipped or cancelled, the message contains the quantity
     * shipped or cancelled items.
     *
     * @param string $orderId The id of the order to get.
     *
     * @return array
     */
    public function getOrder(string $orderId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/orders/{order-id}";
        $method          = "get";
        $url             = str_replace("{order-id}", $orderId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'           => 'OBJ',
                    '$ref'            => 'HarmSmits\\BolComClient\\Models\\Order',
                    'shipmentDetails' =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ShipmentDetails',
                        ],
                    'billingDetails'  =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\BillingDetails',
                        ],
                    'orderItems'      =>
                        [
                            '$type'              => 'OBJ_ARRAY',
                            '$ref'               => 'HarmSmits\\BolComClient\\Models\\OrderOrderItem',
                            'fulfilment'         =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\OrderFulfilment',
                                ],
                            'offer'              =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\OrderOffer',
                                ],
                            'product'            =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\OrderProduct',
                                ],
                            'additionalServices' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\AdditionalService',
                                ],
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of process statuses, which shows information regarding previously executed PUT/POST/DELETE
     * requests in descending order. You need to supply an entity id and event type.Please note: process status
     * instances are only retained for a limited period of time after completion. Outside of this period, deleted
     * process statuses will no longer be returned. Please handle this accordingly, by stopping any active polling for
     * these statuses.
     *
     * @param string $entityId  The entity id is not unique so you need to provide an event type. The entity id can
     *                          either be order item id, transport id, return number or inbound reference.
     * @param string $eventType The event type can only be used in combination with the entity id.
     * @param int    $page      The requested page number with a page size of 50 items.
     *
     * @return array
     */
    public function getProcessStatus(string $entityId, string $eventType, ?int $page = null): array
    {
        $data                        = [];
        $url                         = "https://api.bol.com/retailer/process-status";
        $method                      = "get";
        $data["query"]               = [];
        $data["query"]["entity-id"]  = $entityId;
        $data["query"]["event-type"] = $eventType;
        $data["query"]["page"]       = $page;
        $data["headers"]             = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                    = [
            200 =>
                [
                    '$type'           => 'OBJ',
                    '$ref'            => 'HarmSmits\\BolComClient\\Models\\ProcessStatusResponse',
                    'processStatuses' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                            'links' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                        = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of process statuses, which shows information regarding previously executed PUT/POST/DELETE
     * requests. No more than 1000 process status id's can be sent in a single request.Please note: process status
     * instances are only retained for a limited period of time after completion. Outside of this period, deleted
     * process statuses will no longer be returned. Please handle this accordingly, by stopping any active polling for
     * these statuses.
     *
     * @param BulkProcessStatusRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function getBulkProcessStatus(BulkProcessStatusRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/process-status";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'           => 'OBJ',
                    '$ref'            => 'HarmSmits\\BolComClient\\Models\\ProcessStatusResponse',
                    'processStatuses' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                            'links' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a specific process-status, which shows information regarding a previously executed PUT/POST/DELETE
     * request. All PUT/POST/DELETE requests on the other endpoints will supply a process-status-id in the related
     * response. You can use this id to retrieve a status by using the endpoint below. Please note: process status
     * instances are only retained for a limited period of time after completion. Outside of this period, a 404 will be
     * returned for missing process statuses. Please handle this accordingly, by stopping any active polling for these
     * statuses.
     *
     * @param string $processStatusId The id of the process status being requested. This id is supplied in every
     *                                response to a PUT/POST/DELETE request on the other endpoints.
     *
     * @return array
     */
    public function getDetailedProcessStatus(string $processStatusId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/process-status/{process-status-id}";
        $method          = "get";
        $url             = str_replace("{process-status-id}", $processStatusId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a list of replenishments.
     *
     * @param string|null $reference Custom user defined reference to identify the replenishment.
     * @param string|null $ean       The EAN number associated with this product.
     * @param string|null $startDate The creation start date to find the replenishment. In ISO 8601 format.
     * @param string|null $endDate   The end date of the range to find the replenishment. In ISO 8601 format.
     * @param array|null  $state     The current state(s) of the replenishment.
     * @param int|null    $page      The requested page number with a page size of 50 items.
     *
     * @return array
     */
    public function getReplenishments(
        ?string $reference = null,
        ?string $ean = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?array $state = null,
        ?int $page = null
    ): array {
        $data                        = [];
        $url                         = "https://api.bol.com/retailer/replenishments";
        $method                      = "get";
        $data["query"]               = [];
        $data["query"]["reference"]  = $reference;
        $data["query"]["ean"]        = $ean;
        $data["query"]["start-date"] = $startDate;
        $data["query"]["end-date"]   = $endDate;
        $data["query"]["state"]      = $state;
        $data["query"]["page"]       = $page;
        $data["headers"]             = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                    = [
            200 =>
                [
                    '$type'          => 'OBJ',
                    '$ref'           => 'HarmSmits\\BolComClient\\Models\\ReplenishmentsResponse',
                    'replenishments' =>
                        [
                            '$type'        => 'OBJ_ARRAY',
                            '$ref'         => 'HarmSmits\\BolComClient\\Models\\ReducedReplenishment',
                            'lines'        =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReducedReplenishmentLines',
                                ],
                            'invalidLines' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReducedInvalidReplenishmentLine',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                        = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create a replenishment.
     *
     * @param CreateReplenishmentRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createReplenishment(CreateReplenishmentRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/replenishments";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve pickup time slots.
     *
     * @param PickupTimeSlotsRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createReplenishmentsPickupTimeSlots(PickupTimeSlotsRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/replenishments/pickup-time-slots";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'     => 'OBJ',
                    '$ref'      => 'HarmSmits\\BolComClient\\Models\\PickupTimeSlotsResponse',
                    'timeSlots' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\PickupTimeSlot',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve product labels.
     *
     * @param ProductLabelsRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createReplenishmentsProductLabels(ProductLabelsRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/replenishments/product-labels";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+pdf',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a replenishment by replenishment id.
     *
     * @param string $replenishmentId The unique identifier of the replenishment.
     *
     * @return array
     */
    public function getReplenishment(string $replenishmentId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/replenishments/{replenishment-id}";
        $method          = "get";
        $url             = str_replace("{replenishment-id}", $replenishmentId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'               => 'OBJ',
                    '$ref'                => 'HarmSmits\\BolComClient\\Models\\ReplenishmentResponse',
                    'deliveryInformation' =>
                        [
                            '$type'                => 'OBJ',
                            '$ref'                 => 'HarmSmits\\BolComClient\\Models\\DeliveryInformation',
                            'destinationWarehouse' =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\DestinationWarehouse',
                                ],
                        ],
                    'pickupAppointment'   =>
                        [
                            '$type'          => 'OBJ',
                            '$ref'           => 'HarmSmits\\BolComClient\\Models\\PickupAppointment',
                            'address'        =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\Address',
                                ],
                            'pickupTimeSlot' =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReplenishmentPickupTimeSlot',
                                ],
                        ],
                    'loadCarriers'        =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\LoadCarrier',
                        ],
                    'lines'               =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReplenishmentLine',
                        ],
                    'invalidLines'        =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\InvalidReplenishmentLine',
                        ],
                    'stateTransitions'    =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\StateTransition',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Update a replenishment.
     *
     * @param string                     $replenishmentId The unique identifier of the replenishment.
     * @param UpdateReplenishmentRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateReplenishment(
        string $replenishmentId,
        UpdateReplenishmentRequest $body
    ): array {
        $data            = [];
        $url             = "https://api.bol.com/retailer/replenishments/{replenishment-id}";
        $method          = "put";
        $url             = str_replace("{replenishment-id}", $replenishmentId, $url);
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve the load carrier labels.
     *
     * @param string $replenishmentId The unique identifier of the replenishment.
     * @param string $labelType       The type of label which you want to print.
     *
     * @return array
     */
    public function getReplenishmentLoadCarrierLabels(string $replenishmentId, string $labelType): array
    {
        $data                        = [];
        $url                         = "https://api.bol.com/retailer/replenishments/{replenishment-id}/load-carrier-labels";
        $method                      = "get";
        $url                         = str_replace("{replenishment-id}", $replenishmentId, $url);
        $data["query"]               = [];
        $data["query"]["label-type"] = $labelType;
        $data["headers"]             = [
            'Accept' => 'application/vnd.retailer.v5+pdf',
        ];
        $response                    = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                        = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve the pick list.
     *
     * @param string $replenishmentId The unique identifier of the replenishment.
     *
     * @return array
     */
    public function getReplenishmentsPickList(string $replenishmentId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/replenishments/{replenishment-id}/pick-list";
        $method          = "get";
        $url             = str_replace("{replenishment-id}", $replenishmentId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+pdf',
        ];
        $response        = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get a paginated list of multi-item returns, which are sorted by date in descending order.
     *
     * @param int|null    $page             The page to get with a page size of 50.
     * @param bool        $handled          The status of the returns you wish to see, shows either handled or
     *                                      unhandled
     *                                      returns.
     * @param string|null $fulfilmentMethod The fulfilment method. Fulfilled by the retailer (FBR) or fulfilled by
     *                                      bol.com
     *                                      (FBB).
     *
     * @return array
     */
    public function getReturns(?int $page = null, ?bool $handled = null, ?string $fulfilmentMethod = null): array
    {
        $data                               = [];
        $url                                = "https://api.bol.com/retailer/returns";
        $method                             = "get";
        $data["query"]                      = [];
        $data["query"]["page"]              = $page;
        $data["query"]["handled"]           = $handled;
        $data["query"]["fulfilment-method"] = $fulfilmentMethod;
        $data["headers"]                    = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                           = [
            200 =>
                [
                    '$type'   => 'OBJ',
                    '$ref'    => 'HarmSmits\\BolComClient\\Models\\ReturnsResponse',
                    'returns' =>
                        [
                            '$type'       => 'OBJ_ARRAY',
                            '$ref'        => 'HarmSmits\\BolComClient\\Models\\ReducedReturn',
                            'returnItems' =>
                                [
                                    '$type'             => 'OBJ_ARRAY',
                                    '$ref'              => 'HarmSmits\\BolComClient\\Models\\ReducedReturnItem',
                                    'returnReason'      =>
                                        [
                                            '$type' => 'OBJ',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReturnReason',
                                        ],
                                    'processingResults' =>
                                        [
                                            '$type' => 'OBJ_ARRAY',
                                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReturnProcessingResult',
                                        ],
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                               = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create a return, and automatically handle it with the provided handling result. When successfully created, the
     * resulting return id is provided in the process status.
     *
     * @param CreateReturnRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createReturn(CreateReturnRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/returns";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a return based on the return id.
     *
     * @param string $returnId Unique identifier for a return.
     *
     * @return array
     */
    public function getReturn(string $returnId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/returns/{return-id}";
        $method          = "get";
        $url             = str_replace("{return-id}", $returnId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'       => 'OBJ',
                    '$ref'        => 'HarmSmits\\BolComClient\\Models\\_Return',
                    'returnItems' =>
                        [
                            '$type'             => 'OBJ_ARRAY',
                            '$ref'              => 'HarmSmits\\BolComClient\\Models\\ReturnItem',
                            'returnReason'      =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReturnReason',
                                ],
                            'processingResults' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReturnProcessingResult',
                                ],
                            'customerDetails'   =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\CustomerDetails',
                                ],
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Allows the user to handle a return. This can be to either handle an open return, or change the handlingResult of
     * an already handled return. The latter is only possible in limited scenarios, please check the returns
     * documentation for a complete list.
     *
     * @param int           $rmaId The RMA (Return Merchandise Authorization) id that identifies this particular
     *                             return.
     * @param ReturnRequest $body  The handling result requested by the retailer.
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateReturn(int $rmaId, ReturnRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/returns/{rma-id}";
        $method          = "put";
        $url             = str_replace("{rma-id}", $rmaId, $url);
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * A paginated list to retrieve all your shipments up to 3 months old. The shipments will be sorted by date in
     * descending order.
     *
     * @param int|null    $page             The page to get with a page size of 50.
     * @param string|null $fulfilmentMethod The fulfilment method. Fulfilled by the retailer (FBR) or fulfilled by
     *                                      bol.com
     *                                      (FBB).
     * @param string|null $orderId          The id of the order. Only valid without fulfilment-method. The default
     *                                      fulfilment-method is ignored.
     *
     * @return array
     */
    public function getShipments(?int $page = null, ?string $fulfilmentMethod = null, ?string $orderId = null): array
    {
        $data                               = [];
        $url                                = "https://api.bol.com/retailer/shipments";
        $method                             = "get";
        $data["query"]                      = [];
        $data["query"]["page"]              = $page;
        $data["query"]["fulfilment-method"] = $fulfilmentMethod;
        $data["query"]["order-id"]          = $orderId;
        $data["headers"]                    = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response                           = [
            200 =>
                [
                    '$type'     => 'OBJ',
                    '$ref'      => 'HarmSmits\\BolComClient\\Models\\ShipmentsResponse',
                    'shipments' =>
                        [
                            '$type'         => 'OBJ_ARRAY',
                            '$ref'          => 'HarmSmits\\BolComClient\\Models\\ReducedShipment',
                            'order'         =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReducedShipmentOrder',
                                ],
                            'shipmentItems' =>
                                [
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReducedShipmentItem',
                                ],
                            'transport'     =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ReducedTransport',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data                               = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a single shipment by its corresponding id.
     *
     * @param string $shipmentId The id of the shipment.
     *
     * @return array
     */
    public function getShipment(string $shipmentId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/shipments/{shipment-id}";
        $method          = "get";
        $url             = str_replace("{shipment-id}", $shipmentId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'           => 'OBJ',
                    '$ref'            => 'HarmSmits\\BolComClient\\Models\\Shipment',
                    'order'           =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ShipmentOrder',
                        ],
                    'shipmentDetails' =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ShipmentDetails',
                        ],
                    'billingDetails'  =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\BillingDetails',
                        ],
                    'shipmentItems'   =>
                        [
                            '$type'      => 'OBJ_ARRAY',
                            '$ref'       => 'HarmSmits\\BolComClient\\Models\\ShipmentItem',
                            'fulfilment' =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ShipmentFulfilment',
                                ],
                            'offer'      =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\OrderOffer',
                                ],
                            'product'    =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\OrderProduct',
                                ],
                        ],
                    'transport'       =>
                        [
                            '$type' => 'OBJ',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\ShipmentTransport',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create a shipping label with a shipping label offer id retrieved from get delivery options.
     *
     * @param ShippingLabelRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createShippingLabel(ShippingLabelRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/shipping-labels";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieves all available delivery options based on the supplied configuration of order items that has to be
     * shipped.
     *
     * @param DeliveryOptionsRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function getShippingLabelsDeliveryOptions(DeliveryOptionsRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/shipping-labels/delivery-options";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'           => 'OBJ',
                    '$ref'            => 'HarmSmits\\BolComClient\\Models\\DeliveryOptionsResponse',
                    'deliveryOptions' =>
                        [
                            '$type'               => 'OBJ_ARRAY',
                            '$ref'                => 'HarmSmits\\BolComClient\\Models\\DeliveryOption',
                            'labelPrice'          =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\LabelPrice',
                                ],
                            'packageRestrictions' =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\PackageRestrictions',
                                ],
                            'handoverDetails'     =>
                                [
                                    '$type' => 'OBJ',
                                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\HandoverDetails',
                                ],
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieves a shipping label by shipping label id. Metadata for the shipping label is added as headers in the
     * response. If you are only interested in the metadata, you can do a HEAD request to retrieve only the headers
     * without the label data.
     *
     * @param string $shippingLabelId The shipping label id.
     *
     * @return array
     */
    public function getShippingLabel(string $shippingLabelId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/shipping-labels/{shipping-label-id}";
        $method          = "get";
        $url             = str_replace("{shipping-label-id}", $shippingLabelId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+pdf',
        ];
        $response        = [
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of all configured and active push notification subscriptions.
     *
     * @return array
     */
    public function getSubscriptions(): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/subscriptions";
        $method          = "get";
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'         => 'OBJ',
                    '$ref'          => 'HarmSmits\\BolComClient\\Models\\SubscriptionsResponse',
                    'subscriptions' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\SubscriptionResponse',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create a push notification subscription for one (or more) of the available resources. The configured URL has to
     * support https scheme.
     *
     * @param CreateSubscriptionRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createSubscription(CreateSubscriptionRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/subscriptions";
        $method          = "post";
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of public keys that should be used to validate the signature header for push notifications
     * received from bol.com.
     *
     * @return array
     */
    public function getSubscriptionsSignatureKeys(): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/subscriptions/signature-keys";
        $method          = "get";
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type'         => 'OBJ',
                    '$ref'          => 'HarmSmits\\BolComClient\\Models\\KeySetResponse',
                    'signatureKeys' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\KeySet',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Send a test push notification to all subscriptions for the provided event.
     *
     * @return array
     */
    public function createSubscriptionTest(): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/subscriptions/test";
        $method          = "post";
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a configured and active push notification subscription with the provided id.
     *
     * @param string $subscriptionId A unique identifier for the subscription.
     *
     * @return array
     */
    public function getSubscription(string $subscriptionId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/subscriptions/{subscription-id}";
        $method          = "get";
        $url             = str_replace("{subscription-id}", $subscriptionId, $url);
        $data["headers"] = [
            'Accept' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            200 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\SubscriptionResponse',
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
            404 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Update an existing push notification subscription with the supplied id. The configured URL has to support https
     * scheme.
     *
     * @param string                    $subscriptionId A unique identifier for the subscription.
     * @param UpdateSubscriptionRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateSubscription(
        string $subscriptionId,
        UpdateSubscriptionRequest $body
    ): array {
        $data            = [];
        $url             = "https://api.bol.com/retailer/subscriptions/{subscription-id}";
        $method          = "put";
        $url             = str_replace("{subscription-id}", $subscriptionId, $url);
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Delete a push notification subscription with the provided id.
     *
     * @param string $subscriptionId A unique identifier for the subscription.
     *
     * @return array
     */
    public function deleteSubscription(string $subscriptionId): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/subscriptions/{subscription-id}";
        $method          = "delete";
        $url             = str_replace("{subscription-id}", $subscriptionId, $url);
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }


    /**
     * Add information to an existing transport. The transport id is part of the shipment. You can retrieve the
     * transport id through the GET shipment list request.
     *
     * @param string                 $transportId The transport id.
     * @param ChangeTransportRequest $body        The change transport requested by the user.
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateTransport(string $transportId, ChangeTransportRequest $body): array
    {
        $data            = [];
        $url             = "https://api.bol.com/retailer/transports/{transport-id}";
        $method          = "put";
        $url             = str_replace("{transport-id}", $transportId, $url);
        $data["body"]    = json_encode($body->__toArray());
        $data["headers"] = [
            'Accept'       => 'application/vnd.retailer.v5+json',
            'Content-Type' => 'application/vnd.retailer.v5+json',
        ];
        $response        = [
            202 =>
                [
                    '$type' => 'OBJ',
                    '$ref'  => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Link',
                        ],
                ],
            400 =>
                [
                    '$type'      => 'OBJ',
                    '$ref'       => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        [
                            '$type' => 'OBJ_ARRAY',
                            '$ref'  => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ],
                ],
        ];
        $data            = $this->recursiveArrayFilter($data);
        return [$method, $url, $data, $response];
    }

    /**
     * Recursively filter an array.
     *
     * @param array $data
     *
     * @return array
     */
    private function recursiveArrayFilter(array &$data): array
    {
        foreach ($data as &$_data) {
            if (is_array($_data)) {
                $_data = $this->recursiveArrayFilter($_data);
            }
        }

        return array_filter($data, static function ($raw) {
            return !is_null($raw);
        });
    }
}
