<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getCountryCode()
 * @method self setCountryCode(string $countryCode)
 * @method null|float getMinimum()
 * @method self setMinimum(float $minimum)
 * @method null|float getMaximum()
 * @method self setMaximum(float $maximum)
 */
final class Countries extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * Countries in which this offer is currently on sale in the webshop, in ISO-3166-1
	 * format
	 * @var string
	 */
	protected ?string $countryCode = null;

	/**
	 * Minimum number of estimated sales expectations on the bol.com platform.
	 * @var float
	 */
	protected ?float $minimum = null;

	/**
	 * Maximum number of estimated sales expectations on the bol.com platform.
	 * @var float
	 */
	protected ?float $maximum = null;
}
