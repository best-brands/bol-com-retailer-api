<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedReturnItem extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The RMA (Return Merchandise Authorization) id that identifies this particular
	 * return.
	 * @var int
	 */
	private ?int $rmaId = null;

	/**
	 * The id of the customer order this return item is in.
	 * @var string
	 */
	private ?string $orderId = null;

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	private ?string $ean = null;

	/**
	 * The quantity that is returned by the customer. Note: this can be greater than 1
	 * in case the customer ordered a quantity greater than 1 of the same product in
	 * the same customer order
	 * @var int
	 */
	private ?int $quantity = null;

	/**
	 * The date and time in ISO 8601 format when this return was registered.
	 * @var string
	 */
	private ?string $registrationDateTime = null;

	/**
	 * The reason why the customer returned this product.
	 * @var string
	 */
	private ?string $returnReason = null;

	/**
	 * Additional details from the customer as to why this item was returned.
	 * @var string
	 */
	private ?string $returnReasonComments = null;

	/**
	 * Specifies whether this shipment has been fulfilled by the retailer (FBR) or
	 * fulfilled by bol.com (FBB). Defaults to FBR.
	 * @var string
	 */
	private ?string $fulfilmentMethod = null;

	/**
	 * Indicates if this return item has been handled (by the retailer).
	 * @var bool
	 */
	private ?bool $handled = null;

	/**
	 * The handling result requested by the retailer.
	 * @var string
	 */
	private ?string $handlingResult = null;

	/**
	 * The processing result of the return.
	 * @var string
	 */
	private ?string $processingResult = null;

	/**
	 * The date and time in ISO 8601 format when the return was processed.
	 * @var string
	 */
	private ?string $processingDateTime = null;


	public function getRmaId(): ?int
	{
		return $this->rmaId;
	}


	public function setRmaId(int $rmaId)
	{
		$this->rmaId = $rmaId;
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


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(string $ean)
	{
		$this->ean = $ean;
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


	public function getRegistrationDateTime(): ?string
	{
		return $this->registrationDateTime;
	}


	public function setRegistrationDateTime(string $registrationDateTime)
	{
		$this->registrationDateTime = $registrationDateTime;
		return $this;
	}


	public function getReturnReason(): ?string
	{
		return $this->returnReason;
	}


	public function setReturnReason(string $returnReason)
	{
		$this->returnReason = $returnReason;
		return $this;
	}


	public function getReturnReasonComments(): ?string
	{
		return $this->returnReasonComments;
	}


	public function setReturnReasonComments(string $returnReasonComments)
	{
		$this->returnReasonComments = $returnReasonComments;
		return $this;
	}


	public function getFulfilmentMethod(): ?string
	{
		return $this->fulfilmentMethod;
	}


	public function setFulfilmentMethod(string $fulfilmentMethod)
	{
		$this->fulfilmentMethod = $fulfilmentMethod;
		return $this;
	}


	public function getHandled(): ?bool
	{
		return $this->handled;
	}


	public function setHandled(bool $handled)
	{
		$this->handled = $handled;
		return $this;
	}


	public function getHandlingResult(): ?string
	{
		return $this->handlingResult;
	}


	public function setHandlingResult(string $handlingResult)
	{
		$this->handlingResult = $handlingResult;
		return $this;
	}


	public function getProcessingResult(): ?string
	{
		return $this->processingResult;
	}


	public function setProcessingResult(string $processingResult)
	{
		$this->processingResult = $processingResult;
		return $this;
	}


	public function getProcessingDateTime(): ?string
	{
		return $this->processingDateTime;
	}


	public function setProcessingDateTime(string $processingDateTime)
	{
		$this->processingDateTime = $processingDateTime;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'rmaId' => $this->getRmaId(),
			'orderId' => $this->getOrderId(),
			'ean' => $this->getEan(),
			'quantity' => $this->getQuantity(),
			'registrationDateTime' => $this->getRegistrationDateTime(),
			'returnReason' => $this->getReturnReason(),
			'returnReasonComments' => $this->getReturnReasonComments(),
			'fulfilmentMethod' => $this->getFulfilmentMethod(),
			'handled' => $this->getHandled(),
			'handlingResult' => $this->getHandlingResult(),
			'processingResult' => $this->getProcessingResult(),
			'processingDateTime' => $this->getProcessingDateTime(),
		);
	}
}
