<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method PerformanceIndicator[] getPerformanceIndicators()
 */
final class PerformanceIndicators extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var PerformanceIndicator[] */
	protected array $performanceIndicators = [];


    /**
     * @param PerformanceIndicator[] $performanceIndicators
     *
     * @return $this
     */
	public function setPerformanceIndicators(array $performanceIndicators): self
	{
		$this->_checkIfPureArray($performanceIndicators, \HarmSmits\BolComClient\Models\PerformanceIndicator::class);
		$this->performanceIndicators = $performanceIndicators;
		return $this;
	}
}
