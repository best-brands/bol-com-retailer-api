<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getCondition()
 * @method null|float getValue()
 * @method self setValue(float $value)
 */
final class Norm extends \HarmSmits\BolComClient\Models\AModel
{
	const CONDITION_LARGER_EQUAL = ">=";
	const CONDITION_SMALLER_EQUAL = "<=";

	/**
	 * Condition norm for this indicator.
	 * @var string
	 */
	protected ?string $condition = null;

	/**
	 * Service norm for this indicator.
	 * @var float
	 */
	protected ?float $value = null;


	public function setCondition(string $condition): self
	{
		$this->_checkEnumBounds($condition, [
			"<=",
			">="
		]);
		$this->condition = $condition;
		return $this;
	}
}
