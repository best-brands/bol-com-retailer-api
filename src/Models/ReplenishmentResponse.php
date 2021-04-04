<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|string getReplenishmentId()
 * @method self setReplenishmentId(string $replenishmentId)
 * @method null|DateTime getCreationDateTime()
 * @method null|string getReference()
 * @method self setReference(string $reference)
 * @method null|bool getLabelingByBol()
 * @method self setLabelingByBol(bool $labelingByBol)
 * @method null|string getState()
 * @method null|DeliveryInformation getDeliveryInformation()
 * @method self setDeliveryInformation(DeliveryInformation $deliveryInformation)
 * @method null|PickupAppointment getPickupAppointment()
 * @method self setPickupAppointment(PickupAppointment $pickupAppointment)
 * @method null|int getNumberOfLoadCarriers()
 * @method self setNumberOfLoadCarriers(int $numberOfLoadCarriers)
 * @method LoadCarrier[] getLoadCarriers()
 * @method ReplenishmentLine[] getLines()
 * @method InvalidReplenishmentLine[] getInvalidLines()
 * @method StateTransition[] getStateTransitions()
 */
final class ReplenishmentResponse extends AModel
{
    const STATE_ANNOUNCED = 'ANNOUNCED';
    const STATE_IN_TRANSIT = 'IN_TRANSIT';
    const STATE_ARRIVED_AT_WH = 'ARRIVED_AT_WH';
    const STATE_IN_PROGRESS_AT_WH = 'IN_PROGRESS_AT_WH';
    const STATE_CANCELLED = 'CANCELLED';
    const STATE_DONE = 'DONE';

    /**
     * The unique identifier of the replenishment.
     * @var string
     */
    protected string $replenishmentId;

    /**
     * The date and time when this replenishment was created. In ISO 8601 format.
     * @var DateTime
     */
    protected DateTime $creationDateTime;

    /**
     * Custom user defined reference to identify the replenishment.
     * @var string
     */
    protected string $reference;

    /**
     * Indicates whether the replenishment will be labeled by bol.com or not.
     * @var bool
     */
    protected bool $labelingByBol;

    /**
     * Indicates the state of this replenishment order.
     * @var string
     */
    protected string $state;

    protected DeliveryInformation $deliveryInformation;

    protected ?PickupAppointment $pickupAppointment = null;

    /**
     * The number of load carriers in this shipment.
     * @var int
     */
    protected ?int $numberOfLoadCarriers = null;

    /** @var LoadCarrier[] */
    protected array $loadCarriers = [];

    /** @var ReplenishmentLine[] */
    protected array $lines = [];

    /** @var InvalidReplenishmentLine[] */
    protected array $invalidLines = [];

    /** @var StateTransition[] */
    protected array $stateTransitions = [];

    /**
     * @param DateTime|string|int $creationDateTime
     *
     * @return $this
     */
    public function setCreationDateTime($creationDateTime): self
    {
        $creationDateTime       = $this->_parseDate($creationDateTime);
        $this->creationDateTime = $creationDateTime;
        return $this;
    }

    public function setState(string $state): self
    {
        $this->_checkEnumBounds($state, [
            "ANNOUNCED",
            "IN_TRANSIT",
            "ARRIVED_AT_WH",
            "IN_PROGRESS_AT_WH",
            "CANCELLED",
            "DONE",
        ]);
        $this->state = $state;
        return $this;
    }

    /**
     * @param LoadCarrier[] $loadCarriers
     *
     * @return $this
     */
    public function setLoadCarriers(array $loadCarriers): self
    {
        $this->_checkIfPureArray($loadCarriers, LoadCarrier::class);
        $this->loadCarriers = $loadCarriers;
        return $this;
    }

    /**
     * @param ReplenishmentLine[] $lines
     *
     * @return $this
     */
    public function setLines(array $lines): self
    {
        $this->_checkIfPureArray($lines, ReplenishmentLine::class);
        $this->lines = $lines;
        return $this;
    }

    /**
     * @param InvalidReplenishmentLine[] $invalidLines
     *
     * @return $this
     */
    public function setInvalidLines(array $invalidLines): self
    {
        $this->_checkIfPureArray($invalidLines, InvalidReplenishmentLine::class);
        $this->invalidLines = $invalidLines;
        return $this;
    }

    /**
     * @param StateTransition[] $stateTransitions
     *
     * @return $this
     */
    public function setStateTransitions(array $stateTransitions): self
    {
        $this->_checkIfPureArray($stateTransitions, StateTransition::class);
        $this->stateTransitions = $stateTransitions;
        return $this;
    }
}
