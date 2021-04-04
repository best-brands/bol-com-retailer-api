<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|array getOrderItems()
 */
final class DeliveryOptionsRequest extends AModel
{
	/**
	 * Order items for which the delivery options are requested.
	 * @var OrderItem[]
	 */
	protected array $orderItems = [];

    /**
     * @param OrderItem[] $orderItems
     *
     * @return $this
     */
	public function setOrderItems(array $orderItems): self
	{
		$this->_checkIfPureArray($orderItems, OrderItem::class);
		$this->orderItems = $orderItems;
		return $this;
	}
}
