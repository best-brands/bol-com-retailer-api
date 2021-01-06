<?php

namespace HarmSmits\BolComClient;

use DateTime;
use HarmSmits\BolComClient\Models\BulkCommissionQuery;
use HarmSmits\BolComClient\Models\BulkCommissionRequest;
use HarmSmits\BolComClient\Models\CreateProductContentRequest;
use HarmSmits\BolComClient\Models\InboundRequest;
use HarmSmits\BolComClient\Models\ProductLabelsRequest;
use HarmSmits\BolComClient\Models\CreateOfferRequest;
use HarmSmits\BolComClient\Models\CreateOfferExportRequest;
use HarmSmits\BolComClient\Models\CreateUnpublishedOfferReportRequest;
use HarmSmits\BolComClient\Models\UpdateOfferRequest;
use HarmSmits\BolComClient\Models\UpdateOfferPriceRequest;
use HarmSmits\BolComClient\Models\UpdateOfferStockRequest;
use HarmSmits\BolComClient\Models\CanceledOrderRequest;
use HarmSmits\BolComClient\Models\ShipmentRequest;
use HarmSmits\BolComClient\Models\BulkProcessStatusRequest;
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
     * Gets all commissions and possible reductions by EAN, condition and optionally price.
     *
     * @param BulkCommissionRequest $body
     *
     * @return array
     */
    public function getCommissions(BulkCommissionRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/commission';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Commissions can be filtered by condition, which defaults to NEW. If price is provided, the exact commission
     * amount will also be calculated.
     *
     * @param string      $ean       The EAN number associated with this product.
     * @param string|null $condition The condition of the offer.
     * @param float|null  $unitPrice
     *
     * @return array
     */
    public function getCommission(string $ean, float $unitPrice,
        string $condition = BulkCommissionQuery::CONDITION_NEW): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/commission/{ean}';
        $method = 'get';
        $url = str_replace('{ean}', $ean, $url);
        $data['query'] = [];
        $data['query']['condition'] = $condition;
        $data['query']['unit-price'] = $unitPrice;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create content for existing products or new products.
     *
     * @param CreateProductContentRequest|null $body
     *
     * @return array
     *
     */
    public function createProductContent(CreateProductContentRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/content/product';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/content/validation-report/{uploadId}';
        $method = 'get';
        $url = str_replace('{uploadId}', $uploadId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ValidationReportResponse',
                    'productContents' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ProductContentResponse',
                            'rejectedAttributes' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\RejectedAttributeResponse',
                                    'rejectionErrors' =>
                                        array(
                                            '$type' => 'OBJ_ARRAY',
                                            '$ref' => 'HarmSmits\\BolComClient\\Models\\RejectionError',
                                        ),
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * A paginated list of all inbound shipments.
     *
     * @param string|null   $reference         A user defined reference to identify the inbound shipment.
     * @param string|null   $bsku              The BSKU number associated with this product.
     * @param DateTime|null $creationStartDate The creation start date and time to find the inbound shipment in ISO 8601
     *                                         format.
     * @param DateTime|null $creationEndDate   The end date of the range to find the inbound shipment, in ISO 8601
     *                                         format.
     * @param string|null   $state             The current state of the inbound shipment.
     * @param int           $page              The requested page number with a page size of 50 items.
     *
     * @return array
     */
    public function getInbounds(
        ?string $reference = null,
        ?string $bsku = null,
        ?DateTime $creationStartDate = null,
        ?DateTime $creationEndDate = null,
        ?string $state = null,
        int $page = 1
    ): array {
        $data = [];
        $url = 'https://api.bol.com/retailer/inbounds';
        $method = 'get';
        $data['query'] = [];
        $data['query']['reference'] = $reference;
        $data['query']['bsku'] = $bsku;
        $data['query']['creation-start-date'] = $creationStartDate ? $creationStartDate->format(DATE_ISO8601) : $creationStartDate;
        $data['query']['creation-end-date'] = $creationEndDate ? $creationEndDate->format(DATE_ISO8601) : $creationEndDate;
        $data['query']['state'] = $state;
        $data['query']['page'] = $page;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Inbounds',
                    'inbounds' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedInbound',
                            'timeSlot' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\TimeSlot',
                                ),
                            'inboundTransporter' =>
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Create a new inbound shipment.
     *
     * @param InboundRequest $body
     *
     * @return array
     */
    public function createInboundShipment(InboundRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/inbounds';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of available delivery windows when creating a new inbound shipment.
     *
     * @param DateTime $deliveryDate The expected delivery date for the inbound in ISO 8601 format.
     * @param int      $itemsToSend  The number of items that will be sent in the inbound.
     *
     * @return array
     */
    public function getDeliveryWindows(DateTime $deliveryDate, int $itemsToSend = 1): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/inbounds/delivery-windows';
        $method = 'get';
        $data['query'] = [];
        $data['query']['delivery-date'] = $deliveryDate->format(DATE_ISO8601);
        $data['query']['items-to-send'] = $itemsToSend;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\DeliveryWindow',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get all available transporters that carry out transports for inbound shipments.
     *
     * @return array
     */
    public function getInboundTransporters(): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/inbounds/inbound-transporters';
        $method = 'get';
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\TransportersResponse',
                    'transporters' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Transporter',
                        ),
                ),
        );
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get inbound product labels by EAN.
     *
     * @param ProductLabelsRequest|null $body
     *
     * @return array
     *
     */
    public function getProductLabel(ProductLabelsRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/inbounds/productlabels';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+pdf',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
        $url = 'https://api.bol.com/retailer/inbounds/{inbound-id}';
        $method = 'get';
        $url = str_replace('{inbound-id}', $inboundId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
                    'inboundTransporter' =>
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
        $data = array_map('array_filter', $data);
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
        $url = 'https://api.bol.com/retailer/inbounds/{inbound-id}/packinglist';
        $method = 'get';
        $url = str_replace('{inbound-id}', $inboundId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+pdf',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get inbound shipping label by inbound id.
     *
     * @param int $inboundId A unique identifier for an inbound shipment.
     *
     * @return array
     */
    public function getInboundShippingLabel(int $inboundId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/inbounds/{inbound-id}/shippinglabel';
        $method = 'get';
        $url = str_replace('{inbound-id}', $inboundId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+pdf',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets offer insights.
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
        $data = [];
        $url = 'https://api.bol.com/retailer/insights/offer';
        $method = 'get';
        $data['query'] = [];
        $data['query']['offer-id'] = $offerId;
        $data['query']['period'] = $period;
        $data['query']['number-of-periods'] = $numberOfPeriods;
        $data['query']['name'] = $name;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\OfferInsights',
                    'offerInsights' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\OfferInsight',
                            'countries' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Country',
                                ),
                            'periods' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Periods',
                                    'period' =>
                                        array(
                                            '$type' => 'OBJ',
                                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Period',
                                        ),
                                    'countries' =>
                                        array(
                                            '$type' => 'OBJ_ARRAY',
                                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Country',
                                        ),
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
        $data = array_map('array_filter', $data);
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
    public function getInsightsPerformanceIndicator(array $name, string $year, string $week): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/insights/performance/indicator';
        $method = 'get';
        $data['query'] = [];
        $data['query']['name'] = $name;
        $data['query']['year'] = $year;
        $data['query']['week'] = $week;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets sales forecast.
     *
     * @param string $offerId    Unique identifier for an offer.
     * @param int    $weeksAhead The number of weeks into the future, starting from today.
     *
     * @return array
     */
    public function getInsightsSalesForecast(string $offerId, int $weeksAhead): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/insights/sales-forecast';
        $method = 'get';
        $data['query'] = [];
        $data['query']['offer-id'] = $offerId;
        $data['query']['weeks-ahead'] = $weeksAhead;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\SalesForecastResponse',
                    'total' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Total',
                        ),
                    'countries' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Countries',
                        ),
                    'periods' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Period',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * The inventory endpoint is a specific LVB/FBB endpoint. It provides a paginated list containing your fulfilment
     * by bol.com inventory. This endpoint does not provide information about your own stock.
     *
     * @param int         $page     The requested page number with a page size of 50 items.
     * @param array|null  $quantity Filter inventory by providing a range of quantity (min-range)-(max-range).
     * @param string|null $stock    Filter inventory by stock level.
     * @param string|null $state    Filter inventory by stock type.
     * @param string|null $query    Filter inventory by EAN or product title.
     *
     * @return array
     */
    public function getInventory(int $page = 1, ?array $quantity = null, ?string $stock = null, ?string $state = null,
        ?string $query = null): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/inventory';
        $method = 'get';
        $data['query'] = [];
        $data['query']['page'] = $page;
        $data['query']['quantity'] = $quantity;
        $data['query']['stock'] = $stock;
        $data['query']['state'] = $state;
        $data['query']['query'] = $query;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\InventoryResponse',
                    'inventory' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\Inventory',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/offers';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
    public function requestOfferExportFile(CreateOfferExportRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/export';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve an offer export file containing all offers.
     *
     * @param string $reportId Unique identifier for an offer export report.
     *
     * @return array
     */
    public function getOffersExport(string $reportId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/export/{report-id}';
        $method = 'get';
        $url = str_replace('{report-id}', $reportId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+csv',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/unpublished';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve an unpublished offer report containing all unpublished offers and reasons.
     *
     * @param string $reportId Unique identifier for unpublished offer report.
     *
     * @return array
     */
    public function getUnpublishedOffers(string $reportId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/unpublished/{report-id}';
        $method = 'get';
        $url = str_replace('{report-id}', $reportId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+csv',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/{offer-id}';
        $method = 'get';
        $url = str_replace('{offer-id}', $offerId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/{offer-id}';
        $method = 'put';
        $url = str_replace('{offer-id}', $offerId, $url);
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
        $url = 'https://api.bol.com/retailer/offers/{offer-id}';
        $method = 'delete';
        $url = str_replace('{offer-id}', $offerId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/{offer-id}/price';
        $method = 'put';
        $url = str_replace('{offer-id}', $offerId, $url);
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/offers/{offer-id}/stock';
        $method = 'put';
        $url = str_replace('{offer-id}', $offerId, $url);
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a paginated list of all open orders sorted by date in descending order.
     *
     * @param int         $page             The requested page number with a page size of 50 items.
     * @param string|null $fulfilmentMethod The fulfilment method. Fulfilled by the retailer (FBR) or fulfilled by
     *                                      bol.com (FBB).
     *
     * @return array
     */
    public function getOrders(int $page = 1, ?string $fulfilmentMethod = null): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/orders';
        $method = 'get';
        $data['query'] = [];
        $data['query']['page'] = $page;
        $data['query']['fulfilment-method'] = $fulfilmentMethod;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * This endpoint can be used to either confirm a cancellation request by the customer or to cancel an order item
     * you yourself are unable to fulfil.
     *
     * @param CanceledOrderRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function cancelOrder(CanceledOrderRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/orders/cancellation';
        $method = 'put';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
    public function shipOrder(ShipmentRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/orders/shipment';
        $method = 'put';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets an open order by order id.
     *
     * @param string $orderId The id of the open order to get.
     *
     * @return array
     */
    public function getOrder(string $orderId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/orders/{order-id}';
        $method = 'get';
        $url = str_replace('{order-id}', $orderId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Order',
                    'shipmentDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentDetails',
                        ),
                    'billingDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\BillingDetails',
                        ),
                    'orderItems' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderOrderItem',
                            'fulfilment' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderFulfilment',
                                ),
                            'offer' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderOffer',
                                ),
                            'product' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderProduct',
                                ),
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Currently this endpoint only supports the allowable retail price and can support the following use cases:
     * 1) EANs that have been unpublished due to price related reasons can be checked against this endpoint.
     * 2) Requesting the allowable retail price for EANs that are not yet in your assortment can help inform price
     * setting.
     *
     * @param string $ean The EAN number associated with this product.
     *
     * @return array
     */
    public function getRetailPrice(string $ean): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/pricing/retail-prices/{ean}';
        $method = 'get';
        $url = str_replace('{ean}', $ean, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\RetailPriceResponse',
                    'retailPrices' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\RetailPrice',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of process statuses, which shows information regarding previously executed PUT/POST/DELETE
     * requests in descending order. You need to supply an entity id and event type. Please note: process status
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
    public function getProcessStatuses(string $entityId, string $eventType, int $page = 1): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/process-status';
        $method = 'get';
        $data['query'] = [];
        $data['query']['entity-id'] = $entityId;
        $data['query']['event-type'] = $eventType;
        $data['query']['page'] = $page;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
    public function queryProcessStatuses(BulkProcessStatusRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/process-status';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
     * @param int $processStatusId The id of the process status being requested. This id is supplied in every response
     *                             to a PUT/POST/DELETE request on the other endpoints.
     *
     * @return array
     */
    public function getProcessStatus(int $processStatusId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/process-status/{process-status-id}';
        $method = 'get';
        $url = str_replace('{process-status-id}', $processStatusId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Get a paginated list of multi-item returns, which are sorted by date in descending order.
     *
     * @param int         $page             The page to get with a page size of 50.
     * @param bool        $handled          The status of the returns you wish to see, shows either handled or
     *                                      unhandled returns.
     * @param string|null $fulfilmentMethod The fulfilment method. Fulfilled by the retailer (FBR) or fulfilled by
     *                                      bol.com (FBB).
     *
     * @return array
     */
    public function getReturns(int $page = 1, bool $handled = false, ?string $fulfilmentMethod = null): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/returns';
        $method = 'get';
        $data['query'] = [];
        $data['query']['page'] = $page;
        $data['query']['handled'] = $handled;
        $data['query']['fulfilment-method'] = $fulfilmentMethod;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReturnsResponse',
                    'returns' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedReturn',
                            'returnItems' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedReturnItem',
                                    'processingResults' =>
                                        array(
                                            '$type' => 'OBJ_ARRAY',
                                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ReturnProcessingResult',
                                        ),
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/returns';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a return based on the return id.
     *
     * @param int $returnId Unique identifier for a return.
     *
     * @return array
     */
    public function getReturn(int $returnId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/returns/{return-id}';
        $method = 'get';
        $url = str_replace('{return-id}', $returnId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Return_',
                    'returnItems' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ReturnItem',
                            'processingResults' =>
                                array(
                                    '$type' => 'OBJ_ARRAY',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReturnProcessingResult',
                                ),
                            'customerDetails' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\CustomerDetails',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/returns/{rma-id}';
        $method = 'put';
        $url = str_replace('{rma-id}', $rmaId, $url);
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * A paginated list to retrieve all your shipments up to 3 months old. The shipments will be sorted by date in
     * descending order.
     *
     * @param int         $page             The page to get with a page size of 50.
     * @param string|null $fulfilmentMethod The fulfilment method. Fulfilled by the retailer (FBR) or fulfilled by
     *                                      bol.com (FBB).
     * @param string|null $orderId          The id of the order. Only valid without fulfilment-method. The default
     *                                      fulfilment-method is ignored.
     *
     * @return array
     */
    public function getShipments(int $page = 1, ?string $fulfilmentMethod = null, ?string $orderId = null): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/shipments';
        $method = 'get';
        $data['query'] = [];
        $data['query']['page'] = $page;
        $data['query']['fulfilment-method'] = $fulfilmentMethod;
        $data['query']['order-id'] = $orderId;
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
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
                            'order' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ReducedShipmentOrder',
                                ),
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
        $data = array_map('array_filter', $data);
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
        $url = 'https://api.bol.com/retailer/shipments/{shipment-id}';
        $method = 'get';
        $url = str_replace('{shipment-id}', $shipmentId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\Shipment',
                    'order' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentOrder',
                        ),
                    'shipmentDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentDetails',
                        ),
                    'billingDetails' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\BillingDetails',
                        ),
                    'shipmentItems' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentItem',
                            'fulfilment' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentFulfilment',
                                ),
                            'offer' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderOffer',
                                ),
                            'product' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\OrderProduct',
                                ),
                        ),
                    'transport' =>
                        array(
                            '$type' => 'OBJ',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\ShipmentTransport',
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/shipping-labels';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
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
    public function getDeliveryOptions(DeliveryOptionsRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/shipping-labels/delivery-options';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\DeliveryOptionsResponse',
                    'deliveryOptions' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\DeliveryOption',
                            'labelPrice' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\LabelPrice',
                                ),
                            'packageRestrictions' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\PackageRestrictions',
                                ),
                            'handoverDetails' =>
                                array(
                                    '$type' => 'OBJ',
                                    '$ref' => 'HarmSmits\\BolComClient\\Models\\HandoverDetails',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Gets a shipping label by shipping label id.
     *
     * @param string $shippingLabelId The shipping label id.
     *
     * @return array
     */
    public function getShippingLabel(string $shippingLabelId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/shipping-labels/{shipping-label-id}';
        $method = 'get';
        $url = str_replace('{shipping-label-id}', $shippingLabelId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+pdf',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of all configured and active push notification subscriptions.
     *
     * @return array
     */
    public function getSubscriptions(): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/subscriptions';
        $method = 'get';
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\SubscriptionsResponse',
                    'subscriptions' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\SubscriptionResponse',
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
            401 =>
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
        $data = array_map('array_filter', $data);
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
        $data = [];
        $url = 'https://api.bol.com/retailer/subscriptions';
        $method = 'post';
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a list of public keys that should be used to validate the signature header for push notifications
     * received from bol.com
     *
     * @return array
     */
    public function getSubscriptionsSignatureKeys(): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/subscriptions/signature-keys';
        $method = 'get';
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\KeySetResponse',
                    'signatureKeys' =>
                        array(
                            '$type' => 'OBJ_ARRAY',
                            '$ref' => 'HarmSmits\\BolComClient\\Models\\KeySet',
                        ),
                ),
        );
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Send a test push notification to all subscriptions for the provided event.
     *
     * @return array
     */
    public function createSubscriptionTest(): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/subscriptions/test';
        $method = 'post';
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Retrieve a configured and active push notification subscription with the provided id.
     *
     * @param int $subscriptionId A unique identifier for the subscription
     *
     * @return array
     */
    public function getSubscription(int $subscriptionId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/subscriptions/{subscription-id}';
        $method = 'get';
        $url = str_replace('{subscription-id}', $subscriptionId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
        );
        $response = array(
            200 =>
                array(
                    '$type' => 'OBJ',
                    '$ref' => 'HarmSmits\\BolComClient\\Models\\SubscriptionResponse',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Update an existing push notification subscription with the supplied id. The configured URL has to support https
     * scheme.
     *
     * @param int                       $subscriptionId A unique identifier for the subscription
     * @param UpdateSubscriptionRequest $body
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateSubscription(int $subscriptionId, UpdateSubscriptionRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/subscriptions/{subscription-id}';
        $method = 'put';
        $url = str_replace('{subscription-id}', $subscriptionId, $url);
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Delete a push notification subscription with the provided id.
     *
     * @param int $subscriptionId A unique identifier for the subscription
     *
     * @return array
     */
    public function deleteSubscription(int $subscriptionId): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/subscriptions/{subscription-id}';
        $method = 'delete';
        $url = str_replace('{subscription-id}', $subscriptionId, $url);
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }


    /**
     * Add information to an existing transport. The transport id is part of the shipment. You can retrieve the
     * transport id through the GET shipment list request.
     *
     * @param int                    $transportId The transport id.
     * @param ChangeTransportRequest $body        The change transport requested by the user.
     *
     * @return array
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidPropertyException
     */
    public function updateTransport(int $transportId, ChangeTransportRequest $body): array
    {
        $data = [];
        $url = 'https://api.bol.com/retailer/transports/{transport-id}';
        $method = 'put';
        $url = str_replace('{transport-id}', $transportId, $url);
        $data['body'] = $body->__toArray();
        $data['headers'] = array(
            'Accept' => 'application/vnd.retailer.v4+json',
            'Content-Type' => 'application/vnd.retailer.v4+json',
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
        $data = array_map('array_filter', $data);
        return [$method, $url, $data, $response];
    }
}
