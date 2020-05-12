<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class RetailerOffer extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Unique identifier for an offer.
	 * @var string
	 */
	private ?string $offerId = null;

	/**
	 * The EAN number associated with this product. Note: in case an ISBN is provided,
	 * the ISBN will be replaced with the actual EAN belonging to this ISBN.
	 * @var string
	 */
	private ?string $ean = null;

	/**
	 * A user-defined reference that helps you identify this particular offer when
	 * receiving data from us. This element can optionally be left empty and has a
	 * maximum amount of 20 characters.
	 * @var string
	 */
	private ?string $referenceCode = null;

	/**
	 * Indicates whether or not you want to put this offer for sale on the bol.com
	 * website. Defaults to false.
	 * @var bool
	 */
	private ?bool $onHoldByRetailer = null;

	/**
	 * In case the item is not known to bol.com you can use this field to identify this
	 * particular product. Note: in case the product is known to bol.com, the unknown
	 * product title will not be stored.
	 * @var string
	 */
	private ?string $unknownProductTitle = null;

	private Pricing $pricing;

	private Stock $stock;

	private Fulfilment $fulfilment;

	private Store $store;

	private Condition $condition;

	/** @var NotPublishableReason[] */
	private array $notPublishableReasons = [];


	public function getOfferId(): ?string
	{
		return $this->offerId;
	}


	public function setOfferId(string $offerId)
	{
		$this->offerId = $offerId;
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


	public function getReferenceCode(): ?string
	{
		return $this->referenceCode;
	}


	public function setReferenceCode(string $referenceCode)
	{
		$this->referenceCode = $referenceCode;
		return $this;
	}


	public function getOnHoldByRetailer(): ?bool
	{
		return $this->onHoldByRetailer;
	}


	public function setOnHoldByRetailer(bool $onHoldByRetailer)
	{
		$this->onHoldByRetailer = $onHoldByRetailer;
		return $this;
	}


	public function getUnknownProductTitle(): ?string
	{
		return $this->unknownProductTitle;
	}


	public function setUnknownProductTitle(string $unknownProductTitle)
	{
		$this->unknownProductTitle = $unknownProductTitle;
		return $this;
	}


	public function getPricing(): ?Pricing
	{
		return $this->pricing;
	}


	public function setPricing(Pricing $pricing)
	{
		$this->pricing = $pricing;
		return $this;
	}


	public function getStock(): ?Stock
	{
		return $this->stock;
	}


	public function setStock(Stock $stock)
	{
		$this->stock = $stock;
		return $this;
	}


	public function getFulfilment(): ?Fulfilment
	{
		return $this->fulfilment;
	}


	public function setFulfilment(Fulfilment $fulfilment)
	{
		$this->fulfilment = $fulfilment;
		return $this;
	}


	public function getStore(): ?Store
	{
		return $this->store;
	}


	public function setStore(Store $store)
	{
		$this->store = $store;
		return $this;
	}


	public function getCondition(): ?Condition
	{
		return $this->condition;
	}


	public function setCondition(Condition $condition)
	{
		$this->condition = $condition;
		return $this;
	}


	public function getNotPublishableReasons(): ?array
	{
		return $this->notPublishableReasons;
	}


	public function setNotPublishableReasons(array $notPublishableReasons)
	{
		$this->_checkIfPureArray($notPublishableReasons, \HarmSmits\BolComClient\Models\NotPublishableReason::class);
		$this->notPublishableReasons = $notPublishableReasons;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'offerId' => $this->getOfferId(),
			'ean' => $this->getEan(),
			'referenceCode' => $this->getReferenceCode(),
			'onHoldByRetailer' => $this->getOnHoldByRetailer(),
			'unknownProductTitle' => $this->getUnknownProductTitle(),
			'pricing' => $this->getPricing()->toArray(),
			'stock' => $this->getStock()->toArray(),
			'fulfilment' => $this->getFulfilment()->toArray(),
			'store' => $this->getStore()->toArray(),
			'condition' => $this->getCondition()->toArray(),
			'notPublishableReasons' => $this->_convertPureArray($this->getNotPublishableReasons()),
		);
	}
}
