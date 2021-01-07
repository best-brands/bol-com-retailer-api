<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method ReducedShipment[] getShipments()
 */
final class ShipmentResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var ReducedShipment[] */
	protected array $shipments = [];


    /**
     * @param ReducedShipment[] $shipments
     *
     * @return $this
     */
	public function setShipments(array $shipments): self
	{
		$this->_checkIfPureArray($shipments, \HarmSmits\BolComClient\Models\ReducedShipment::class);
		$this->shipments = $shipments;
		return $this;
	}
}
