<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Commission extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	private ?string $ean = null;

	/**
	 * The condition of the offer.
	 * @var string
	 */
	private ?string $condition = null;

	/**
	 * The price for this product with two decimals precision. The price includes VAT.
	 * @var float
	 */
	private ?float $price = null;

	/**
	 * Fixed fee.
	 * @var float
	 */
	private ?float $fixedAmount = null;

	/**
	 * A percentage of the offer price. The percentage can vary per product category.
	 * @var float
	 */
	private ?float $percentage = null;

	/**
	 * Total applicable fee calculated based on the offer price provided.
	 * @var float
	 */
	private ?float $totalCost = null;

	/**
	 * Total applicable fee calculated based on the offer price if you do not meet the
	 * maximum price criteria.
	 * @var float
	 */
	private ?float $totalCostWithoutReduction = null;

	/** @var Reduction[] */
	private array $reductions = [];


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
		$this->condition = $condition;
		return $this;
	}


	public function getPrice(): ?float
	{
		return round($this->price, 2);
	}


	public function setPrice(float $price)
	{
		$this->price = $price;
		return $this;
	}


	public function getFixedAmount(): ?float
	{
		return round($this->fixedAmount, 2);
	}


	public function setFixedAmount(float $fixedAmount)
	{
		$this->fixedAmount = $fixedAmount;
		return $this;
	}


	public function getPercentage(): ?float
	{
		return round($this->percentage, 1);
	}


	public function setPercentage(float $percentage)
	{
		$this->percentage = $percentage;
		return $this;
	}


	public function getTotalCost(): ?float
	{
		return round($this->totalCost, 2);
	}


	public function setTotalCost(float $totalCost)
	{
		$this->totalCost = $totalCost;
		return $this;
	}


	public function getTotalCostWithoutReduction(): ?float
	{
		return round($this->totalCostWithoutReduction, 2);
	}


	public function setTotalCostWithoutReduction(float $totalCostWithoutReduction)
	{
		$this->totalCostWithoutReduction = $totalCostWithoutReduction;
		return $this;
	}


	public function getReductions(): ?array
	{
		return $this->reductions;
	}


	public function setReductions(array $reductions)
	{
		$this->_checkIfPureArray($reductions, \HarmSmits\BolComClient\Models\Reduction::class);
		$this->reductions = $reductions;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'ean' => $this->getEan(),
			'condition' => $this->getCondition(),
			'price' => $this->getPrice(),
			'fixedAmount' => $this->getFixedAmount(),
			'percentage' => $this->getPercentage(),
			'totalCost' => $this->getTotalCost(),
			'totalCostWithoutReduction' => $this->getTotalCostWithoutReduction(),
			'reductions' => $this->_convertPureArray($this->getReductions()),
		);
	}
}
