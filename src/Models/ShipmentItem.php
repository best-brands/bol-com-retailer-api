<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOrderItemId()
 * @method self setOrderItemId(string $orderItemId)
 * @method null|ShipmentFulfilment getFulfilment()
 * @method self setFulfilment(ShipmentFulfilment $fulfilment)
 * @method null|OrderOffer getOffer()
 * @method self setOffer(OrderOffer $offer)
 * @method null|OrderProduct getProduct()
 * @method self setProduct(OrderProduct $product)
 * @method null|int getQuantity()
 * @method self setQuantity(int $quantity)
 * @method null|float getUnitPrice()
 * @method self setUnitPrice(float $unitPrice)
 * @method null|float getCommission()
 * @method self setCommission(float $commission)
 */
final class ShipmentItem extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * A unique identifier for the item of the order that was shipped in this shipment.
	 * @var string
	 */
	protected ?string $orderItemId = null;

	protected ?ShipmentFulfilment $fulfilment = null;

	protected ?OrderOffer $offer = null;

	protected ?OrderProduct $product = null;

	/**
	 * Amount of the product being ordered.
	 * @var int
	 */
	protected ?int $quantity = null;

	/**
	 * The selling price to the customer of a single unit including VAT.
	 * @var float
	 */
	protected ?float $unitPrice = null;

	/**
	 * The commission.
	 * @var float
	 */
	protected ?float $commission = null;
}
