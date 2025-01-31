<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getTransporterCode()
 * @method self setTransporterCode(string $transporterCode)
 * @method null|string getTrackAndTrace()
 * @method self setTrackAndTrace(string $trackAndTrace)
 */
final class TransportInstruction extends AModel
{
    /**
     * Specify the transporter that will carry out the shipment.
     * @var string
     */
    protected ?string $transporterCode = null;

    /**
     * The track and trace code that is associated with this transport.
     * @var string
     */
    protected ?string $trackAndTrace = null;
}
