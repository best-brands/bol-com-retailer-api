<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOrderId()
 * @method self setOrderId(string $orderId)
 * @method null|DateTime getOrderPlacedDateTime()
 */
final class ShipmentOrder extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * A unique identifier for the order this shipment is related to.
	 * @var string
	 */
	protected ?string $orderId = null;

	/**
	 * The date and time in ISO 8601 format when the order was placed.
	 * @var DateTime
	 */
	protected ?DateTime $orderPlacedDateTime = null;


	public function setOrderPlacedDateTime($orderPlacedDateTime): self
	{
		$orderPlacedDateTime = $this->_parseDate($orderPlacedDateTime);
		$this->orderPlacedDateTime = $orderPlacedDateTime;
		return $this;
	}
}
