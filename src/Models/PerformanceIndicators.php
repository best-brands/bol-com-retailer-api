<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method PerformanceIndicator[] getPerformanceIndicators()
 */
final class PerformanceIndicators extends AModel
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
        $this->_checkIfPureArray($performanceIndicators, PerformanceIndicator::class);
        $this->performanceIndicators = $performanceIndicators;
        return $this;
    }
}
