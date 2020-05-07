<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ProcessStatusResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var ProcessStatus[] */
	private array $processStatuses = [];


	public function getProcessStatuses(): ?array
	{
		return $this->processStatuses;
	}


	public function setProcessStatuses(array $processStatuses)
	{
		$this->_checkIfPureArray($processStatuses, \HarmSmits\BolComClient\Models\ProcessStatus::class);
		$this->processStatuses = $processStatuses;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'processStatuses' => $this->_convertPureArray($this->getProcessStatuses()),
		);
	}
}
