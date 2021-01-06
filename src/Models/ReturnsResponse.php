<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getReturns()
 */
final class ReturnsResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var ReducedReturn[] */
	protected array $returns = [];


	public function setReturns(array $returns): self
	{
		$this->_checkIfPureArray($returns, \HarmSmits\BolComClient\Models\ReducedReturn::class);
		$this->returns = $returns;
		return $this;
	}
}
