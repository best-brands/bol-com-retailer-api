<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedShipment extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * A unique identifier for this shipment.
	 * @var int
	 */
	private ?int $shipmentId = null;

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

	/** @var ReducedShipmentItem[] */
	private array $shipmentItems = [];

	private ReducedTransport $transport;


	public function getShipmentId(): ?int
	{
		return $this->shipmentId;
	}


	public function setShipmentId(int $shipmentId)
	{
		$this->shipmentId = $shipmentId;
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
		$this->_checkIfPureArray($shipmentItems, \HarmSmits\BolComClient\Models\ReducedShipmentItem::class);
		$this->shipmentItems = $shipmentItems;
		return $this;
	}


	public function getTransport(): ?ReducedTransport
	{
		return $this->transport;
	}


	public function setTransport(ReducedTransport $transport)
	{
		$this->transport = $transport;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'shipmentId' => $this->getShipmentId(),
			'shipmentDate' => $this->getShipmentDate(),
			'shipmentReference' => $this->getShipmentReference(),
			'shipmentItems' => $this->_convertPureArray($this->getShipmentItems()),
			'transport' => $this->getTransport()->toArray(),
		);
	}
}
