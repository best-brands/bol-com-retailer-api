<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getExpectedDeliveryDate()
 * @method self setExpectedDeliveryDate(string $expectedDeliveryDate)
 * @method null|string getTransporterCode()
 * @method null|DestinationWarehouse getDestinationWarehouse()
 * @method self setDestinationWarehouse(DestinationWarehouse $destinationWarehouse)
 */
final class DeliveryInformation extends AModel
{
    const TRANSPORTER_CODE_POSTNL = 'POSTNL';
    const TRANSPORTER_CODE_DHL = 'DHL';
    const TRANSPORTER_CODE_DPD = 'DPD';
    const TRANSPORTER_CODE_GLS = 'GLS';
    const TRANSPORTER_CODE_UPS = 'UPS';
    const TRANSPORTER_CODE_OTHER = 'OTHER';

    /**
     * The expected delivery date of the shipment at the bol.com warehouse in ISO 8601 format.
     * @var string
     */
    protected string $expectedDeliveryDate;
    // TODO Verify the type.

    /**
     * The transporter that will pickup this replenishment.
     * @var string
     */
    protected string $transporterCode;

    protected DestinationWarehouse $destinationWarehouse;

    public function setTransporterCode(string $transporterCode): self
    {
        $this->_checkEnumBounds($transporterCode, [
            "POSTNL",
            "DHL",
            "DPD",
            "GLS",
            "UPS",
            "OTHER",
        ]);
        $this->transporterCode = $transporterCode;
        return $this;
    }
}
