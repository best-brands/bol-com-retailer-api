<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
