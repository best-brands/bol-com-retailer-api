<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class BulkProcessStatusRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var ProcessStatusId[] */
	private array $processStatusQueries = [];


	public function getProcessStatusQueries(): ?array
	{
		return $this->processStatusQueries;
	}


	public function setProcessStatusQueries(array $processStatusQueries)
	{
		$this->_checkIfPureArray($processStatusQueries, \HarmSmits\BolComClient\Models\ProcessStatusId::class);
		$this->_checkArrayBounds($processStatusQueries, 1, 1000);
		$this->processStatusQueries = $processStatusQueries;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'processStatusQueries' => $this->_convertPureArray($this->getProcessStatusQueries()),
		);
	}
}
