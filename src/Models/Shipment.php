<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Shipment extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * A unique identifier for this shipment.
	 * @var int
	 */
	private ?int $shipmentId = null;

	/**
	 * Indicates whether this order is shipped to a Pick Up Point.
	 * @var bool
	 */
	private ?bool $pickUpPoint = null;

	/**
	 * The date and time in ISO 8601 format when the order item was shipped.
	 * @var string
	 */
	private ?string $shipmentDate = null;

	/**
	 * Reference supplied by the user when this item was shipped.
	 * @var string
	 */
	private ?string $shipmentReference = null;

	/** @var ShipmentItem[] */
	private array $shipmentItems = [];

	private ?Transport $transport = null;

	private ?CustomerDetails $customerDetails = null;

	private ?CustomerDetails $billingDetails = null;


	public function getShipmentId(): ?int
	{
		return $this->shipmentId;
	}


	public function setShipmentId(int $shipmentId)
	{
		$this->shipmentId = $shipmentId;
		return $this;
	}


	public function getPickUpPoint(): ?bool
	{
		return $this->pickUpPoint;
	}


	public function setPickUpPoint(bool $pickUpPoint)
	{
		$this->pickUpPoint = $pickUpPoint;
		return $this;
	}


	public function getShipmentDate(): ?string
	{
		return $this->shipmentDate;
	}


	public function setShipmentDate(string $shipmentDate)
	{
		$this->shipmentDate = $shipmentDate;
		return $this;
	}


	public function getShipmentReference(): ?string
	{
		return $this->shipmentReference;
	}


	public function setShipmentReference(string $shipmentReference)
	{
		$this->shipmentReference = $shipmentReference;
		return $this;
	}


	public function getShipmentItems(): ?array
	{
		return $this->shipmentItems;
	}


	public function setShipmentItems(array $shipmentItems)
	{
		$this->_checkIfPureArray($shipmentItems, \HarmSmits\BolComClient\Models\ShipmentItem::class);
		$this->shipmentItems = $shipmentItems;
		return $this;
	}


	public function getTransport(): ?Transport
	{
		return $this->transport;
	}


	public function setTransport(Transport $transport)
	{
		$this->transport = $transport;
		return $this;
	}


	public function getCustomerDetails(): ?CustomerDetails
	{
		return $this->customerDetails;
	}


	public function setCustomerDetails(CustomerDetails $customerDetails)
	{
		$this->customerDetails = $customerDetails;
		return $this;
	}


	public function getBillingDetails(): ?CustomerDetails
	{
		return $this->billingDetails;
	}


	public function setBillingDetails(CustomerDetails $billingDetails)
	{
		$this->billingDetails = $billingDetails;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'shipmentId' => $this->getShipmentId(),
			'pickUpPoint' => $this->getPickUpPoint(),
			'shipmentDate' => $this->getShipmentDate(),
			'shipmentReference' => $this->getShipmentReference(),
			'shipmentItems' => $this->_convertPureArray($this->getShipmentItems()),
			'transport' => $this->getTransport(),
			'customerDetails' => $this->getCustomerDetails(),
			'billingDetails' => $this->getBillingDetails(),
		);
	}
}
