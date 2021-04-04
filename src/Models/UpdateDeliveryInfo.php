<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getExpectedDeliveryDate()
 * @method self setExpectedDeliveryDate(string $expectedDeliveryDate)
 */
final class UpdateDeliveryInfo extends AModel
{
    /**
     * The expected delivery date of the shipment at the bol.com warehouse. In ISO 8601 format.
     * @var string
     */
    protected ?string $expectedDeliveryDate = null;
}
