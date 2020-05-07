<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient;

use GuzzleHttp\Exception\RequestException;
use HarmSmits\BolComClient\Exception\BearerTokenException;
use HarmSmits\BolComClient\Exception\InvalidArgumentException;
use HarmSmits\BolComClient\Exception\ProblemException;
use HarmSmits\BolComClient\Exception\UnknownResponseException;
use HarmSmits\BolComClient\Models\BulkCommissionRequest;
use HarmSmits\BolComClient\Models\BulkCommissionResponse;
use HarmSmits\BolComClient\Models\BulkProcessStatusRequest;
use HarmSmits\BolComClient\Models\Cancellation;
use HarmSmits\BolComClient\Models\ChangeTransportRequest;
use HarmSmits\BolComClient\Models\Commission;
use HarmSmits\BolComClient\Models\CreateOfferExportRequest;
use HarmSmits\BolComClient\Models\CreateOfferRequest;
use HarmSmits\BolComClient\Models\DeliveryWindowsForInboundShipments;
use HarmSmits\BolComClient\Models\Inbound;
use HarmSmits\BolComClient\Models\InboundRequest;
use HarmSmits\BolComClient\Models\Inbounds;
use HarmSmits\BolComClient\Models\InventoryResponse;
use HarmSmits\BolComClient\Models\Order;
use HarmSmits\BolComClient\Models\PerformanceIndicators;
use HarmSmits\BolComClient\Models\Problem;
use HarmSmits\BolComClient\Models\ProcessStatus;
use HarmSmits\BolComClient\Models\ProcessStatusResponse;
use HarmSmits\BolComClient\Models\ProductLabelsRequest;
use HarmSmits\BolComClient\Models\PurchasableShippingLabelsResponse;
use HarmSmits\BolComClient\Models\ReducedOrders;
use HarmSmits\BolComClient\Models\RetailerOffer;
use HarmSmits\BolComClient\Models\ReturnItem;
use HarmSmits\BolComClient\Models\ReturnRequest;
use HarmSmits\BolComClient\Models\ReturnsResponse;
use HarmSmits\BolComClient\Models\Shipment;
use HarmSmits\BolComClient\Models\ShipmentRequest;
use HarmSmits\BolComClient\Models\ShipmentResponse;
use HarmSmits\BolComClient\Models\TransportersResponse;
use HarmSmits\BolComClient\Models\UpdateOfferPriceRequest;
use HarmSmits\BolComClient\Models\UpdateOfferRequest;
use HarmSmits\BolComClient\Models\UpdateOfferStockRequest;

/**
 * Class Client
 * @method BulkCommissionResponse|Problem postCommission(?BulkCommissionRequest $body = null)
 * @method Commission|Problem getCommissionByEan(string $ean, ?string $condition = null, ?int $price = null)
 * @method Inbounds|Problem getInbounds(?string $reference = null,?string $bsku = null,?string $creationStart = null,?string $creationEnd = null,?string $state = null,?int $page = null)
 * @method ProcessStatus|Problem postInbounds(?InboundRequest $body = null)
 * @method DeliveryWindowsForInboundShipments|Problem getInboundsDeliveryWindows(?string $deliveryDate = null, ?int $itemsToSend = null)
 * @method TransportersResponse getInboundsFbbTransporters()
 * @method array|Problem postInboundsProductlabels(?ProductLabelsRequest $body = null)
 * @method Inbound|Problem getInboundsByInboundId(int $inboundId)
 * @method array|Problem getInboundsByInboundIdPackinglist(int $inboundId)
 * @method array|Problem getInboundsByInboundIdShippinglabel(int $inboundId)
 * @method PerformanceIndicators getInsightsPerformanceIndicator(array $name, string $year, string $week)
 * @method InventoryResponse|Problem getInventory(?int $page = null, ?array $quantity = null, ?string $stock = null, ?string $state = null, ?string $query = null)
 * @method array|Problem getInvoices(?string $periodStart = null, ?string $periodEnd = null)
 * @method array|Problem getInvoicesByInvoiceId(int $invoiceId)
 * @method array|Problem getInvoicesByInvoiceIdSpecification(int $invoiceId, ?int $page = null)
 * @method ProcessStatus|Problem postOffers(?CreateOfferRequest $body = null)
 * @method ProcessStatus|Problem postOffersExport(?CreateOfferExportRequest $body = null)
 * @method null|Problem getOffersExportByOfferExportId(string $offerExportId)
 * @method RetailerOffer|Problem getOffersByOfferId(string $offerId)
 * @method ProcessStatus|Problem putOffersByOfferId(string $offerId, ?UpdateOfferRequest $body = null)
 * @method ProcessStatus|Problem deleteOffersByOfferId(string $offerId)
 * @method ProcessStatus|Problem putOffersByOfferIdPrice(string $offerId, ?UpdateOfferPriceRequest $body = null)
 * @method ProcessStatus|Problem putOffersByOfferIdStock(string $offerId, ?UpdateOfferStockRequest $body = null)
 * @method ReducedOrders getOrders(?int $page = null, ?string $fulfilmentMethod = null)
 * @method Order|Problem getOrdersByOrderId(string $orderId)
 * @method ProcessStatus|Problem putOrdersByOrderItemIdCancellation(string $orderItemId, ?Cancellation $body = null)
 * @method ProcessStatus|Problem putOrdersByOrderItemIdShipment(string $orderItemId, ?ShipmentRequest $body = null)
 * @method ProcessStatusResponse|Problem getProcessStatus(string $entityId, string $eventType, ?int $page = null)
 * @method ProcessStatusResponse|Problem postProcessStatus(?BulkProcessStatusRequest $body = null)
 * @method ProcessStatus|Problem getProcessStatusByProcessStatusId(int $processStatusId)
 * @method PurchasableShippingLabelsResponse|Problem getPurchasableShippinglabelsByOrderItemId(string $orderItemId)
 * @method string getReductions()
 * @method string getReductionsLatest()
 * @method ReturnsResponse|Problem getReturns(?int $page = null, ?bool $handled = null, ?string $fulfilmentMethod = null)
 * @method ReturnItem|Problem getReturnsByRmaId(int $rmaId)
 * @method ProcessStatus|Problem putReturnsByRmaId(int $rmaId, ?ReturnRequest $body = null)
 * @method ShipmentResponse|Problem getShipments(?int $page = null, ?string $fulfilmentMethod = null, ?string $orderId = null)
 * @method Shipment|Problem getShipmentsByShipmentId(int $shipmentId)
 * @method ProcessStatus|Problem putTransportsByTransportId(int $transportId, ?ChangeTransportRequest $body = null)
 * @method array|Problem getTransportsByTransportIdShippingLabel(int $transportId)
 *
 * @package HarmSmits\BolComClient
 */
class Client
{
    /** @var string domain for live API requests */
    const API_URL_LIVE = "https://api.bol.com/retailer/";

    /** @var string domain for authentications */
    const API_AUTH_LIVE = "https://login.bol.com/token";

    /** @var \GuzzleHttp\Client */
    protected \GuzzleHttp\Client $client;

    /** @var \HarmSmits\BolComClient\Request request dispatcher */
    protected Request $request;

    /** @var \HarmSmits\BolComClient\Populator */
    protected Populator $populator;

    /** @var string holds the current API client id */
    protected string $clientId;

    /** @var string holds the current API client secret */
    protected string $clientSecret;

    /** @var string holds the obtained bearer token */
    protected string $bearerToken = "";

    /** @var int holds the expiration date of the token */
    protected int $bearerTimestamp;

    /** @var int the TTL for the current bearer token */
    protected int $bearerTtl;

    /** @var int the difference which should be account for (1 second is more than enough) */
    protected int $bearerDiff;

    /**
     * Client constructor.
     *
     * @param $clientId
     * @param $clientSecret
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidArgumentException
     */
    public function __construct(string $clientId, string $clientSecret)
    {
        if (!$clientId || !$clientSecret)
            throw new InvalidArgumentException("Unable to obtain bearer token");

        $this->client = new \GuzzleHttp\Client();
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;

        $this->request = new Request();
        $this->populator = new Populator();
    }

    /**
     * Dispatch the request. This is some serious sorcery not to be touched.
     *
     * @param string $method
     * @param array  $args
     *
     * @return array|string
     * @throws \HarmSmits\BolComClient\Exception\BearerTokenException
     * @throws \HarmSmits\BolComClient\Exception\ProblemException
     * @throws \HarmSmits\BolComClient\Exception\UnknownResponseException
     * @throws \HarmSmits\BolComClient\Exception\InvalidArgumentException
     */
    public function __call(string $method, array $args) {
        [$method, $url, $data, $response] = call_user_func_array([$this->request, $method], $args);

        try {
            $result = $this->client->request($method, $url, array_merge_recursive($data, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->getBearerToken()
                ]
            ]));
        } catch (RequestException $exception) {
            $code = $exception->getCode();
            if (isset($response[$code])) {
                $response = $this->populator->populate($response[$code], json_decode($exception->getResponse()->getBody(),true));
                throw new ProblemException($response);
            } else {
                throw new UnknownResponseException();
            }
        }

        if ($response && isset($response[$result->getStatusCode()])) {
            return $this->populator->populate($response[$result->getStatusCode()], json_decode($result->getBody(), true));
        } else {
            return $result->getBody();
        }
    }

    /**
     * Set the current bearer token (for requests)
     * @param string $bearerToken
     * @param int    $ttl
     * @param int    $diff
     * @throws \HarmSmits\BolComClient\Exception\InvalidArgumentException
     */
    private function setBearerToken(string $bearerToken, int $ttl, int $diff = 1)
    {
        if (!$bearerToken || !$ttl)
            throw new InvalidArgumentException("Invalid arguments for token bearer");
        $this->bearerDiff = $diff;
        $this->bearerToken = $bearerToken;
        $this->bearerTimestamp = time();
        $this->bearerTtl = $ttl;
    }

    /**
     * Get a bearer token
     *
     * @throws \HarmSmits\BolComClient\Exception\BearerTokenException
     * @throws \HarmSmits\BolComClient\Exception\InvalidArgumentException
     */
    private function getBearerToken()
    {
        if ($this->bearerToken === "" || time() - $this->bearerDiff + 5 >= $this->bearerTimestamp) {
            $data = $this->obtainBearerToken();
            $this->setBearerToken($data['access_token'], (int) $data['expires_in']);
        }

        return $this->bearerToken;
    }

    /**
     * Obtain a bearer token
     *
     * @return mixed
     * @throws \HarmSmits\BolComClient\Exception\BearerTokenException
     */
    private function obtainBearerToken() {
        $request = $this->client->request(
            "POST",
            self::API_AUTH_LIVE . "?grant_type=client_credentials",
            [
                'auth' => [
                    $this->clientId,
                    $this->clientSecret
                ]
            ]);

        if ($request->getStatusCode() != 200)
            throw new BearerTokenException("Unable to obtain bearer token");
        return (json_decode($request->getBody(), true));
    }
}
