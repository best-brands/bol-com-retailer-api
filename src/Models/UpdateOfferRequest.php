<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class UpdateOfferRequest extends \HarmSmits\BolComClient\Objects\AObject
{
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

	private Fulfilment $fulfilment;


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
			'referenceCode' => $this->getReferenceCode(),
			'onHoldByRetailer' => $this->getOnHoldByRetailer(),
			'unknownProductTitle' => $this->getUnknownProductTitle(),
			'fulfilment' => $this->getFulfilment(),
		);
	}
}
