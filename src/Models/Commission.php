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
	 * @var int
	 */
	private ?int $price = null;

	/**
	 * Fixed fee.
	 * @var int
	 */
	private ?int $fixedAmount = null;

	/**
	 * A percentage of the offer price. The percentage can vary per product category.
	 * @var int
	 */
	private ?int $percentage = null;

	/**
	 * Total applicable fee calculated based on the offer price provided.
	 * @var int
	 */
	private ?int $totalCost = null;

	/**
	 * Total applicable fee calculated based on the offer price if you do not meet the
	 * maximum price criteria.
	 * @var int
	 */
	private ?int $totalCostWithoutReduction = null;

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


	public function getPrice(): ?int
	{
		return $this->price;
	}


	public function setPrice(int $price)
	{
		$this->price = $price;
		return $this;
	}


	public function getFixedAmount(): ?int
	{
		return $this->fixedAmount;
	}


	public function setFixedAmount(int $fixedAmount)
	{
		$this->fixedAmount = $fixedAmount;
		return $this;
	}


	public function getPercentage(): ?int
	{
		return $this->percentage;
	}


	public function setPercentage(int $percentage)
	{
		$this->percentage = $percentage;
		return $this;
	}


	public function getTotalCost(): ?int
	{
		return $this->totalCost;
	}


	public function setTotalCost(int $totalCost)
	{
		$this->totalCost = $totalCost;
		return $this;
	}


	public function getTotalCostWithoutReduction(): ?int
	{
		return $this->totalCostWithoutReduction;
	}


	public function setTotalCostWithoutReduction(int $totalCostWithoutReduction)
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
