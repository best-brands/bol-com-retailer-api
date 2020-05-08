<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class BulkCommissionQuery extends \HarmSmits\BolComClient\Objects\AObject
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
	private string $ean;

	/**
	 * The condition of the offer.
	 * @var string
	 */
	private ?string $condition = null;

	/**
	 * The price of the product with a period as a decimal separator. The price should
	 * always have two decimals precision.
	 * @var int
	 */
	private ?int $price = null;


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(string $ean)
	{
		$this->ean = $ean;
		return $this;
	}


	public function getCondition(): ?string
	{
		return $this->condition;
	}


	public function setCondition(string $condition)
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


	public function getPrice(): ?int
	{
		return $this->price;
	}


	public function setPrice(int $price)
	{
		$this->_checkIntegerBounds($price, 0, 9999);
		$this->price = $price;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'ean' => $this->getEan(),
			'condition' => $this->getCondition(),
			'price' => $this->getPrice(),
		);
	}
}
