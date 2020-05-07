<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Reduction extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Maximum offer price that can be used to benefit from a commission reduction.
	 * @var int
	 */
	private ?int $maximumPrice = null;

	/**
	 * A reduction to the commission if the maximum price criteria is met.
	 * @var int
	 */
	private ?int $costReduction = null;

	/**
	 * The start date from which the commission reduction is valid.
	 * @var string
	 */
	private ?string $startDate = null;

	/**
	 * The end date from which the commission reduction is not valid anymore.
	 * @var string
	 */
	private ?string $endDate = null;


	public function getMaximumPrice(): ?int
	{
		return $this->maximumPrice;
	}


	public function setMaximumPrice(int $maximumPrice)
	{
		$this->maximumPrice = $maximumPrice;
		return $this;
	}


	public function getCostReduction(): ?int
	{
		return $this->costReduction;
	}


	public function setCostReduction(int $costReduction)
	{
		$this->costReduction = $costReduction;
		return $this;
	}


	public function getStartDate(): ?string
	{
		return $this->startDate;
	}


	public function setStartDate(string $startDate)
	{
		$this->startDate = $startDate;
		return $this;
	}


	public function getEndDate(): ?string
	{
		return $this->endDate;
	}


	public function setEndDate(string $endDate)
	{
		$this->endDate = $endDate;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'maximumPrice' => $this->getMaximumPrice(),
			'costReduction' => $this->getCostReduction(),
			'startDate' => $this->getStartDate(),
			'endDate' => $this->getEndDate(),
		);
	}
}
