<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedOrderItem extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The id for the order item (1 order can have multiple order items).
	 * @var string
	 */
	private ?string $orderItemId = null;

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	private ?string $ean = null;

	/**
	 * Indicates whether the order was cancelled on request of the customer before the
	 * retailer has shipped it.
	 * @var bool
	 */
	private ?bool $cancelRequest = null;

	/**
	 * Amount of ordered products for this order item id.
	 * @var int
	 */
	private ?int $quantity = null;


	public function getOrderItemId(): ?string
	{
		return $this->orderItemId;
	}


	public function setOrderItemId(string $orderItemId)
	{
		$this->orderItemId = $orderItemId;
		return $this;
	}


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(string $ean)
	{
		$this->ean = $ean;
		return $this;
	}


	public function getCancelRequest(): ?bool
	{
		return $this->cancelRequest;
	}


	public function setCancelRequest(bool $cancelRequest)
	{
		$this->cancelRequest = $cancelRequest;
		return $this;
	}


	public function getQuantity(): ?int
	{
		return $this->quantity;
	}


	public function setQuantity(int $quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'orderItemId' => $this->getOrderItemId(),
			'ean' => $this->getEan(),
			'cancelRequest' => $this->getCancelRequest(),
			'quantity' => $this->getQuantity(),
		);
	}
}
