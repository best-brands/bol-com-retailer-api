<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getReference()
 * @method self setReference(string $reference)
 * @method null|CreateDeliveryInfo getDeliveryInfo()
 * @method self setDeliveryInfo(CreateDeliveryInfo $deliveryInfo)
 * @method null|bool getLabelingByBol()
 * @method self setLabelingByBol(bool $labelingByBol)
 * @method null|int getNumberOfLoadCarriers()
 * @method null|CreatePickupAppointment getPickupAppointment()
 * @method self setPickupAppointment(CreatePickupAppointment $pickupAppointment)
 * @method CreateReplenishmentLine[] getLines()
 */
final class CreateReplenishmentRequest extends AModel
{
    /**
     * Custom user reference for this replenishment. Must contain at least 1 digit and only upper case characters
     * allowed.
     * @var string
     */
    protected string $reference;

    protected ?CreateDeliveryInfo $deliveryInfo = null;

    /**
     * Indicates whether the replenishment will be labeled by bol.com or not.
     * @var bool
     */
    protected bool $labelingByBol;

    /**
     * The number of parcels in this replenishment.
     * @var int
     */
    protected int $numberOfLoadCarriers;

    protected ?CreatePickupAppointment $pickupAppointment = null;

    /** @var CreateReplenishmentLine[] */
    protected array $lines = [];

    public function setNumberOfLoadCarriers(int $numberOfLoadCarriers): self
    {
        $this->_checkIntegerBounds($numberOfLoadCarriers, 1, 20);
        $this->numberOfLoadCarriers = $numberOfLoadCarriers;
        return $this;
    }

    /**
     * @param CreateReplenishmentLine[] $lines
     *
     * @return $this
     */
    public function setLines(array $lines): self
    {
        $this->_checkIfPureArray($lines, CreateReplenishmentLine::class);
        $this->_checkArrayBounds($lines, 1, 9999);
        $this->lines = $lines;
        return $this;
    }
}
