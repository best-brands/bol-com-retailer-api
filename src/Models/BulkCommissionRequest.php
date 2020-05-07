<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class BulkCommissionRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var BulkCommissionQuery[] */
	private array $commissionQueries = [];


	public function getCommissionQueries(): ?array
	{
		return $this->commissionQueries;
	}


	public function setCommissionQueries(array $commissionQueries)
	{
		$this->_checkIfPureArray($commissionQueries, \HarmSmits\BolComClient\Models\BulkCommissionQuery::class);
		$this->_checkArrayBounds($commissionQueries, 0, 100);
		$this->commissionQueries = $commissionQueries;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'commissionQueries' => $this->_convertPureArray($this->getCommissionQueries()),
		);
	}
}
