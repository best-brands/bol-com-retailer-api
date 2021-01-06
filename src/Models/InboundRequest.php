<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getReference()
 * @method self setReference(string $reference)
 * @method null|TimeSlot getTimeSlot()
 * @method self setTimeSlot(TimeSlot $timeSlot)
 * @method null|Transporter getInboundTransporter()
 * @method self setInboundTransporter(Transporter $inboundTransporter)
 * @method null|bool getLabellingService()
 * @method self setLabellingService(bool $labellingService)
 * @method null|array getProducts()
 */
final class InboundRequest extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * A user defined reference to identify the inbound shipment.
	 * @var string
	 */
	protected ?string $reference = null;

	/** The timeslot within which your shipment is expected to arrive at the warehouse. */
	protected TimeSlot $timeSlot;

	/** Transporter for the inbound shipment. */
	protected Transporter $inboundTransporter;

	/**
	 * Indicates whether the inbound will be labeled by bol.com or not.
	 * @var bool
	 */
	protected bool $labellingService;

	/**
	 * List of products.
	 * @var InboundProductRequest[]
	 */
	protected array $products = [];


	public function setProducts(array $products): self
	{
		$this->_checkIfPureArray($products, \HarmSmits\BolComClient\Models\InboundProductRequest::class);
		$this->products = $products;
		return $this;
	}
}
