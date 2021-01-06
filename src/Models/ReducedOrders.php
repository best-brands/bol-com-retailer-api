<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getOrders()
 */
final class ReducedOrders extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var ReducedOrder[] */
	protected array $orders = [];


	public function setOrders(array $orders): self
	{
		$this->_checkIfPureArray($orders, \HarmSmits\BolComClient\Models\ReducedOrder::class);
		$this->orders = $orders;
		return $this;
	}
}
