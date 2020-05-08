<?php

namespace HarmSmits\BolComClient;

use HarmSmits\BolComClient\Models\BulkCommissionRequest;
use HarmSmits\BolComClient\Models\InboundRequest;
use HarmSmits\BolComClient\Models\ProductLabelsRequest;
use HarmSmits\BolComClient\Models\CreateOfferRequest;
use HarmSmits\BolComClient\Models\CreateOfferExportRequest;
use HarmSmits\BolComClient\Models\UpdateOfferRequest;
use HarmSmits\BolComClient\Models\UpdateOfferPriceRequest;
use HarmSmits\BolComClient\Models\UpdateOfferStockRequest;
use HarmSmits\BolComClient\Models\Cancellation;
use HarmSmits\BolComClient\Models\ShipmentRequest;
use HarmSmits\BolComClient\Models\BulkProcessStatusRequest;
use HarmSmits\BolComClient\Models\ReturnRequest;
use HarmSmits\BolComClient\Models\ChangeTransportRequest;

class Request
{
    /**
     * Gets all commissions and possible reductions by EAN, condition and optionally
     * price. No more than 100 EAN`s can be sent in a single request.
     *
     * @param BulkCommissionRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function getCommissions(?BulkCommissionRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/commission";
        $method = "post";
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\BulkCommissionResponse',
                    'commissions' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Commission',
                            'reductions' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Reduction',
                                ),
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Commissions can be filtered by condition, which defaults to NEW. If price is
     * provided, the exact commission amount will also be calculated.
     *
     * @param string $ean       The EAN number associated with this product.
     * @param string $condition The condition of the offer.
     * @param int    $price     The price of the product with a period as a decimal separator.
     *                          The price should always have two decimals precision.
     *
     * @return array
     */
    public function getCommission(string $ean, ?string $condition = null, ?int $price = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/commission/{ean}";
        $method = "get";
        $url = str_replace("{ean}", $ean, $url);
        $data["query"] = [];
        $data["query"]["condition"] = $condition;
        $data["query"]["price"] = $price;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Commission',
                    'reductions' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Reduction',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * A paginated list of all inbound shipments.
     *
     * @param string $reference     A user defined reference to identify the inbound
     *                              shipment.
     * @param string $bsku          The BSKU number associated with this product.
     * @param string $creationStart The creation start date and time to find the
     *                              inbound shipment in ISO 8601 format.
     * @param string $creationEnd   The creation end date and time to find the inbound
     *                              shipment in ISO 8601 format.
     * @param string $state         The current state of the inbound shipment.
     * @param int    $page          The requested page number with a pagesize of 50
     *
     * @return array
     */
    public function getInboundShipments(
        ?string $reference = null,
        ?string $bsku = null,
        ?string $creationStart = null,
        ?string $creationEnd = null,
        ?string $state = null,
        ?int $page = null
    ): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds";
        $method = "get";
        $data["query"] = [];
        $data["query"]["reference"] = $reference;
        $data["query"]["bsku"] = $bsku;
        $data["query"]["creation-start"] = $creationStart;
        $data["query"]["creation-end"] = $creationEnd;
        $data["query"]["state"] = $state;
        $data["query"]["page"] = $page;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Inbounds',
                    'inbounds' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Inbound',
                            'timeSlot' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\TimeSlot',
                                ),
                            'products' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Product',
                                ),
                            'stateTransitions' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\StateTransition',
                                ),
                            'fbbTransporter' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Transporter',
                                ),
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create a new inbound shipment.
     *
     * @param InboundRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createInboundShipment(?InboundRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds";
        $method = "post";
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of available delivery windows when creating a new inbound
     * shipment.
     *
     * @param string $deliveryDate The expected delivery date and time for the inbound
     *                             in ISO 8601 format.
     * @param int    $itemsToSend  The number of items that will be sent in the inbound.
     *
     * @return array
     */
    public function getDeliveryWindows(?string $deliveryDate = null, ?int $itemsToSend = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds/delivery-windows";
        $method = "get";
        $data["query"] = [];
        $data["query"]["delivery-date"] = $deliveryDate;
        $data["query"]["items-to-send"] = $itemsToSend;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\DeliveryWindowsForInboundShipments',
                    'timeSlots' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\TimeSlot',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get all transporters that carry out FBB shipments.
     *
     * @return array
     */
    public function getFbbTransporters(): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds/fbb-transporters";
        $method = "get";
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\TransportersResponse',
                    'fbbTransporters' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Transporter',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get FBB productlabels by EAN.
     *
     * @param ProductLabelsRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function getProductLabel(?ProductLabelsRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds/productlabels";
        $method = "post";
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+pdf',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get inbound details by inbound id.
     *
     * @param int $inboundId A unique identifier for an inbound shipment.
     *
     * @return array
     */
    public function getInboundShipment(int $inboundId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds/{inbound-id}";
        $method = "get";
        $url = str_replace("{inbound-id}", $inboundId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Inbound',
                    'timeSlot' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\TimeSlot',
                        ),
                    'products' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Product',
                        ),
                    'stateTransitions' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\StateTransition',
                        ),
                    'fbbTransporter' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Transporter',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get packing list by inbound id.
     *
     * @param int $inboundId A unique identifier for an inbound shipment.
     *
     * @return array
     */
    public function getPackingList(int $inboundId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds/{inbound-id}/packinglist";
        $method = "get";
        $url = str_replace("{inbound-id}", $inboundId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+pdf',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get FBB shippinglabel by inbound id.
     *
     * @param int $inboundId A unique identifier for an inbound shipment.
     *
     * @return array
     */
    public function getShippingLabel(int $inboundId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inbounds/{inbound-id}/shippinglabel";
        $method = "get";
        $url = str_replace("{inbound-id}", $inboundId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+pdf',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets the measurements for your performance indicators per week.
     *
     * @param array  $name The type of the performance indicator
     * @param string $year Year number in the ISO-8601 standard.
     * @param string $week Week number in the ISO-8601 standard. If you would like to
     *                     get the relative scores from the current week, please provide the current week
     *                     number here. Be advised that measurements can change heavily over the course of
     *                     the week.
     *
     * @return array
     */
    public function getPerformanceIndicators(array $name, string $year, string $week): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/insights/performance/indicator";
        $method = "get";
        $data["query"] = [];
        $data["query"]["name"] = $name;
        $data["query"]["year"] = $year;
        $data["query"]["week"] = $week;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\PerformanceIndicators',
                    'performanceIndicators' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\PerformanceIndicator',
                            'details' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Details',
                                    'period' =>
                                        array(
                                            '$type' => 'OBJ',
                                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Period',
                                        ),
                                    'score' =>
                                        array(
                                            '$type' => 'OBJ',
                                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Score',
                                        ),
                                    'norm' =>
                                        array(
                                            '$type' => 'OBJ',
                                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Norm',
                                        ),
                                ),
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * The inventory endpoint is a specific LVB/FBB endpoint. It provides a paginated
     * list containing your fulfilment by bol.com inventory. This endpoint does not
     * provide information about your own stock.
     *
     * @param int    $page     The requested page number with a pagesize of 50
     * @param array  $quantity Filter inventory by providing a range of quantity
     *                         (min-range)-(max-range).
     * @param string $stock    Filter inventory by stock level.
     * @param string $state    Filter inventory by stock type (saleable or unsaleable).
     * @param string $query    Filter inventory by EAN or product title.
     *
     * @return array
     */
    public function getInventories(?int $page = null, ?array $quantity = null, ?string $stock = null, ?string $state = null, ?string $query = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/inventory";
        $method = "get";
        $data["query"] = [];
        $data["query"]["page"] = $page;
        $data["query"]["quantity"] = $quantity;
        $data["query"]["stock"] = $stock;
        $data["query"]["state"] = $state;
        $data["query"]["query"] = $query;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\InventoryResponse',
                    'offers' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\InventoryOffer',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a list of invoices, by default from the past 4 weeks. The optional
     * period-start and period-end parameters can be used together to retrieve invoices
     * from a specific date range in the past, the period can be no longer than 31
     * days. Invoices and their specifications can be downloaded separately in
     * different media formats with the ‘GET an invoice by id’ and the ‘GET an
     * invoice specification by id’ calls. The available media types differ per
     * invoice and are listed per invoice within the response. Note: the media types
     * listed in the response must be given in our standard API format.
     *
     * @param string $periodStart Period start date in ISO 8601 standard.
     * @param string $periodEnd   Period end date in ISO 8601 standard.
     *
     * @return array
     */
    public function getInvoices(?string $periodStart = null, ?string $periodEnd = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/invoices";
        $method = "get";
        $data["query"] = [];
        $data["query"]["period-start"] = $periodStart;
        $data["query"]["period-end"] = $periodEnd;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets an invoice by invoice id. The available media types differ per invoice and
     * are listed within the response from the ‘GET all invoices’ call. Note: the
     * media types listed in the response must be given in our standard API format.
     *
     * @param int $invoiceId The id of the invoice
     *
     * @return array
     */
    public function getInvoice(int $invoiceId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/invoices/{invoice-id}";
        $method = "get";
        $url = str_replace("{invoice-id}", $invoiceId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets an invoice specification for an invoice with a paginated list of its
     * transactions. The available media types differ per invoice specification and are
     * listed within the response from the ‘GET all invoices’ call. Note, the media
     * types listed in the response must be given in our standard API format.
     *
     * @param int $invoiceId The id of the invoice.
     * @param int $page      The page to get. Each page contains a maximum of 110.000 lines.
     *
     * @return array
     */
    public function getInvoiceSpecification(int $invoiceId, ?int $page = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/invoices/{invoice-id}/specification";
        $method = "get";
        $url = str_replace("{invoice-id}", $invoiceId, $url);
        $data["query"] = [];
        $data["query"]["page"] = $page;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Creates a new offer, and adds it to the catalog. After creation, status
     * information can be retrieved to review if the offer is valid and published to
     * the shop.
     *
     * @param CreateOfferRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function createOffer(?CreateOfferRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/offers";
        $method = "post";
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
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
    public function requestOfferExportFile(?CreateOfferExportRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/offers/export";
        $method = "post";
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve an offer export file containing all offers.
     *
     * @param string $offerExportId Unique identifier for an offer export.
     *
     * @return array
     */
    public function getOfferExportFile(string $offerExportId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/offers/export/{offer-export-id}";
        $method = "get";
        $url = str_replace("{offer-export-id}", $offerExportId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+csv',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve an offer by using the offer id provided to you when creating or listing
     * your offers.
     *
     * @param string $offerId Unique identifier for an offer.
     *
     * @return array
     */
    public function getOffer(string $offerId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/offers/{offer-id}";
        $method = "get";
        $url = str_replace("{offer-id}", $offerId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\RetailerOffer',
                    'pricing' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Pricing',
                            'bundlePrices' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\BundlePrice',
                                ),
                        ),
                    'stock' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Stock',
                        ),
                    'fulfilment' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Fulfilment',
                            'pickUpPoints' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\PickUpPoint',
                                ),
                        ),
                    'store' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Store',
                            'visible' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\CountryCode',
                                ),
                        ),
                    'condition' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Condition',
                        ),
                    'notPublishableReasons' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\NotPublishableReason',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Use this endpoint to send an offer update. This endpoint returns a process
     * status.
     *
     * @param string             $offerId Unique identifier for an offer.
     * @param UpdateOfferRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateOffer(string $offerId, ?UpdateOfferRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/offers/{offer-id}";
        $method = "put";
        $url = str_replace("{offer-id}", $offerId, $url);
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
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
        $data = [];
        $url = "https://api.bol.com/retailer/offers/{offer-id}";
        $method = "delete";
        $url = str_replace("{offer-id}", $offerId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
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
    public function updateOfferPrice(string $offerId, ?UpdateOfferPriceRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/offers/{offer-id}/price";
        $method = "put";
        $url = str_replace("{offer-id}", $offerId, $url);
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
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
    public function updateOfferStock(string $offerId, ?UpdateOfferStockRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/offers/{offer-id}/stock";
        $method = "put";
        $url = str_replace("{offer-id}", $offerId, $url);
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a paginated list of all open orders sorted by date in descending order.
     *
     * @param int    $page             The requested page number with a pagesize of 50
     * @param string $fulfilmentMethod The fulfilment method. Fulfilled by the retailer
     *                                 (FBR) or fulfilled by bol.com (FBB).
     *
     * @return array
     */
    public function getOrders(?int $page = null, ?string $fulfilmentMethod = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/orders";
        $method = "get";
        $data["query"] = [];
        $data["query"]["page"] = $page;
        $data["query"]["fulfilment-method"] = $fulfilmentMethod;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedOrders',
                    'orders' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedOrder',
                            'orderItems' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedOrderItem',
                                ),
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets an order by order id.
     *
     * @param string $orderId The id of the order to get.
     *
     * @return array
     */
    public function getOrder(string $orderId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/orders/{order-id}";
        $method = "get";
        $url = str_replace("{order-id}", $orderId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Order',
                    'customerDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderCustomerDetails',
                            'shipmentDetails' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\AddressDetails',
                                ),
                            'billingDetails' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\AddressDetails',
                                ),
                        ),
                    'orderItems' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderItem',
                            'additionalServices' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\AdditionalService',
                                ),
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * This endpoint can be used to either confirm a cancellation request by the
     * customer or to cancel an order you yourself are unable to fulfil.
     *
     * @param string       $orderItemId The id of the order item to cancel.
     * @param Cancellation $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function cancelOrder(string $orderItemId, ?Cancellation $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/orders/{order-item-id}/cancellation";
        $method = "put";
        $url = str_replace("{order-item-id}", $orderItemId, $url);
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Ship a single order item within a customer order by providing shipping
     * information. In case you purchased a shipping label you can add the
     * shippingLabelCode to this message. In that case the transport element must be
     * left empty. If you ship the item(s) using your own transporter method you must
     * omit the shippingLabelCode entirely.
     *
     * @param string          $orderItemId The order item being confirmed.
     * @param ShipmentRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function shipOrder(string $orderItemId, ?ShipmentRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/orders/{order-item-id}/shipment";
        $method = "put";
        $url = str_replace("{order-item-id}", $orderItemId, $url);
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of process statuses, which shows information regarding
     * previously executed PUT/POST/DELETE requests in descending order. You need to
     * supply an entity id and event type.
     *
     * @param string $entityId  The entity id is not unique so you need to provide an
     *                          event type. The entity id can either be order item id, transport id, return
     *                          number or inbound reference.
     * @param string $eventType The event type can only be used in combination with the
     *                          entity id.
     * @param int    $page      The requested page number with a pagesize of 50
     *
     * @return array
     */
    public function getProcessStatuses(string $entityId, string $eventType, ?int $page = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/process-status";
        $method = "get";
        $data["query"] = [];
        $data["query"]["entity-id"] = $entityId;
        $data["query"]["event-type"] = $eventType;
        $data["query"]["page"] = $page;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatusResponse',
                    'processStatuses' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                            'links' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                                ),
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of process statuses, which shows information regarding
     * previously executed PUT/POST/DELETE requests. No more than 1000 process status
     * id's can be sent in a single request.
     *
     * @param BulkProcessStatusRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function queryProcessStatuses(?BulkProcessStatusRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/process-status";
        $method = "post";
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatusResponse',
                    'processStatuses' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                            'links' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                                ),
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a specific process-status, which shows information regarding a
     * previously executed PUT/POST/DELETE request. All PUT/POST/DELETE requests on the
     * other endpoints will supply a process-status-id in the related response. You can
     * use this id to retrieve a status by using the endpoint below.
     *
     * @param int $processStatusId The id of the process status being requested. This
     *                             id is supplied in every response to a PUT/POST/DELETE request on the other
     *                             endpoints.
     *
     * @return array
     */
    public function getProcessStatus(int $processStatusId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/process-status/{process-status-id}";
        $method = "get";
        $url = str_replace("{process-status-id}", $processStatusId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieves all available shipping labels based on the supplied order item.
     *
     * @param string $orderItemId The order item id of the order to get purchasable
     *                            shipping labels from.
     *
     * @return array
     */
    public function getAvailableShippingLabels(string $orderItemId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/purchasable-shippinglabels/{order-item-id}";
        $method = "get";
        $url = str_replace("{order-item-id}", $orderItemId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\PurchasableShippingLabelsResponse',
                    'purchasableShippingLabels' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\PurchasableShippingLabel',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * This endpoint will return a list EAN’s that are eligible for reductions on the
     * commission fee.
     *
     * @return array
     */
    public function getReductions(): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/reductions";
        $method = "get";
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+csv',
        );
        $response = array();
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * This endpoint below will return a filename of the latest reductions list. The
     * response from this endpoint can be compared to the response header that was
     * given back from the Get Reductions List endpoint
     *
     * @return array
     */
    public function getReductionsLatest(): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/reductions/latest";
        $method = "get";
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+csv',
        );
        $response = array();
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Disclaimer: We recommend using the most recent version for returns which is
     * version 4. We discourage using version 3 as of January 16th. Get a paginated
     * list of all returns, which are sorted by date in descending order.
     *
     * @param int    $page             The requested page number with a pagesize of 50. The requested
     *                                 page number with a pagesize of 50 returns (within one return there can be
     *                                 multiple rma id's).
     * @param bool   $handled          The status of the returns you wish to see, shows either
     *                                 handled or unhandled returns.
     * @param string $fulfilmentMethod The fulfilment method. Fulfilled by the retailer
     *                                 (FBR) or fulfilled by bol.com (FBB).
     *
     * @return array
     */
    public function getReturns(?int $page = null, ?bool $handled = null, ?string $fulfilmentMethod = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/returns";
        $method = "get";
        $data["query"] = [];
        $data["query"]["page"] = $page;
        $data["query"]["handled"] = $handled;
        $data["query"]["fulfilment-method"] = $fulfilmentMethod;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReturnsResponse',
                    'returns' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedReturnItem',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Disclaimer: We recommend using the most recent version for returns which is
     * version 4. We discourage using version 3 as of January 16th. Retrieve a return
     * based on the rma id.
     *
     * @param int $rmaId The RMA (Return Merchandise Authorization) id that identifies
     *                   this particular return.
     *
     * @return array
     */
    public function getReturn(int $rmaId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/returns/{rma-id}";
        $method = "get";
        $url = str_replace("{rma-id}", $rmaId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReturnItem',
                    'customerDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\CustomerDetails',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Disclaimer: We recommend using the most recent version for returns which is
     * version 4. We discourage using version 3 as of January 16th. Allows the user to
     * handle a return. This can be to either handle an open return, or change the
     * handlingResult of an already handled return. The latter is only possible in
     * limited scenarios, please check the returns documentation for a complete list.
     *
     * @param int           $rmaId The RMA (Return Merchandise Authorization) id that identifies
     *                             this particular return.
     * @param ReturnRequest $body  The handling result requested by the retailer.
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateReturn(int $rmaId, ?ReturnRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/returns/{rma-id}";
        $method = "put";
        $url = str_replace("{rma-id}", $rmaId, $url);
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * A paginated list to retrieve all your shipments up to 3 months old. The
     * shipments will be sorted by date in descending order.
     *
     * @param int    $page             The page to get with a page size of 50.
     * @param string $fulfilmentMethod The fulfilment method. Fulfilled by the retailer
     *                                 (FBR) or fulfilled by bol.com (FBB).
     * @param string $orderId          The id of the order. Only valid without
     *                                 fulfilment-method. The default fulfilment-method is ignored.
     *
     * @return array
     */
    public function getShipments(?int $page = null, ?string $fulfilmentMethod = null, ?string $orderId = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/shipments";
        $method = "get";
        $data["query"] = [];
        $data["query"]["page"] = $page;
        $data["query"]["fulfilment-method"] = $fulfilmentMethod;
        $data["query"]["order-id"] = $orderId;
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentResponse',
                    'shipments' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedShipment',
                            'shipmentItems' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedShipmentItem',
                                ),
                            'transport' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedTransport',
                                ),
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a single shipment by its corresponding id.
     *
     * @param int $shipmentId The id of the shipment.
     *
     * @return array
     */
    public function getShipment(int $shipmentId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/shipments/{shipment-id}";
        $method = "get";
        $url = str_replace("{shipment-id}", $shipmentId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Shipment',
                    'shipmentItems' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentItem',
                        ),
                    'transport' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Transport',
                        ),
                    'customerDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\CustomerDetails',
                        ),
                    'billingDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\CustomerDetails',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Add information to an existing transport. The transport id is part of the
     * shipment. You can retrieve the transport id through the GET shipment list
     * request.
     *
     * @param int                    $transportId The transport id.
     * @param ChangeTransportRequest $body        The change transport requested by the user.
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateShipment(int $transportId, ?ChangeTransportRequest $body = null): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/transports/{transport-id}";
        $method = "put";
        $url = str_replace("{transport-id}", $transportId, $url);
        $data["body"] = $body->toArray();
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+json',
            'Content-Type' => 'application/vnd.retailer.v3+json',
        );
        $response = array(
            202 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ProcessStatus',
                    'links' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Link',
                        ),
                ),
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }


    /**
     * @param int $transportId The transport id.
     *
     * @return array
     */
    public function getShipmentLabel(int $transportId): array
    {
        $data = [];
        $url = "https://api.bol.com/retailer/transports/{transport-id}/shipping-label";
        $method = "get";
        $url = str_replace("{transport-id}", $transportId, $url);
        $data["headers"] = array(
            'Accept' => 'application/vnd.retailer.v3+pdf',
        );
        $response = array(
            400 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
            404 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Problem',
                    'violations' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Violation',
                        ),
                ),
        );
        $data = array_map("array_filter", $data);
        return [$method, $url, $data, $response];
    }
}
