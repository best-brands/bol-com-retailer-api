<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getExpectedDeliveryDate()
 * @method self setExpectedDeliveryDate(string $expectedDeliveryDate)
 * @method null|string getTransporterCode()
 */
final class CreateDeliveryInfo extends AModel
{
    const TRANSPORTER_CODE_POSTNL = 'POSTNL';
    const TRANSPORTER_CODE_DHL = 'DHL';
    const TRANSPORTER_CODE_DPD = 'DPD';
    const TRANSPORTER_CODE_GLS = 'GLS';
    const TRANSPORTER_CODE_UPS = 'UPS';
    const TRANSPORTER_CODE_OTHER = 'OTHER';

    /**
     * The expected delivery date of the shipment at the bol.com warehouse. In ISO 8601 format.
     * @var string
     */
    protected string $expectedDeliveryDate;

    /**
     * The transporter code that correlates to the transport used for this replenishment.
     * @var string
     */
    protected string $transporterCode;

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
