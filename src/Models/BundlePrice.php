<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|int getQuantity()
 * @method null|float getUnitPrice()
 */
final class BundlePrice extends AModel
{
    /**
     * The minimum quantity a customer must order in order to receive discount. The element with value 1 must at
     * least be present. In case of using more elements, the respective quantities must be in increasing order.
     * @var int
     */
    protected int $quantity;

    /**
     * The price per single unit including VAT in case the customer orders at least the quantity provided. When using
     * more than 1 price, the respective prices must be in decreasing order using 2 decimal precision and dot separated.
     * @var float
     */
    protected float $unitPrice;

    public function setQuantity(int $quantity): self
    {
        $this->_checkIntegerBounds($quantity, 1, 24);
        $this->quantity = $quantity;
        return $this;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->_checkFloatBounds($unitPrice, 1, 9999);
        $this->unitPrice = $unitPrice;
        return $this;
    }
}
