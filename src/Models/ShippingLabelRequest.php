<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method OrderItem[] getOrderItems()
 * @method null|string getShippingLabelOfferId()
 * @method self setShippingLabelOfferId(string $shippingLabelOfferId)
 */
final class ShippingLabelRequest extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * Order items for which the delivery options are requested.
	 * @var OrderItem[]
	 */
	protected array $orderItems = [];

	/**
	 * Shipping label offer id for which you request a shipping label.
	 * @var string
	 */
	protected string $shippingLabelOfferId;


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
