<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOfferId()
 * @method self setOfferId(string $offerId)
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getReference()
 * @method self setReference(string $reference)
 * @method null|bool getOnHoldByRetailer()
 * @method self setOnHoldByRetailer(bool $onHoldByRetailer)
 * @method null|string getUnknownProductTitle()
 * @method self setUnknownProductTitle(string $unknownProductTitle)
 * @method null|Pricing getPricing()
 * @method self setPricing(Pricing $pricing)
 * @method null|Stock getStock()
 * @method self setStock(Stock $stock)
 * @method null|Fulfilment getFulfilment()
 * @method self setFulfilment(Fulfilment $fulfilment)
 * @method null|Store getStore()
 * @method self setStore(Store $store)
 * @method null|Condition getCondition()
 * @method self setCondition(Condition $condition)
 * @method null|array getNotPublishableReasons()
 */
final class RetailerOffer extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * Unique identifier for an offer.
	 * @var string
	 */
	protected ?string $offerId = null;

	/**
	 * The EAN number associated with this product. Note: in case an ISBN is provided,
	 * the ISBN will be replaced with the actual EAN belonging to this ISBN.
	 * @var string
	 */
	protected ?string $ean = null;

	/**
	 * A user-defined reference that helps you identify this particular offer when
	 * receiving data from us. This element can optionally be left empty and has a
	 * maximum amount of 20 characters.
	 * @var string
	 */
	protected ?string $reference = null;

	/**
	 * Indicates whether or not you want to put this offer for sale on the bol.com
	 * website. Defaults to false.
	 * @var bool
	 */
	protected ?bool $onHoldByRetailer = null;

	/**
	 * In case the item is not known to bol.com you can use this field to identify this
	 * particular product. Note: in case the product is known to bol.com, the unknown
	 * product title will not be stored.
	 * @var string
	 */
	protected ?string $unknownProductTitle = null;

	protected Pricing $pricing;

	protected Stock $stock;

	protected Fulfilment $fulfilment;

	protected Store $store;

	protected Condition $condition;

	/** @var NotPublishableReason[] */
	protected array $notPublishableReasons = [];


	public function setNotPublishableReasons(array $notPublishableReasons): self
	{
		$this->_checkIfPureArray($notPublishableReasons, \HarmSmits\BolComClient\Models\NotPublishableReason::class);
		$this->notPublishableReasons = $notPublishableReasons;
		return $this;
	}
}
