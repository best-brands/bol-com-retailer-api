<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getReference()
 * @method self setReference(string $reference)
 * @method null|bool getOnHoldByRetailer()
 * @method self setOnHoldByRetailer(bool $onHoldByRetailer)
 * @method null|string getUnknownProductTitle()
 * @method self setUnknownProductTitle(string $unknownProductTitle)
 * @method null|Fulfilment getFulfilment()
 * @method self setFulfilment(Fulfilment $fulfilment)
 */
final class UpdateOfferRequest extends \HarmSmits\BolComClient\Models\AModel
{
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

	protected Fulfilment $fulfilment;
}
