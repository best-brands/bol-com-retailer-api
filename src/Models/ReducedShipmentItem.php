<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedShipmentItem extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * A unique identifier for the item of the order that was shipped in this shipment.
	 * @var string
	 */
	private ?string $orderItemId = null;

	/**
	 * A unique identifier for the order this shipment is related to.
	 * @var string
	 */
	private ?string $orderId = null;


	public function getOrderItemId(): ?string
	{
		return $this->orderItemId;
	}


	public function setOrderItemId(string $orderItemId)
	{
		$this->orderItemId = $orderItemId;
		return $this;
	}


	public function getOrderId(): ?string
	{
		return $this->orderId;
	}


	public function setOrderId(string $orderId)
	{
		$this->orderId = $orderId;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'orderItemId' => $this->getOrderItemId(),
			'orderId' => $this->getOrderId(),
		);
	}
}
