<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReturnsResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var ReducedReturnItem[] */
	private array $returns = [];


	public function getReturns(): ?array
	{
		return $this->returns;
	}


	public function setReturns(array $returns)
	{
		$this->_checkIfPureArray($returns, \HarmSmits\BolComClient\Models\ReducedReturnItem::class);
		$this->returns = $returns;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'returns' => $this->_convertPureArray($this->getReturns()),
		);
	}
}
