<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InboundRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * A user defined reference to identify the inbound shipment.
	 * @var string
	 */
	private ?string $reference = null;

	/** The chosen timeslot for the inbound shipment. */
	private TimeSlot $timeSlot;

	/** Transporter for the inbound shipment. */
	private Transporter $fbbTransporter;

	/**
	 * Indicates whether the inbound will be labeled by bol.com or not.
	 * @var bool
	 */
	private bool $labellingService;

	/**
	 * List of products.
	 * @var InboundProductRequest[]
	 */
	private array $products = [];


	public function getReference(): ?string
	{
		return $this->reference;
	}


	public function setReference(string $reference)
	{
		$this->reference = $reference;
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


	public function getFbbTransporter(): ?Transporter
	{
		return $this->fbbTransporter;
	}


	public function setFbbTransporter(Transporter $fbbTransporter)
	{
		$this->fbbTransporter = $fbbTransporter;
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


	public function getProducts(): ?array
	{
		return $this->products;
	}


	public function setProducts(array $products)
	{
		$this->_checkIfPureArray($products, \HarmSmits\BolComClient\Models\InboundProductRequest::class);
		$this->products = $products;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'reference' => $this->getReference(),
			'timeSlot' => $this->getTimeSlot(),
			'fbbTransporter' => $this->getFbbTransporter(),
			'labellingService' => $this->getLabellingService(),
			'products' => $this->_convertPureArray($this->getProducts()),
		);
	}
}