<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getInboundId()
 * @method self setInboundId(int $inboundId)
 * @method null|string getReference()
 * @method self setReference(string $reference)
 * @method null|DateTime getCreationDateTime()
 * @method null|string getState()
 * @method null|bool getLabellingService()
 * @method self setLabellingService(bool $labellingService)
 * @method null|int getAnnouncedBSKUs()
 * @method self setAnnouncedBSKUs(int $announcedBSKUs)
 * @method null|int getAnnouncedQuantity()
 * @method self setAnnouncedQuantity(int $announcedQuantity)
 * @method null|int getReceivedBSKUs()
 * @method self setReceivedBSKUs(int $receivedBSKUs)
 * @method null|int getReceivedQuantity()
 * @method self setReceivedQuantity(int $receivedQuantity)
 * @method null|TimeSlot getTimeSlot()
 * @method self setTimeSlot(TimeSlot $timeSlot)
 * @method Product[] getProducts()
 * @method StateTransition[] getStateTransitions()
 * @method null|Transporter getInboundTransporter()
 * @method self setInboundTransporter(Transporter $inboundTransporter)
 */
final class Inbound extends \HarmSmits\BolComClient\Models\AModel
{
	const STATE_DRAFT = 'DRAFT';
	const STATE_PREANNOUNCED = 'PREANNOUNCED';
	const STATE_ARRIVEDATWH = 'ARRIVEDATWH';
	const STATE_CANCELLED = 'CANCELLED';

	/**
	 * A unique identifier for an inbound shipment.
	 * @var int
	 */
	protected int $inboundId;

	/**
	 * A user defined reference to identify the inbound shipment.
	 * @var string
	 */
	protected string $reference;

	/**
	 * The date and time the inbound shipment was created, in ISO 8601 format.
	 * @var DateTime
	 */
	protected ?DateTime $creationDateTime = null;

	/**
	 * The current state of the inbound shipment.
	 * @var string
	 */
	protected string $state;

	/**
	 * Indicates whether the inbound will be labeled by bol.com or not.
	 * @var bool
	 */
	protected bool $labellingService;

	/**
	 * The number of announced BSKU‘s.
	 * @var int
	 */
	protected int $announcedBSKUs;

	/**
	 * The number of announced items.
	 * @var int
	 */
	protected int $announcedQuantity;

	/**
	 * Number of lines that were scanned in our warehouse. This value does not provide
	 * the unique number of received bsku's.
	 * @var int
	 */
	protected int $receivedBSKUs;

	/**
	 * The number of received items.
	 * @var int
	 */
	protected int $receivedQuantity;

	/** The timeslot within which your shipment is expected to arrive at the warehouse. */
	protected ?TimeSlot $timeSlot = null;

	/**
	 * List of products.
	 * @var Product[]
	 */
	protected array $products = [];

	/**
	 * List of state transitions.
	 * @var StateTransition[]
	 */
	protected array $stateTransitions = [];

	/** Transporter for the inbound shipment. */
	protected Transporter $inboundTransporter;


	public function setCreationDateTime($creationDateTime): self
	{
		$creationDateTime = $this->_parseDate($creationDateTime);
		$this->creationDateTime = $creationDateTime;
		return $this;
	}


	public function setState(string $state): self
	{
		$this->_checkEnumBounds($state, [
			"DRAFT",
			"PREANNOUNCED",
			"ARRIVEDATWH",
			"CANCELLED"
		]);
		$this->state = $state;
		return $this;
	}


    /**
     * @param Product[] $products
     *
     * @return $this
     */
	public function setProducts(array $products): self
	{
		$this->_checkIfPureArray($products, \HarmSmits\BolComClient\Models\Product::class);
		$this->products = $products;
		return $this;
	}


    /**
     * @param StateTransition[] $stateTransitions
     *
     * @return $this
     */
	public function setStateTransitions(array $stateTransitions): self
	{
		$this->_checkIfPureArray($stateTransitions, \HarmSmits\BolComClient\Models\StateTransition::class);
		$this->stateTransitions = $stateTransitions;
		return $this;
	}
}
