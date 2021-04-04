<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method DeliveryOption[] getDeliveryOptions()
 */
final class DeliveryOptionsResponse extends AModel
{
    /** @var DeliveryOption[] */
    protected array $deliveryOptions = [];

    /**
     * @param DeliveryOption[] $deliveryOptions
     *
     * @return $this
     */
    public function setDeliveryOptions(array $deliveryOptions): self
    {
        $this->_checkIfPureArray($deliveryOptions, DeliveryOption::class);
        $this->deliveryOptions = $deliveryOptions;
        return $this;
    }
}
