<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method ReducedShipment[] getShipments()
 */
final class ShipmentsResponse extends AModel
{
    /** @var ReducedShipment[] */
    protected array $shipments = [];

    public function setShipments(array $shipments): self
    {
        $this->_checkIfPureArray($shipments, ReducedShipment::class);
        $this->shipments = $shipments;
        return $this;
    }
}
