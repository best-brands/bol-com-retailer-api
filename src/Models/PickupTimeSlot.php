<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|DateTime getFromDateTime()
 * @method null|DateTime getUntilDateTime()
 */
final class PickupTimeSlot extends AModel
{
    /**
     * The available start date and time for the pickup appointment. In ISO 8601
     * format.
     * @var DateTime
     */
    protected DateTime $fromDateTime;

    /**
     * The available end date and time for the pickup appointment. In ISO 8601 format.
     * @var DateTime
     */
    protected DateTime $untilDateTime;

    /**
     * @param DateTime|string|int $fromDateTime
     *
     * @return $this
     */
    public function setFromDateTime($fromDateTime): self
    {
        $fromDateTime       = $this->_parseDate($fromDateTime);
        $this->fromDateTime = $fromDateTime;
        return $this;
    }

    /**
     * @param DateTime|string|int $untilDateTime
     *
     * @return $this
     */
    public function setUntilDateTime($untilDateTime): self
    {
        $untilDateTime       = $this->_parseDate($untilDateTime);
        $this->untilDateTime = $untilDateTime;
        return $this;
    }
}
