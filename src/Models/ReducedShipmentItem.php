<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOrderItemId()
 * @method self setOrderItemId(string $orderItemId)
 * @method null|string getEan()
 * @method self setEan(string $ean)
 */
final class ReducedShipmentItem extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * A unique identifier for the item of the order that was shipped in this shipment.
	 * @var string
	 */
	protected ?string $orderItemId = null;

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected ?string $ean = null;
}
