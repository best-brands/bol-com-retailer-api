<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|CreateAddress getAddress()
 * @method self setAddress(CreateAddress $address)
 * @method null|CreatePickupTimeSlot getPickupTimeSlot()
 * @method self setPickupTimeSlot(CreatePickupTimeSlot $pickupTimeSlot)
 * @method null|string getCommentToTransporter()
 * @method self setCommentToTransporter(string $commentToTransporter)
 */
final class CreatePickupAppointment extends AModel
{
    protected CreateAddress $address;

    protected CreatePickupTimeSlot $pickupTimeSlot;

    /**
     * A comment to the transporter regarding the pickup appointment.
     * @var string
     */
    protected ?string $commentToTransporter = null;
}
