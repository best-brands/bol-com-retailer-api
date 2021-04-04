<?php

namespace HarmSmits\BolComClient;

use Closure;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\Utils;
use HarmSmits\BolComClient\Exception\BearerTokenException;
use HarmSmits\BolComClient\Exception\InvalidArgumentException;
use HarmSmits\BolComClient\Exception\ProblemException;
use HarmSmits\BolComClient\Models\BulkCommissionRequest;
use HarmSmits\BolComClient\Models\BulkProcessStatusRequest;
use HarmSmits\BolComClient\Models\CancelOrderItemsRequest;
use HarmSmits\BolComClient\Models\ChangeTransportRequest;
use HarmSmits\BolComClient\Models\CreateOfferExportRequest;
use HarmSmits\BolComClient\Models\CreateOfferRequest;
use HarmSmits\BolComClient\Models\CreateProductContentRequest;
use HarmSmits\BolComClient\Models\CreateReplenishmentRequest;
use HarmSmits\BolComClient\Models\CreateReturnRequest;
use HarmSmits\BolComClient\Models\CreateSubscriptionRequest;
use HarmSmits\BolComClient\Models\CreateUnpublishedOfferReportRequest;
use HarmSmits\BolComClient\Models\DeliveryOptionsRequest;
use HarmSmits\BolComClient\Models\PickupTimeSlotsRequest;
use HarmSmits\BolComClient\Models\Problem;
use HarmSmits\BolComClient\Models\ProductLabelsRequest;
use HarmSmits\BolComClient\Models\ReturnRequest;
use HarmSmits\BolComClient\Models\ShipmentRequest;
use HarmSmits\BolComClient\Models\ShippingLabelRequest;
use HarmSmits\BolComClient\Models\UpdateOfferPriceRequest;
use HarmSmits\BolComClient\Models\UpdateOfferRequest;
use HarmSmits\BolComClient\Models\UpdateOfferStockRequest;
use HarmSmits\BolComClient\Models\UpdateReplenishmentRequest;
use HarmSmits\BolComClient\Models\UpdateSubscriptionRequest;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Throwable;

/**
 * Class Client
 * @method postCommission(BulkCommissionRequest $body)
 * @method PromiseInterface postCommissionAsync(BulkCommissionRequest $body)
 * @method getCommissionByEan(string $ean, string $condition, int $unitPrice)
 * @method PromiseInterface getCommissionByEanAsync(string $ean, string $condition, int $unitPrice)
 * @method postContentProduct(CreateProductContentRequest $body = NULL)
 * @method PromiseInterface postContentProductAsync(CreateProductContentRequest $body = NULL)
 * @method getContentValidationReportByUploadId(string $uploadId)
 * @method PromiseInterface getContentValidationReportByUploadIdAsync(string $uploadId)
 * @method getInsightsOffer(string $offerId, string $period, int $numberOfPeriods, array $name)
 * @method PromiseInterface getInsightsOfferAsync(string $offerId, string $period, int $numberOfPeriods, array $name)
 * @method getInsightsPerformanceIndicator(array $name, string $year, string $week)
 * @method PromiseInterface getInsightsPerformanceIndicatorAsync(array $name, string $year, string $week)
 * @method getInsightsSalesForecast(string $offerId, int $weeksAhead)
 * @method PromiseInterface getInsightsSalesForecastAsync(string $offerId, int $weeksAhead)
 * @method getInsightsSearchTerms(string $searchTerm, string $period, int $numberOfPeriods, bool $relatedSearchTerms = NULL)
 * @method PromiseInterface getInsightsSearchTermsAsync(string $searchTerm, string $period, int $numberOfPeriods, bool $relatedSearchTerms = NULL)
 * @method getInventory(int $page = NULL, array $quantity = NULL, string $stock = NULL, string $state = NULL, string $query = NULL)
 * @method PromiseInterface getInventoryAsync(int $page = NULL, array $quantity = NULL, string $stock = NULL, string $state = NULL, string $query = NULL)
 * @method getInvoices(string $periodStartDate = NULL, string $periodEndDate = NULL)
 * @method PromiseInterface getInvoicesAsync(string $periodStartDate = NULL, string $periodEndDate = NULL)
 * @method getInvoicesByInvoiceId(string $invoiceId)
 * @method PromiseInterface getInvoicesByInvoiceIdAsync(string $invoiceId)
 * @method getInvoicesByInvoiceIdSpecification(string $invoiceId, int $page = NULL)
 * @method PromiseInterface getInvoicesByInvoiceIdSpecificationAsync(string $invoiceId, int $page = NULL)
 * @method postOffers(CreateOfferRequest $body)
 * @method PromiseInterface postOffersAsync(CreateOfferRequest $body)
 * @method postOffersExport(CreateOfferExportRequest $body)
 * @method PromiseInterface postOffersExportAsync(CreateOfferExportRequest $body)
 * @method getOffersExportByReportId(string $reportId)
 * @method PromiseInterface getOffersExportByReportIdAsync(string $reportId)
 * @method postOffersUnpublished(CreateUnpublishedOfferReportRequest $body)
 * @method PromiseInterface postOffersUnpublishedAsync(CreateUnpublishedOfferReportRequest $body)
 * @method getOffersUnpublishedByReportId(string $reportId)
 * @method PromiseInterface getOffersUnpublishedByReportIdAsync(string $reportId)
 * @method getOffersByOfferId(string $offerId)
 * @method PromiseInterface getOffersByOfferIdAsync(string $offerId)
 * @method putOffersByOfferId(string $offerId, UpdateOfferRequest $body)
 * @method PromiseInterface putOffersByOfferIdAsync(string $offerId, UpdateOfferRequest $body)
 * @method deleteOffersByOfferId(string $offerId)
 * @method PromiseInterface deleteOffersByOfferIdAsync(string $offerId)
 * @method putOffersByOfferIdPrice(string $offerId, UpdateOfferPriceRequest $body)
 * @method PromiseInterface putOffersByOfferIdPriceAsync(string $offerId, UpdateOfferPriceRequest $body)
 * @method putOffersByOfferIdStock(string $offerId, UpdateOfferStockRequest $body)
 * @method PromiseInterface putOffersByOfferIdStockAsync(string $offerId, UpdateOfferStockRequest $body)
 * @method getOrders(int $page = NULL, string $fulfilmentMethod = NULL, string $status = NULL)
 * @method PromiseInterface getOrdersAsync(int $page = NULL, string $fulfilmentMethod = NULL, string $status = NULL)
 * @method putOrdersCancellation(CancelOrderItemsRequest $body)
 * @method PromiseInterface putOrdersCancellationAsync(CancelOrderItemsRequest $body)
 * @method putOrdersShipment(ShipmentRequest $body)
 * @method PromiseInterface putOrdersShipmentAsync(ShipmentRequest $body)
 * @method getOrdersByOrderId(string $orderId)
 * @method PromiseInterface getOrdersByOrderIdAsync(string $orderId)
 * @method getProcessStatus(string $entityId, string $eventType, int $page = NULL)
 * @method PromiseInterface getProcessStatusAsync(string $entityId, string $eventType, int $page = NULL)
 * @method postProcessStatus(BulkProcessStatusRequest $body)
 * @method PromiseInterface postProcessStatusAsync(BulkProcessStatusRequest $body)
 * @method getProcessStatusByProcessStatusId(string $processStatusId)
 * @method PromiseInterface getProcessStatusByProcessStatusIdAsync(string $processStatusId)
 * @method getReplenishments(string $reference = NULL, string $ean = NULL, string $startDate = NULL, string $endDate = NULL, array $state = NULL, int $page = NULL)
 * @method PromiseInterface getReplenishmentsAsync(string $reference = NULL, string $ean = NULL, string $startDate = NULL, string $endDate = NULL, array $state = NULL, int $page = NULL)
 * @method postReplenishments(CreateReplenishmentRequest $body)
 * @method PromiseInterface postReplenishmentsAsync(CreateReplenishmentRequest $body)
 * @method postReplenishmentsPickupTimeSlots(PickupTimeSlotsRequest $body)
 * @method PromiseInterface postReplenishmentsPickupTimeSlotsAsync(PickupTimeSlotsRequest $body)
 * @method postReplenishmentsProductLabels(ProductLabelsRequest $body)
 * @method PromiseInterface postReplenishmentsProductLabelsAsync(ProductLabelsRequest $body)
 * @method getReplenishmentsByReplenishmentId(string $replenishmentId)
 * @method PromiseInterface getReplenishmentsByReplenishmentIdAsync(string $replenishmentId)
 * @method putReplenishmentsByReplenishmentId(string $replenishmentId, UpdateReplenishmentRequest $body)
 * @method PromiseInterface putReplenishmentsByReplenishmentIdAsync(string $replenishmentId, UpdateReplenishmentRequest $body)
 * @method getReplenishmentsByReplenishmentIdLoadCarrierLabels(string $replenishmentId, string $labelType)
 * @method PromiseInterface getReplenishmentsByReplenishmentIdLoadCarrierLabelsAsync(string $replenishmentId, string $labelType)
 * @method getReplenishmentsByReplenishmentIdPickList(string $replenishmentId)
 * @method PromiseInterface getReplenishmentsByReplenishmentIdPickListAsync(string $replenishmentId)
 * @method getReturns(int $page = NULL, bool $handled = NULL, string $fulfilmentMethod = NULL)
 * @method PromiseInterface getReturnsAsync(int $page = NULL, bool $handled = NULL, string $fulfilmentMethod = NULL)
 * @method postReturns(CreateReturnRequest $body)
 * @method PromiseInterface postReturnsAsync(CreateReturnRequest $body)
 * @method getReturnsByReturnId(string $returnId)
 * @method PromiseInterface getReturnsByReturnIdAsync(string $returnId)
 * @method putReturnsByRmaId(int $rmaId, ReturnRequest $body)
 * @method PromiseInterface putReturnsByRmaIdAsync(int $rmaId, ReturnRequest $body)
 * @method getShipments(int $page = NULL, string $fulfilmentMethod = NULL, string $orderId = NULL)
 * @method PromiseInterface getShipmentsAsync(int $page = NULL, string $fulfilmentMethod = NULL, string $orderId = NULL)
 * @method getShipmentsByShipmentId(string $shipmentId)
 * @method PromiseInterface getShipmentsByShipmentIdAsync(string $shipmentId)
 * @method postShippingLabels(ShippingLabelRequest $body)
 * @method PromiseInterface postShippingLabelsAsync(ShippingLabelRequest $body)
 * @method postShippingLabelsDeliveryOptions(DeliveryOptionsRequest $body)
 * @method PromiseInterface postShippingLabelsDeliveryOptionsAsync(DeliveryOptionsRequest $body)
 * @method getShippingLabelsByShippingLabelId(string $shippingLabelId)
 * @method PromiseInterface getShippingLabelsByShippingLabelIdAsync(string $shippingLabelId)
 * @method getSubscriptions()
 * @method PromiseInterface getSubscriptionsAsync()
 * @method postSubscriptions(CreateSubscriptionRequest $body)
 * @method PromiseInterface postSubscriptionsAsync(CreateSubscriptionRequest $body)
 * @method getSubscriptionsSignatureKeys()
 * @method PromiseInterface getSubscriptionsSignatureKeysAsync()
 * @method postSubscriptionsTest()
 * @method PromiseInterface postSubscriptionsTestAsync()
 * @method getSubscriptionsBySubscriptionId(string $subscriptionId)
 * @method PromiseInterface getSubscriptionsBySubscriptionIdAsync(string $subscriptionId)
 * @method putSubscriptionsBySubscriptionId(string $subscriptionId, UpdateSubscriptionRequest $body)
 * @method PromiseInterface putSubscriptionsBySubscriptionIdAsync(string $subscriptionId, UpdateSubscriptionRequest $body)
 * @method deleteSubscriptionsBySubscriptionId(string $subscriptionId)
 * @method PromiseInterface deleteSubscriptionsBySubscriptionIdAsync(string $subscriptionId)
 * @method putTransportsByTransportId(string $transportId, ChangeTransportRequest $body)
 * @method PromiseInterface putTransportsByTransportIdAsync(string $transportId, ChangeTransportRequest $body)
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

    /** @var Request request dispatcher */
    protected Request $request;

    /** @var Populator */
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

    protected int $maxRateLimitTimeout;

    /**
     * Client constructor.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param int    $maxRateLimitTimeout
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $clientId, string $clientSecret, int $maxRateLimitTimeout = 60)
    {
        if (!$clientId || !$clientSecret) {
            throw new InvalidArgumentException("Unable to obtain bearer token");
        }

        $stack = HandlerStack::create();
        $stack->push(Middleware::mapRequest($this->getRequestHandler()));
        $stack->push(Middleware::retry($this->getRetryHandler()));

        $this->client = new \GuzzleHttp\Client(["handler" => $stack]);
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->maxRateLimitTimeout = $maxRateLimitTimeout;

        $this->request = new Request();
        $this->populator = new Populator();
    }

    /**
     * Unwrap an array of async requests, very useful when stacking multiple
     *
     * @param array $promises
     *
     * @return array
     * @throws Throwable
     */
    public function unwrap(array $promises): array
    {
        return Utils::unwrap($promises);
    }

    /**
     * Get the retry handler
     *
     * @return Closure
     */
    private function getRetryHandler(): Closure
    {
        return function ($retries, ?RequestInterface $request, ?ResponseInterface $response,
            ?RequestException $exception) {
            if (!$response || $response->getStatusCode() > 500 || ($exception && $exception instanceof ConnectException))
                return false;

            if (($wait = $response->getHeaderLine("retry-after")) && intval($wait) <= $this->maxRateLimitTimeout) {
                sleep(intval($wait));
                return true;
            }

            return false;
        };
    }

    /**
     * Get the request handler
     *
     * @return Closure
     */
    private function getRequestHandler(): Closure
    {
        return function (RequestInterface $request) {
            if (!$this->bearerTokenLock)
                return $request->withHeader('Authorization', 'Bearer ' . $this->getBearerToken());
            return $request;
        };
    }

    /**
     * Dispatch the request. This is some serious sorcery not to be touched.
     *
     * @param string $method
     * @param array  $args
     *
     * @return array|string|Promise
     * @throws ProblemException|GuzzleException
     */
    public function __call(string $method, array $args)
    {
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
     * @return PromiseInterface
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
     * @return array|mixed|StreamInterface
     * @throws ProblemException|GuzzleException
     */
    private function handleRequest($method, $url, $data, array $responseFormat)
    {
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
     * @param ResponseInterface $response
     * @param array             $responseFormat
     *
     * @return array|mixed|StreamInterface
     * @throws ProblemException
     */
    private function handleResponse(ResponseInterface $response, array $responseFormat)
    {
        if ($responseFormat && isset($responseFormat[$response->getStatusCode()])) {
            $body = json_decode($response->getBody(), true);
            $result = $this->populator->populate($responseFormat[$response->getStatusCode()], $body);

            if ($result instanceof Problem) {
                throw new ProblemException($result);
            }

            return $result;
        } else {
            return $response->getBody();
        }
    }

    /**
     * Set the current bearer token (for requests)
     *
     * @param string $bearerToken
     * @param int    $ttl
     * @param int    $diff
     *
     * @throws InvalidArgumentException
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
     * @throws InvalidArgumentException|GuzzleException|BearerTokenException
     */
    private function getBearerToken(): string
    {
        $this->bearerTokenLock = true;

        if (empty($this->bearerToken) || time() - $this->bearerTtl + 5 >= $this->bearerTimestamp) {
            $data = $this->obtainBearerToken();
            $this->setBearerToken($data['access_token'], (int)$data['expires_in']);
        }

        $this->bearerTokenLock = false;

        return $this->bearerToken;
    }

    /**
     * Obtain a bearer token
     *
     * @return mixed
     * @throws BearerTokenException|GuzzleException
     */
    private function obtainBearerToken()
    {
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
