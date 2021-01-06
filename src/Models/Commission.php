<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getCondition()
 * @method self setCondition(string $condition)
 * @method null|float getUnitPrice()
 * @method self setUnitPrice(float $unitPrice)
 * @method null|float getFixedAmount()
 * @method self setFixedAmount(float $fixedAmount)
 * @method null|float getPercentage()
 * @method self setPercentage(float $percentage)
 * @method null|float getTotalCost()
 * @method self setTotalCost(float $totalCost)
 * @method null|float getTotalCostWithoutReduction()
 * @method self setTotalCostWithoutReduction(float $totalCostWithoutReduction)
 * @method null|array getReductions()
 */
final class Commission extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected ?string $ean = null;

	/**
	 * The condition of the offer.
	 * @var string
	 */
	protected ?string $condition = null;

	/**
	 * The intended selling price per single unit up to 2 decimals precision, including
	 * VAT.
	 * @var float
	 */
	protected float $unitPrice;

	/**
	 * A fixed commission fee, including VAT.
	 * @var float
	 */
	protected ?float $fixedAmount = null;

	/**
	 * A percentage of commission, based on the intended selling price per unit,
	 * including VAT.
	 * @var float
	 */
	protected ?float $percentage = null;

	/**
	 * The total commission for selling this product at bol.com. The price includes VAT
	 * for Dutch sellers, and excludes VAT for Belgium sellers.
	 * @var float
	 */
	protected ?float $totalCost = null;

	/**
	 * The total commission for selling this product at bol.com without reductions
	 * including VAT.
	 * @var float
	 */
	protected ?float $totalCostWithoutReduction = null;

	/** @var Reduction[] */
	protected array $reductions = [];


	public function setReductions(array $reductions): self
	{
		$this->_checkIfPureArray($reductions, \HarmSmits\BolComClient\Models\Reduction::class);
		$this->reductions = $reductions;
		return $this;
	}
}
