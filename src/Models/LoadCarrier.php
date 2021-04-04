<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|string getSscc()
 * @method self setSscc(string $sscc)
 * @method null|string getTransportLabelTrackAndTrace()
 * @method self setTransportLabelTrackAndTrace(string $transportLabelTrackAndTrace)
 * @method null|string getTransportState()
 * @method null|DateTime getTransportStateUpdateDateTime()
 */
final class LoadCarrier extends AModel
{
    const TRANSPORT_STATE_ANNOUNCED = 'ANNOUNCED';
    const TRANSPORT_STATE_PICKED_UP = 'PICKED_UP';
    const TRANSPORT_STATE_UNDERWAY = 'UNDERWAY';
    const TRANSPORT_STATE_DELAYED = 'DELAYED';
    const TRANSPORT_STATE_ARRIVED = 'ARRIVED';
    const TRANSPORT_STATE_ERROR = 'ERROR';

    /**
     * The Serial Shipping Container Code (SSCC) for this load carrier.
     * @var string
     */
    protected ?string $sscc = null;

    /**
     * The track and trace code for this load carrier.
     * @var string
     */
    protected ?string $transportLabelTrackAndTrace = null;

    /**
     * The current state of the transport for this load carrier.
     * @var string
     */
    protected string $transportState;

    /**
     * The date and time in ISO 8601 format when the latest update for this transport
     * was received.
     * @var DateTime
     */
    protected DateTime $transportStateUpdateDateTime;

    public function setTransportState(string $transportState): self
    {
        $this->_checkEnumBounds($transportState, [
            "ANNOUNCED",
            "PICKED_UP",
            "UNDERWAY",
            "DELAYED",
            "ARRIVED",
            "ERROR",
        ]);
        $this->transportState = $transportState;
        return $this;
    }

    /**
     * @param DateTime|string|int $transportStateUpdateDateTime
     *
     * @return $this
     */
    public function setTransportStateUpdateDateTime($transportStateUpdateDateTime): self
    {
        $transportStateUpdateDateTime       = $this->_parseDate($transportStateUpdateDateTime);
        $this->transportStateUpdateDateTime = $transportStateUpdateDateTime;
        return $this;
    }
}
