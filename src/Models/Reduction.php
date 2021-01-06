<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|float getMaximumPrice()
 * @method self setMaximumPrice(float $maximumPrice)
 * @method null|float getCostReduction()
 * @method self setCostReduction(float $costReduction)
 * @method null|string getStartDate()
 * @method self setStartDate(string $startDate)
 * @method null|string getEndDate()
 * @method self setEndDate(string $endDate)
 */
final class Reduction extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * Maximum offer price that can be used to benefit from a commission reduction,
	 * including VAT.
	 * @var float
	 */
	protected ?float $maximumPrice = null;

	/**
	 * A reduction to the commission if the maximum price criteria is met, including
	 * VAT.
	 * @var float
	 */
	protected ?float $costReduction = null;

	/**
	 * The start date from which the commission reduction is valid, in ISO 8601 format.
	 * @var string
	 */
	protected ?string $startDate = null;

	/**
	 * The end date from which the commission reduction is not valid anymore, in ISO
	 * 8601 format.
	 * @var string
	 */
	protected ?string $endDate = null;
}
