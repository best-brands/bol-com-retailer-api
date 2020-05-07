<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class BulkCommissionResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var Commission[] */
	private array $commissions = [];


	public function getCommissions(): ?array
	{
		return $this->commissions;
	}


	public function setCommissions(array $commissions)
	{
		$this->_checkIfPureArray($commissions, \HarmSmits\BolComClient\Models\Commission::class);
		$this->commissions = $commissions;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'commissions' => $this->_convertPureArray($this->getCommissions()),
		);
	}
}
