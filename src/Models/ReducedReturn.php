<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|string getReturnId()
 * @method self setReturnId(string $returnId)
 * @method null|DateTime getRegistrationDateTime()
 * @method null|string getFulfilmentMethod()
 * @method self setFulfilmentMethod(string $fulfilmentMethod)
 * @method ReducedReturnItem[] getReturnItems()
 */
final class ReducedReturn extends AModel
{
    /**
     * Unique identifier for a return.
     * @var string
     */
    protected string $returnId;

    /**
     * The date and time in ISO 8601 format when this return was registered.
     * @var DateTime
     */
    protected DateTime $registrationDateTime;

    /**
     * Specifies whether this shipment has been fulfilled by the retailer (FBR) or fulfilled by bol.com (FBB).
     * Defaults to FBR.
     * @var string
     */
    protected string $fulfilmentMethod;

    /** @var ReducedReturnItem[] */
    protected array $returnItems = [];

    /**
     * @param DateTime|string|int $registrationDateTime
     *
     * @return $this
     */
    public function setRegistrationDateTime($registrationDateTime): self
    {
        $registrationDateTime       = $this->_parseDate($registrationDateTime);
        $this->registrationDateTime = $registrationDateTime;
        return $this;
    }

    /**
     * @param ReducedReturnItem[] $returnItems
     *
     * @return $this
     */
    public function setReturnItems(array $returnItems): self
    {
        $this->_checkIfPureArray($returnItems, ReducedReturnItem::class);
        $this->returnItems = $returnItems;
        return $this;
    }
}
