<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getFromDateTime()
 * @method self setFromDateTime(string $fromDateTime)
 * @method null|string getUntilDateTime()
 * @method self setUntilDateTime(string $untilDateTime)
 */
final class CreatePickupTimeSlot extends AModel
{
    // TODO verify types

    /**
     * The selected start date and time for the replenishment pickup appointment. In ISO 8601 format.
     * @var string
     */
    protected string $fromDateTime;

    /**
     * The selected end date and time for the replenishment pickup appointment. In ISO 8601 format.
     * @var string
     */
    protected string $untilDateTime;
}
