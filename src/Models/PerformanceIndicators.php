<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class PerformanceIndicators extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var PerformanceIndicator[] */
	private array $performanceIndicators = [];


	public function getPerformanceIndicators(): ?array
	{
		return $this->performanceIndicators;
	}


	public function setPerformanceIndicators(array $performanceIndicators)
	{
		$this->_checkIfPureArray($performanceIndicators, \HarmSmits\BolComClient\Models\PerformanceIndicator::class);
		$this->performanceIndicators = $performanceIndicators;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'performanceIndicators' => $this->_convertPureArray($this->getPerformanceIndicators()),
		);
	}
}
