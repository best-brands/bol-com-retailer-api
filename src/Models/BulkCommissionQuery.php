<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getCondition()
 * @method null|float getUnitPrice()
 */
final class BulkCommissionQuery extends \HarmSmits\BolComClient\Models\AModel
{
    const CONDITION_NEW = 'NEW';
    const CONDITION_AS_NEW = 'AS_NEW';
    const CONDITION_GOOD = 'GOOD';
    const CONDITION_REASONABLE = 'REASONABLE';
    const CONDITION_MODERATE = 'MODERATE';

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected string $ean;

	/**
	 * The condition of the offer.
	 * @var string
	 */
	protected ?string $condition = null;

	/**
	 * The price of the product with a period as a decimal separator. The price should
	 * always have two decimals precision.
	 * @var float
	 */
	protected float $unitPrice;


	public function setCondition(string $condition): self
	{
		$this->_checkEnumBounds($condition, [
			"NEW",
			"AS_NEW",
			"GOOD",
			"REASONABLE",
			"MODERATE"
		]);
		$this->condition = $condition;
		return $this;
	}


	public function setUnitPrice(float $unitPrice): self
	{
		$this->_checkFloatBounds($unitPrice, 0, 9999);
		$this->unitPrice = $unitPrice;
		return $this;
	}
}
