<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|float getMinimum()
 * @method self setMinimum(float $minimum)
 * @method null|float getMaximum()
 * @method self setMaximum(float $maximum)
 */
final class Total extends \HarmSmits\BolComClient\Models\AModel
{
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
