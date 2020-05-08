<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
