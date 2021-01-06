<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getProcessStatusQueries()
 */
final class BulkProcessStatusRequest extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var ProcessStatusId[] */
	protected array $processStatusQueries = [];


	public function setProcessStatusQueries(array $processStatusQueries): self
	{
		$this->_checkIfPureArray($processStatusQueries, \HarmSmits\BolComClient\Models\ProcessStatusId::class);
		$this->_checkArrayBounds($processStatusQueries, 1, 1000);
		$this->processStatusQueries = $processStatusQueries;
		return $this;
	}
}
