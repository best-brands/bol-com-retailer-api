<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class OrderItem extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The id for the order item (1 order can have multiple order items).
	 * @var string
	 */
	private ?string $orderItemId = null;

	/**
	 * Value provided by retailer through Offer API as ‘referenceCode’.
	 * @var string
	 */
	private ?string $offerReference = null;

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	private ?string $ean = null;

	/**
	 * Title of the product as shown on the webshop.
	 * @var string
	 */
	private ?string $title = null;

	/**
	 * Amount of ordered products for this order item id.
	 * @var int
	 */
	private ?int $quantity = null;

	/**
	 * The total price for this order item id (item price multiplied by the quantity).
	 * @var float
	 */
	private ?float $offerPrice = null;

	/**
	 * Unique identifier for an offer.
	 * @var string
	 */
	private ?string $offerId = null;

	/**
	 * Fee of the transaction.
	 * @var float
	 */
	private ?float $transactionFee = null;

	/**
	 * The ultimate delivery date at which this order must be delivered at the
	 * customer's shipping address. This field is empty in case the exactDeliveryDate
	 * is filled.
	 * @var string
	 */
	private ?string $latestDeliveryDate = null;

	/**
	 * The date this order item will automatically expire and thereby cancelling this
	 * order item from the order.
	 * @var string
	 */
	private ?string $expiryDate = null;

	/**
	 * The exact delivery date at which this order must be delivered at the customer's
	 * shipping address. This field is only filled when the customer chose an exact
	 * date for delivery. This field is empty in case the latestDeliveryDate is filled.
	 * @var string
	 */
	private ?string $exactDeliveryDate = null;

	/**
	 * Condition of the offer.
	 * @var string
	 */
	private ?string $offerCondition = null;

	/**
	 * Indicates whether the order was cancelled on request of the customer before the
	 * retailer has shipped it.
	 * @var bool
	 */
	private ?bool $cancelRequest = null;

	/**
	 * Specifies whether this shipment has been fulfilled by the retailer (FBR) or
	 * fulfilled by bol.com (FBB). Defaults to FBR.
	 * @var string
	 */
	private ?string $fulfilmentMethod = null;

	/** @var AdditionalService[] */
	private array $additionalServices = [];


	public function getOrderItemId(): ?string
	{
		return $this->orderItemId;
	}


	public function setOrderItemId(string $orderItemId)
	{
		$this->orderItemId = $orderItemId;
		return $this;
	}


	public function getOfferReference(): ?string
	{
		return $this->offerReference;
	}


	public function setOfferReference(string $offerReference)
	{
		$this->offerReference = $offerReference;
		return $this;
	}


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(string $ean)
	{
		$this->ean = $ean;
		return $this;
	}


	public function getTitle(): ?string
	{
		return $this->title;
	}


	public function setTitle(string $title)
	{
		$this->title = $title;
		return $this;
	}


	public function getQuantity(): ?int
	{
		return $this->quantity;
	}


	public function setQuantity(int $quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}


	public function getOfferPrice(): ?float
	{
		return round($this->offerPrice, 2);
	}


	public function setOfferPrice(float $offerPrice)
	{
		$this->offerPrice = $offerPrice;
		return $this;
	}


	public function getOfferId(): ?string
	{
		return $this->offerId;
	}


	public function setOfferId(string $offerId)
	{
		$this->offerId = $offerId;
		return $this;
	}


	public function getTransactionFee(): ?float
	{
		return round($this->transactionFee, 2);
	}


	public function setTransactionFee(float $transactionFee)
	{
		$this->transactionFee = $transactionFee;
		return $this;
	}


	public function getLatestDeliveryDate(): ?string
	{
		return $this->latestDeliveryDate;
	}


	public function setLatestDeliveryDate(string $latestDeliveryDate)
	{
		$this->latestDeliveryDate = $latestDeliveryDate;
		return $this;
	}


	public function getExpiryDate(): ?string
	{
		return $this->expiryDate;
	}


	public function setExpiryDate(string $expiryDate)
	{
		$this->expiryDate = $expiryDate;
		return $this;
	}


	public function getExactDeliveryDate(): ?string
	{
		return $this->exactDeliveryDate;
	}


	public function setExactDeliveryDate(string $exactDeliveryDate)
	{
		$this->exactDeliveryDate = $exactDeliveryDate;
		return $this;
	}


	public function getOfferCondition(): ?string
	{
		return $this->offerCondition;
	}


	public function setOfferCondition(string $offerCondition)
	{
		$this->offerCondition = $offerCondition;
		return $this;
	}


	public function getCancelRequest(): ?bool
	{
		return $this->cancelRequest;
	}


	public function setCancelRequest(bool $cancelRequest)
	{
		$this->cancelRequest = $cancelRequest;
		return $this;
	}


	public function getFulfilmentMethod(): ?string
	{
		return $this->fulfilmentMethod;
	}


	public function setFulfilmentMethod(string $fulfilmentMethod)
	{
		$this->fulfilmentMethod = $fulfilmentMethod;
		return $this;
	}


	public function getAdditionalServices(): ?array
	{
		return $this->additionalServices;
	}


	public function setAdditionalServices(array $additionalServices)
	{
		$this->_checkIfPureArray($additionalServices, \HarmSmits\BolComClient\Models\AdditionalService::class);
		$this->additionalServices = $additionalServices;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'orderItemId' => $this->getOrderItemId(),
			'offerReference' => $this->getOfferReference(),
			'ean' => $this->getEan(),
			'title' => $this->getTitle(),
			'quantity' => $this->getQuantity(),
			'offerPrice' => $this->getOfferPrice(),
			'offerId' => $this->getOfferId(),
			'transactionFee' => $this->getTransactionFee(),
			'latestDeliveryDate' => $this->getLatestDeliveryDate(),
			'expiryDate' => $this->getExpiryDate(),
			'exactDeliveryDate' => $this->getExactDeliveryDate(),
			'offerCondition' => $this->getOfferCondition(),
			'cancelRequest' => $this->getCancelRequest(),
			'fulfilmentMethod' => $this->getFulfilmentMethod(),
			'additionalServices' => $this->_convertPureArray($this->getAdditionalServices()),
		);
	}
}
