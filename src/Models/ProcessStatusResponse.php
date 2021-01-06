<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getProcessStatuses()
 */
final class ProcessStatusResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var ProcessStatus[] */
	protected array $processStatuses = [];


	public function setProcessStatuses(array $processStatuses): self
	{
		$this->_checkIfPureArray($processStatuses, \HarmSmits\BolComClient\Models\ProcessStatus::class);
		$this->processStatuses = $processStatuses;
		return $this;
	}
}
