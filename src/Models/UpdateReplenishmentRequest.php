<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getState()
 * @method null|UpdateDeliveryInfo getDeliveryInfo()
 * @method self setDeliveryInfo(UpdateDeliveryInfo $deliveryInfo)
 * @method null|int getNumberOfLoadCarriers()
 * @method UpdateLoadCarrier[] getLoadCarriers()
 */
final class UpdateReplenishmentRequest extends AModel
{
    const STATE_CANCELLED = 'CANCELLED';

    /**
     * Update the state of the replenishment to cancel the replenishment.
     * @var string
     */
    protected ?string $state = null;

    protected ?UpdateDeliveryInfo $deliveryInfo = null;

    /**
     * The number of parcels in this replenishment. Note: for first mile this is only a maximum of 20 load carriers.
     * @var int
     */
    protected ?int $numberOfLoadCarriers = null;

    /** @var UpdateLoadCarrier[] */
    protected array $loadCarriers = [];

    public function setState(string $state): self
    {
        $this->_checkEnumBounds($state, [
            "CANCELLED",
        ]);
        $this->state = $state;
        return $this;
    }

    public function setNumberOfLoadCarriers(int $numberOfLoadCarriers): self
    {
        $this->_checkIntegerBounds($numberOfLoadCarriers, 1, 50);
        $this->numberOfLoadCarriers = $numberOfLoadCarriers;
        return $this;
    }

    /**
     * @param UpdateLoadCarrier[] $loadCarriers
     *
     * @return $this
     */
    public function setLoadCarriers(array $loadCarriers): self
    {
        $this->_checkIfPureArray($loadCarriers, UpdateLoadCarrier::class);
        $this->_checkArrayBounds($loadCarriers, 1, 50);
        $this->loadCarriers = $loadCarriers;
        return $this;
    }
}
