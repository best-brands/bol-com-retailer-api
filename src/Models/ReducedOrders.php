<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedOrders extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var ReducedOrder[] */
	private array $orders = [];


	public function getOrders(): ?array
	{
		return $this->orders;
	}


	public function setOrders(array $orders)
	{
		$this->_checkIfPureArray($orders, \HarmSmits\BolComClient\Models\ReducedOrder::class);
		$this->orders = $orders;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'orders' => $this->_convertPureArray($this->getOrders()),
		);
	}
}
