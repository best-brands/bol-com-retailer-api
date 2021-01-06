<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getPerformanceIndicators()
 */
final class PerformanceIndicators extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var PerformanceIndicator[] */
	protected array $performanceIndicators = [];


	public function setPerformanceIndicators(array $performanceIndicators): self
	{
		$this->_checkIfPureArray($performanceIndicators, \HarmSmits\BolComClient\Models\PerformanceIndicator::class);
		$this->performanceIndicators = $performanceIndicators;
		return $this;
	}
}
