<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|int getTransportId()
 * @method self setTransportId(int $transportId)
 * @method null|string getTransporterCode()
 * @method self setTransporterCode(string $transporterCode)
 * @method null|string getTrackAndTrace()
 * @method self setTrackAndTrace(string $trackAndTrace)
 * @method null|string getShippingLabelId()
 * @method self setShippingLabelId(string $shippingLabelId)
 */
final class ShipmentTransport extends AModel
{
    /**
     * The transport id.
     * @var int
     */
    protected ?int $transportId = null;

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

    /**
     * The shipping label id.
     * @var string
     */
    protected ?string $shippingLabelId = null;
}
