<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|float getPrice()
 * @method self setPrice(float $price)
 * @method null|string getCountry()
 * @method self setCountry(string $country)
 */
final class RetailPrice extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The retail price for this product with two decimals precision. The price
	 * includes VAT.
	 * @var float
	 */
	protected float $price;

	/**
	 * The ISO-3166 country code.
	 * @var string
	 */
	protected string $country;
}
