<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getCommissionQueries()
 */
final class BulkCommissionRequest extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var BulkCommissionQuery[] */
	protected array $commissionQueries = [];


	public function setCommissionQueries(array $commissionQueries): self
	{
		$this->_checkIfPureArray($commissionQueries, \HarmSmits\BolComClient\Models\BulkCommissionQuery::class);
		$this->_checkArrayBounds($commissionQueries, 1, 20);
		$this->commissionQueries = $commissionQueries;
		return $this;
	}
}
