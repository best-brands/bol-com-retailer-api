<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedOrder extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The order id.
	 * @var string
	 */
	private ?string $orderId = null;

	/**
	 * The date and time in ISO 8601 format when the order was placed.
	 * @var string
	 */
	private ?string $dateTimeOrderPlaced = null;

	/** @var ReducedOrderItem[] */
	private array $orderItems = [];


	public function getOrderId(): ?string
	{
		return $this->orderId;
	}


	public function setOrderId(string $orderId)
	{
		$this->orderId = $orderId;
		return $this;
	}


	public function getDateTimeOrderPlaced(): ?string
	{
		return $this->dateTimeOrderPlaced;
	}


	public function setDateTimeOrderPlaced(string $dateTimeOrderPlaced)
	{
		$this->dateTimeOrderPlaced = $dateTimeOrderPlaced;
		return $this;
	}


	public function getOrderItems(): ?array
	{
		return $this->orderItems;
	}


	public function setOrderItems(array $orderItems)
	{
		$this->_checkIfPureArray($orderItems, \HarmSmits\BolComClient\Models\ReducedOrderItem::class);
		$this->orderItems = $orderItems;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'orderId' => $this->getOrderId(),
			'dateTimeOrderPlaced' => $this->getDateTimeOrderPlaced(),
			'orderItems' => $this->_convertPureArray($this->getOrderItems()),
		);
	}
}
