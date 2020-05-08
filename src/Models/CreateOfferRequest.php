<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class CreateOfferRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The EAN number associated with this product. Note: in case an ISBN is provided,
	 * the ISBN will be replaced with the actual EAN belonging to this ISBN.
	 * @var string
	 */
	private string $ean;

	private Condition $condition;

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

	private StockCreate $stock;

	private Fulfilment $fulfilment;


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(string $ean)
	{
		$this->ean = $ean;
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


	public function getStock(): ?StockCreate
	{
		return $this->stock;
	}


	public function setStock(StockCreate $stock)
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


	public function toArray(): array
	{
		return array(
			'ean' => $this->getEan(),
			'condition' => $this->getCondition(),
			'referenceCode' => $this->getReferenceCode(),
			'onHoldByRetailer' => $this->getOnHoldByRetailer(),
			'unknownProductTitle' => $this->getUnknownProductTitle(),
			'pricing' => $this->getPricing(),
			'stock' => $this->getStock(),
			'fulfilment' => $this->getFulfilment(),
		);
	}
}
