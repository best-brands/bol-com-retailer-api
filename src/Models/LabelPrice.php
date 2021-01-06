<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|float getTotalPrice()
 * @method self setTotalPrice(float $totalPrice)
 */
final class LabelPrice extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The price that is charged for this delivery option, excluding VAT.
	 * @var float
	 */
	protected ?float $totalPrice = null;
}
