<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getCommissions()
 */
final class BulkCommissionResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var Commission[] */
	protected array $commissions = [];


	public function setCommissions(array $commissions): self
	{
		$this->_checkIfPureArray($commissions, \HarmSmits\BolComClient\Models\Commission::class);
		$this->commissions = $commissions;
		return $this;
	}
}
