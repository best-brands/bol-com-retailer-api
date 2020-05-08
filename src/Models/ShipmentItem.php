<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ShipmentItem extends \HarmSmits\BolComClient\Objects\AObject
{
	const OFFER_CONDITION_NEW = 'NEW';
	const OFFER_CONDITION_AS_NEW = 'AS_NEW';
	const OFFER_CONDITION_GOOD = 'GOOD';
	const OFFER_CONDITION_REASONABLE = 'REASONABLE';
	const OFFER_CONDITION_MODERATE = 'MODERATE';
	const FULFILMENT_METHOD_FBR = 'FBR';
	const FULFILMENT_METHOD_FBB = 'FBB';

	/**
	 * A unique identifier for the item of the order that was shipped in this shipment.
	 * @var string
	 */
	private ?string $orderItemId = null;

	/**
	 * A unique identifier for the order this shipment is related to.
	 * @var string
	 */
	private ?string $orderId = null;

	/**
	 * The date and time in ISO 8601 format when the order was placed.
	 * @var string
	 */
	private ?string $orderDate = null;

	/**
	 * The date and time in ISO 8601 format when the order was promised to be
	 * delivered.
	 * @var string
	 */
	private ?string $latestDeliveryDate = null;

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	private ?string $ean = null;

	/**
	 * The product title.
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
	 * @var int
	 */
	private ?int $offerPrice = null;

	/**
	 * Condition of the offer.
	 * @var string
	 */
	private ?string $offerCondition = null;

	/**
	 * The reference provided by the retailer through the offer API (referred to as
	 * ‘referenceCode’).
	 * @var string
	 */
	private ?string $offerReference = null;

	/**
	 * Specifies whether this shipment has been fulfilled by the retailer (FBR) or
	 * fulfilled by bol.com (FBB). Defaults to FBR.
	 * @var string
	 */
	private ?string $fulfilmentMethod = null;


	public function getOrderItemId(): ?string
	{
		return $this->orderItemId;
	}


	public function setOrderItemId(string $orderItemId)
	{
		$this->orderItemId = $orderItemId;
		return $this;
	}


	public function getOrderId(): ?string
	{
		return $this->orderId;
	}


	public function setOrderId(string $orderId)
	{
		$this->orderId = $orderId;
		return $this;
	}


	public function getOrderDate(): ?string
	{
		return $this->orderDate;
	}


	public function setOrderDate(string $orderDate)
	{
		$this->orderDate = $orderDate;
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


	public function getOfferPrice(): ?int
	{
		return $this->offerPrice;
	}


	public function setOfferPrice(int $offerPrice)
	{
		$this->offerPrice = $offerPrice;
		return $this;
	}


	public function getOfferCondition(): ?string
	{
		return $this->offerCondition;
	}


	public function setOfferCondition(string $offerCondition)
	{
		$this->_checkEnumBounds($offerCondition, [
			"NEW",
			"AS_NEW",
			"GOOD",
			"REASONABLE",
			"MODERATE"
		]);
		$this->offerCondition = $offerCondition;
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


	public function getFulfilmentMethod(): ?string
	{
		return $this->fulfilmentMethod;
	}


	public function setFulfilmentMethod(string $fulfilmentMethod)
	{
		$this->_checkEnumBounds($fulfilmentMethod, [
			"FBR",
			"FBB"
		]);
		$this->fulfilmentMethod = $fulfilmentMethod;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'orderItemId' => $this->getOrderItemId(),
			'orderId' => $this->getOrderId(),
			'orderDate' => $this->getOrderDate(),
			'latestDeliveryDate' => $this->getLatestDeliveryDate(),
			'ean' => $this->getEan(),
			'title' => $this->getTitle(),
			'quantity' => $this->getQuantity(),
			'offerPrice' => $this->getOfferPrice(),
			'offerCondition' => $this->getOfferCondition(),
			'offerReference' => $this->getOfferReference(),
			'fulfilmentMethod' => $this->getFulfilmentMethod(),
		);
	}
}
