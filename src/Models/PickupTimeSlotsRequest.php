<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|PickupTimeSlotsAddress getAddress()
 * @method self setAddress(PickupTimeSlotsAddress $address)
 * @method null|int getNumberOfLoadCarriers()
 */
final class PickupTimeSlotsRequest extends AModel
{
    protected PickupTimeSlotsAddress $address;

    /**
     * The number of load carriers in this shipment.
     * @var int
     */
    protected int $numberOfLoadCarriers;

    public function setNumberOfLoadCarriers(int $numberOfLoadCarriers): self
    {
        $this->_checkIntegerBounds($numberOfLoadCarriers, 1, 50);
        $this->numberOfLoadCarriers = $numberOfLoadCarriers;
        return $this;
    }
}
