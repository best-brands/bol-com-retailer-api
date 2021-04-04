<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getMethod()
 * @method null|string getDistributionParty()
 * @method null|string getLatestDeliveryDate()
 * @method self setLatestDeliveryDate(string $latestDeliveryDate)
 */
final class ShipmentFulfilment extends AModel
{
    const METHOD_FBR = 'FBR';
    const METHOD_FBB = 'FBB';
    const DISTRIBUTION_PARTY_RETAILER = 'RETAILER';
    const DISTRIBUTION_PARTY_BOL = 'BOL';

    /**
     * Specifies whether this shipment has been fulfilled by the retailer (FBR) or fulfilled by bol.com (FBB).
     * Defaults to FBR.
     * @var string
     */
    protected ?string $method = null;

    /**
     * The party that manages the distribution, either bol.com or the retailer itself.
     * @var string
     */
    protected ?string $distributionParty = null;

    /**
     * The ultimate delivery date at which this order must be delivered at the customer's shipping address. This
     * field is empty in case the exactDeliveryDate is filled.
     * @var string
     */
    protected ?string $latestDeliveryDate = null;

    public function setMethod(string $method): self
    {
        $this->_checkEnumBounds($method, [
            "FBR",
            "FBB",
        ]);
        $this->method = $method;
        return $this;
    }

    public function setDistributionParty(string $distributionParty): self
    {
        $this->_checkEnumBounds($distributionParty, [
            "RETAILER",
            "BOL",
        ]);
        $this->distributionParty = $distributionParty;
        return $this;
    }
}
