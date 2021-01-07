<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|OrderItem[] getOrderItems()
 */
final class DeliveryOptionsRequest extends \HarmSmits\BolComClient\Models\AModel
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
		$this->_checkIfPureArray($orderItems, \HarmSmits\BolComClient\Models\OrderItem::class);
		$this->orderItems = $orderItems;
		return $this;
	}
}
