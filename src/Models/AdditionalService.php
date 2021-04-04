<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getServiceType()
 * @method self setServiceType(string $serviceType)
 */
final class AdditionalService extends AModel
{
    /**
     * An additional service type that the customer selected when purchasing this order item.
     * @var string
     */
    protected ?string $serviceType = null;
}
