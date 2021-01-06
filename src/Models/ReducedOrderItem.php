<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOrderItemId()
 * @method self setOrderItemId(string $orderItemId)
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|int getQuantity()
 * @method self setQuantity(int $quantity)
 */
final class ReducedOrderItem extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The id for the order item (1 order can have multiple order items).
	 * @var string
	 */
	protected ?string $orderItemId = null;

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected ?string $ean = null;

	/**
	 * Amount of ordered products for this order item id.
	 * @var int
	 */
	protected ?int $quantity = null;
}
