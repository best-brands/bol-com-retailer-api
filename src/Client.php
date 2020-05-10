<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\PromiseInterface;
use HarmSmits\BolComClient\Exception\BearerTokenException;
use HarmSmits\BolComClient\Exception\InvalidArgumentException;
use HarmSmits\BolComClient\Exception\ProblemException;
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
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Client
 * @method BulkCommissionResponse|Problem getCommissions(?BulkCommissionRequest $body = null)
 * @method PromiseInterface getCommissionsAsync(?BulkCommissionRequest $body = null)
 * @method Commission|Problem getCommission(string $ean, ?string $condition = null, ?int $price = null)
 * @method PromiseInterface getCommissionAsync(string $ean, ?string $condition = null, ?int $price = null)
 * @method Inbounds|Problem getInboundShipments(?string $reference = null,?string $bsku = null,?string $creationStart = null,?string $creationEnd = null,?string $state = null,?int $page = null)
 * @method PromiseInterface getInboundShipmentsAsync(?string $reference = null,?string $bsku = null,?string $creationStart = null,?string $creationEnd = null,?string $state = null,?int $page = null)
 * @method ProcessStatus|Problem createInboundShipment(?InboundRequest $body = null)
 * @method PromiseInterface createInboundShipmentAsync(?InboundRequest $body = null)
 * @method DeliveryWindowsForInboundShipments|Problem getDeliveryWindows(?string $deliveryDate = null, ?int $itemsToSend = null)
 * @method PromiseInterface getDeliveryWindowsAsync(?string $deliveryDate = null, ?int $itemsToSend = null)
 * @method TransportersResponse getFbbTransporters()
 * @method PromiseInterface getFbbTransportersAsync()
 * @method array|Problem getProductLabel(?ProductLabelsRequest $body = null)
 * @method PromiseInterface getProductLabelAsync(?ProductLabelsRequest $body = null)
 * @method Inbound|Problem getInboundShipment(int $inboundId)
 * @method PromiseInterface getInboundShipmentAsync(int $inboundId)
 * @method array|Problem getPackingList(int $inboundId)
 * @method PromiseInterface getPackingListAsync(int $inboundId)
 * @method array|Problem getShippingLabel(int $inboundId)
 * @method PromiseInterface getShippingLabelAsync(int $inboundId)
 * @method PerformanceIndicators getPerformanceIndicators(array $name, string $year, string $week)
 * @method PromiseInterface getPerformanceIndicatorsAsync(array $name, string $year, string $week)
 * @method InventoryResponse|Problem getInventories(?int $page = null, ?array $quantity = null, ?string $stock = null, ?string $state = null, ?string $query = null)
 * @method PromiseInterface getInventoriesAsync(?int $page = null, ?array $quantity = null, ?string $stock = null, ?string $state = null, ?string $query = null)
 * @method array|Problem getInvoices(?string $periodStart = null, ?string $periodEnd = null)
 * @method PromiseInterface getInvoicesAsync(?string $periodStart = null, ?string $periodEnd = null)
 * @method array|Problem getInvoice(int $invoiceId)
 * @method PromiseInterface getInvoiceAsync(int $invoiceId)
 * @method array|Problem getInvoiceSpecification(int $invoiceId, ?int $page = null)
 * @method PromiseInterface getInvoiceSpecificationAsync(int $invoiceId, ?int $page = null)
 * @method ProcessStatus|Problem createOffer(?CreateOfferRequest $body = null)
 * @method PromiseInterface createOfferAsync(?CreateOfferRequest $body = null)
 * @method ProcessStatus|Problem requestOfferExportFile(?CreateOfferExportRequest $body = null)
 * @method PromiseInterface requestOfferExportFileAsync(?CreateOfferExportRequest $body = null)
 * @method null|Problem getOfferExportFile(string $offerExportId)
 * @method PromiseInterface getOfferExportFileAsync(string $offerExportId)
 * @method RetailerOffer|Problem getOffer(string $offerId)
 * @method PromiseInterface getOfferAsync(string $offerId)
 * @method ProcessStatus|Problem updateOffer(string $offerId, ?UpdateOfferRequest $body = null)
 * @method PromiseInterface updateOfferAsync(string $offerId, ?UpdateOfferRequest $body = null)
 * @method ProcessStatus|Problem deleteOffer(string $offerId)
 * @method PromiseInterface deleteOfferAsync(string $offerId)
 * @method ProcessStatus|Problem updateOfferPrice(string $offerId, ?UpdateOfferPriceRequest $body = null)
 * @method PromiseInterface updateOfferPriceAsync(string $offerId, ?UpdateOfferPriceRequest $body = null)
 * @method ProcessStatus|Problem updateOfferStock(string $offerId, ?UpdateOfferStockRequest $body = null)
 * @method PromiseInterface updateOfferStockAsync(string $offerId, ?UpdateOfferStockRequest $body = null)
 * @method ReducedOrders getOrders(?int $page = null, ?string $fulfilmentMethod = null)
 * @method PromiseInterface getOrdersAsync(?int $page = null, ?string $fulfilmentMethod = null)
 * @method Order|Problem getOrder(string $orderId)
 * @method PromiseInterface getOrderAsync(string $orderId)
 * @method ProcessStatus|Problem cancelOrder(string $orderItemId, ?Cancellation $body = null)
 * @method PromiseInterface cancelOrderAsync(string $orderItemId, ?Cancellation $body = null)
 * @method ProcessStatus|Problem shipOrder(string $orderItemId, ?ShipmentRequest $body = null)
 * @method PromiseInterface shipOrderAsync(string $orderItemId, ?ShipmentRequest $body = null)
 * @method ProcessStatusResponse|Problem getProcessStatuses(string $entityId, string $eventType, ?int $page = null)
 * @method PromiseInterface getProcessStatusesAsync(string $entityId, string $eventType, ?int $page = null)
 * @method ProcessStatusResponse|Problem queryProcessStatuses(?BulkProcessStatusRequest $body = null)
 * @method PromiseInterface queryProcessStatusesAsync(?BulkProcessStatusRequest $body = null)
 * @method ProcessStatus|Problem getProcessStatus(int $processStatusId)
 * @method PromiseInterface getProcessStatusAsync(int $processStatusId)
 * @method PurchasableShippingLabelsResponse|Problem getAvailableShippingLabels(string $orderItemId)
 * @method PromiseInterface getAvailableShippingLabelsAsync(string $orderItemId)
 * @method string getReductions()
 * @method PromiseInterface getReductionsAsync()
 * @method string getReductionsLatest()
 * @method PromiseInterface getReductionsLatestAsync()
 * @method ReturnsResponse|Problem getReturns(?int $page = null, ?bool $handled = null, ?string $fulfilmentMethod = null)
 * @method PromiseInterface getReturnsAsync(?int $page = null, ?bool $handled = null, ?string $fulfilmentMethod = null)
 * @method ReturnItem|Problem getReturn(int $rmaId)
 * @method PromiseInterface getReturnAsync(int $rmaId)
 * @method ProcessStatus|Problem updateReturn(int $rmaId, ?ReturnRequest $body = null)
 * @method PromiseInterface updateReturnAsync(int $rmaId, ?ReturnRequest $body = null)
 * @method ShipmentResponse|Problem getShipments(?int $page = null, ?string $fulfilmentMethod = null, ?string $orderId = null)
 * @method PromiseInterface getShipmentsAsync(?int $page = null, ?string $fulfilmentMethod = null, ?string $orderId = null)
 * @method Shipment|Problem getShipment(int $shipmentId)
 * @method PromiseInterface getShipmentAsync(int $shipmentId)
 * @method ProcessStatus|Problem updateShipment(int $transportId, ?ChangeTransportRequest $body = null)
 * @method PromiseInterface updateShipmentAsync(int $transportId, ?ChangeTransportRequest $body = null)
 * @method array|Problem getShipmentLabel(int $transportId)
 * @method PromiseInterface getShipmentLabelAsync(int $transportId)
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

    /** @var bool the bearer token lock so that we know when to disable it */
    protected bool $bearerTokenLock = false;

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

        $stack = HandlerStack::create();
        $stack->push(Middleware::mapRequest(function (RequestInterface $request) {
            if (!$this->bearerTokenLock)
                return $request->withHeader('Authorization', 'Bearer ' . $this->getBearerToken());
            return $request;
        }));

        $this->client = new \GuzzleHttp\Client(["handler" => $stack]);
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
     * @return array|string|\GuzzleHttp\Promise\Promise
     * @throws \HarmSmits\BolComClient\Exception\ProblemException
     */
    public function __call(string $method, array $args) {
        if (($async = substr($method, -5) === 'Async')) {
            $method = substr($method, 0, -5);
        }

        [$method, $url, $data, $response] = call_user_func_array([$this->request, $method], $args);

        if ($async) {
            return $this->handleAsyncRequest($method, $url, $data, $response);
        } else {
            return $this->handleRequest($method, $url, $data, $response);
        }
    }

    /**
     * Handle a non-blocking request
     *
     * @param $method
     * @param $url
     * @param $data
     * @param $responseFormat
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function handleAsyncRequest($method, $url, $data, array $responseFormat): PromiseInterface
    {
        return $this->client->requestAsync($method, $url, $data)
            ->then(function (ResponseInterface $response) use (&$responseFormat) {
                return $this->handleResponse($response, $responseFormat);
            });
    }

    /**
     * Handle a blocking request
     *
     * @param       $method
     * @param       $url
     * @param       $data
     * @param array $responseFormat
     *
     * @return array|mixed|\Psr\Http\Message\StreamInterface
     * @throws \HarmSmits\BolComClient\Exception\ProblemException
     */
    private function handleRequest($method, $url, $data, array $responseFormat) {
        try {
            $result = $this->client->request($method, $url, $data);
        } catch (RequestException $exception) {
            $response = $exception->getResponse();
            return $this->handleResponse($response, $responseFormat);
        }

        return $this->handleResponse($result, $responseFormat);
    }

    /**
     * Handle the response accordingly
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param array                               $responseFormat
     *
     * @return array|mixed|\Psr\Http\Message\StreamInterface
     * @throws \HarmSmits\BolComClient\Exception\ProblemException
     */
    private function handleResponse(ResponseInterface &$response, array &$responseFormat) {
        if ($response->getStatusCode() === 400) {
            throw new ProblemException(
                $this->populator->populate($responseFormat[$response->getStatusCode()],
                    json_decode($response->getBody(), true))
            );
        } else if ($responseFormat && isset($responseFormat[$response->getStatusCode()])) {
            return $this->populator->populate(
                $responseFormat[$response->getStatusCode()],
                json_decode($response->getBody(), true)
            );
        } else {
            return $response->getBody();
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
        $this->bearerTokenLock = true;

        if ($this->bearerToken === "" || time() - $this->bearerDiff + 5 >= $this->bearerTimestamp) {
            $data = $this->obtainBearerToken();
            $this->setBearerToken($data['access_token'], (int) $data['expires_in']);
        }

        $this->bearerTokenLock = false;

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
