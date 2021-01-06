<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOrderItemId()
 * @method self setOrderItemId(string $orderItemId)
 * @method null|bool getCancellationRequest()
 * @method self setCancellationRequest(bool $cancellationRequest)
 * @method null|OrderFulfilment getFulfilment()
 * @method self setFulfilment(OrderFulfilment $fulfilment)
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
 * @method null|array getAdditionalServices()
 */
final class OrderOrderItem extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The id for the order item (1 order can have multiple order items).
	 * @var string
	 */
	protected ?string $orderItemId = null;

	/**
	 * Indicates whether the order was cancelled on request of the customer before the
	 * retailer has shipped it.
	 * @var bool
	 */
	protected ?bool $cancellationRequest = null;

	protected ?OrderFulfilment $fulfilment = null;

	protected ?OrderOffer $offer = null;

	protected ?OrderProduct $product = null;

	/**
	 * Amount of ordered products for this order item id.
	 * @var int
	 */
	protected ?int $quantity = null;

	/**
	 * The selling price to the customer of a single unit including VAT.
	 * @var float
	 */
	protected ?float $unitPrice = null;

	/**
	 * The commission for all quantities of this order item.
	 * @var float
	 */
	protected ?float $commission = null;

	/** @var AdditionalService[] */
	protected array $additionalServices = [];


	public function setAdditionalServices(array $additionalServices): self
	{
		$this->_checkIfPureArray($additionalServices, \HarmSmits\BolComClient\Models\AdditionalService::class);
		$this->additionalServices = $additionalServices;
		return $this;
	}
}
