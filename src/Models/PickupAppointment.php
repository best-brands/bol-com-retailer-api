<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|string getCommentToTransporter()
 * @method self setCommentToTransporter(string $commentToTransporter)
 * @method null|Address getAddress()
 * @method self setAddress(Address $address)
 * @method null|ReplenishmentPickupTimeSlot getPickupTimeSlot()
 * @method self setPickupTimeSlot(ReplenishmentPickupTimeSlot $pickupTimeSlot)
 * @method null|DateTime getPickupDateTime()
 * @method null|string getCancellationReason()
 */
final class PickupAppointment extends AModel
{
    const CANCELLATION_REASON_UNKNOWN_ADDRESS = 'UNKNOWN_ADDRESS';
    const CANCELLATION_REASON_NOT_READY = 'NOT_READY';
    const CANCELLATION_REASON_NO_LABEL = 'NO_LABEL';
    const CANCELLATION_REASON_WRONG_PACKAGE = 'WRONG_PACKAGE';
    const CANCELLATION_REASON_NOT_AT_HOME = 'NOT_AT_HOME';
    const CANCELLATION_REASON_OTHER_REASON = 'OTHER_REASON';
    const CANCELLATION_REASON_REQUEST_FROM_RETAILER = 'REQUEST_FROM_RETAILER';

    /**
     * A comment to the transporter regarding the pickup appointment.
     * @var string
     */
    protected ?string $commentToTransporter = null;

    protected Address $address;

    protected ReplenishmentPickupTimeSlot $pickupTimeSlot;

    /**
     * The date and time in ISO 8601 format when this replenishment was picked up by
     * the transporter.
     * @var DateTime
     */
    protected ?DateTime $pickupDateTime = null;

    /**
     * In case of a pickup cancellation this field indicates the reason for cancelling
     * this pickup.
     * @var string
     */
    protected ?string $cancellationReason = null;

    /**
     * @param DateTime|string|int $pickupDateTime
     *
     * @return $this
     */
    public function setPickupDateTime($pickupDateTime): self
    {
        $pickupDateTime       = $this->_parseDate($pickupDateTime);
        $this->pickupDateTime = $pickupDateTime;
        return $this;
    }

    public function setCancellationReason(string $cancellationReason): self
    {
        $this->_checkEnumBounds($cancellationReason, [
            "UNKNOWN_ADDRESS",
            "NOT_READY",
            "NO_LABEL",
            "WRONG_PACKAGE",
            "NOT_AT_HOME",
            "OTHER_REASON",
            "REQUEST_FROM_RETAILER",
        ]);
        $this->cancellationReason = $cancellationReason;
        return $this;
    }
}
