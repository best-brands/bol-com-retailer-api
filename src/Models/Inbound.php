<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Inbound extends \HarmSmits\BolComClient\Objects\AObject
{
	const STATE_Draft = 'Draft';
	const STATE_PreAnnounced = 'PreAnnounced';
	const STATE_ArrivedAtWH = 'ArrivedAtWH';
	const STATE_Cancelled = 'Cancelled';

	/**
	 * A unique identifier for an inbound shipment.
	 * @var int
	 */
	private int $id;

	/**
	 * A user defined reference to identify the inbound shipment.
	 * @var string
	 */
	private string $reference;

	/**
	 * The date the inbound shipment was created in ISO 8601 format.
	 * @var string
	 */
	private ?string $creationDate = null;

	/**
	 * The current state of the inbound shipment.
	 * @var string
	 */
	private string $state;

	/**
	 * Indicates whether the inbound will be labeled by bol.com or not.
	 * @var bool
	 */
	private bool $labellingService;

	/**
	 * The number of announced BSKU‘s.
	 * @var int
	 */
	private int $announcedBSKUs;

	/**
	 * The number of announced items.
	 * @var int
	 */
	private int $announcedQuantity;

	/**
	 * The number of received BSKU‘s.
	 * @var int
	 */
	private int $receivedBSKUs;

	/**
	 * The number of received items.
	 * @var int
	 */
	private int $receivedQuantity;

	/** The chosen timeslot for the inbound shipment. */
	private ?TimeSlot $timeSlot = null;

	/**
	 * List of products.
	 * @var Product[]
	 */
	private array $products = [];

	/**
	 * List of state transitions.
	 * @var StateTransition[]
	 */
	private array $stateTransitions = [];

	/** Transporter for the inbound shipment. */
	private Transporter $fbbTransporter;


	public function getId(): ?int
	{
		return $this->id;
	}


	public function setId(int $id)
	{
		$this->id = $id;
		return $this;
	}


	public function getReference(): ?string
	{
		return $this->reference;
	}


	public function setReference(string $reference)
	{
		$this->reference = $reference;
		return $this;
	}


	public function getCreationDate(): ?string
	{
		return $this->creationDate;
	}


	public function setCreationDate(string $creationDate)
	{
		$this->creationDate = $creationDate;
		return $this;
	}


	public function getState(): ?string
	{
		return $this->state;
	}


	public function setState(string $state)
	{
		$this->_checkEnumBounds($state, [
			"Draft",
			"PreAnnounced",
			"ArrivedAtWH",
			"Cancelled"
		]);
		$this->state = $state;
		return $this;
	}


	public function getLabellingService(): ?bool
	{
		return $this->labellingService;
	}


	public function setLabellingService(bool $labellingService)
	{
		$this->labellingService = $labellingService;
		return $this;
	}


	public function getAnnouncedBSKUs(): ?int
	{
		return $this->announcedBSKUs;
	}


	public function setAnnouncedBSKUs(int $announcedBSKUs)
	{
		$this->announcedBSKUs = $announcedBSKUs;
		return $this;
	}


	public function getAnnouncedQuantity(): ?int
	{
		return $this->announcedQuantity;
	}


	public function setAnnouncedQuantity(int $announcedQuantity)
	{
		$this->announcedQuantity = $announcedQuantity;
		return $this;
	}


	public function getReceivedBSKUs(): ?int
	{
		return $this->receivedBSKUs;
	}


	public function setReceivedBSKUs(int $receivedBSKUs)
	{
		$this->receivedBSKUs = $receivedBSKUs;
		return $this;
	}


	public function getReceivedQuantity(): ?int
	{
		return $this->receivedQuantity;
	}


	public function setReceivedQuantity(int $receivedQuantity)
	{
		$this->receivedQuantity = $receivedQuantity;
		return $this;
	}


	public function getTimeSlot(): ?TimeSlot
	{
		return $this->timeSlot;
	}


	public function setTimeSlot(TimeSlot $timeSlot)
	{
		$this->timeSlot = $timeSlot;
		return $this;
	}


	public function getProducts(): ?array
	{
		return $this->products;
	}


	public function setProducts(array $products)
	{
		$this->_checkIfPureArray($products, \HarmSmits\BolComClient\Models\Product::class);
		$this->products = $products;
		return $this;
	}


	public function getStateTransitions(): ?array
	{
		return $this->stateTransitions;
	}


	public function setStateTransitions(array $stateTransitions)
	{
		$this->_checkIfPureArray($stateTransitions, \HarmSmits\BolComClient\Models\StateTransition::class);
		$this->stateTransitions = $stateTransitions;
		return $this;
	}


	public function getFbbTransporter(): ?Transporter
	{
		return $this->fbbTransporter;
	}


	public function setFbbTransporter(Transporter $fbbTransporter)
	{
		$this->fbbTransporter = $fbbTransporter;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'id' => $this->getId(),
			'reference' => $this->getReference(),
			'creationDate' => $this->getCreationDate(),
			'state' => $this->getState(),
			'labellingService' => $this->getLabellingService(),
			'announcedBSKUs' => $this->getAnnouncedBSKUs(),
			'announcedQuantity' => $this->getAnnouncedQuantity(),
			'receivedBSKUs' => $this->getReceivedBSKUs(),
			'receivedQuantity' => $this->getReceivedQuantity(),
			'timeSlot' => $this->getTimeSlot(),
			'products' => $this->_convertPureArray($this->getProducts()),
			'stateTransitions' => $this->_convertPureArray($this->getStateTransitions()),
			'fbbTransporter' => $this->getFbbTransporter(),
		);
	}
}
