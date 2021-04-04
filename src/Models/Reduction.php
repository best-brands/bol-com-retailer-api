<?php

namespace HarmSmits\BolComClient\Models;

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
final class Reduction extends AModel
{
	/**
	 * Maximum offer price that can be used to benefit from a commission reduction, including VAT.
	 * @var float
	 */
	protected float $maximumPrice;

	/**
	 * A reduction to the commission if the maximum price criteria is met, including VAT.
	 * @var float
	 */
	protected float $costReduction;

	/**
	 * The start date from which the commission reduction is valid, in ISO 8601 format.
	 * @var string
	 */
	protected string $startDate;

	/**
	 * The end date from which the commission reduction is not valid anymore, in ISO 8601 format.
	 * @var string
	 */
	// TODO fix date type
	protected string $endDate;
}
