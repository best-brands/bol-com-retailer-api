<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ShipmentResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var ReducedShipment[] */
	private array $shipments = [];


	public function getShipments(): ?array
	{
		return $this->shipments;
	}


	public function setShipments(array $shipments)
	{
		$this->_checkIfPureArray($shipments, \HarmSmits\BolComClient\Models\ReducedShipment::class);
		$this->shipments = $shipments;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'shipments' => $this->_convertPureArray($this->getShipments()),
		);
	}
}
