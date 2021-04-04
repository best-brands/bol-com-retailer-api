<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method BundlePrice[] getBundlePrices()
 */
final class Pricing extends AModel
{
    /**
     * A set of prices (containing a quantity and selling price) that apply to this offer.
     * @var BundlePrice[]
     */
    protected array $bundlePrices = [];

    /**
     * @param BundlePrice[] $bundlePrices
     *
     * @return $this
     */
    public function setBundlePrices(array $bundlePrices): self
    {
        $this->_checkIfPureArray($bundlePrices, BundlePrice::class);
        $this->_checkArrayBounds($bundlePrices, 1, 4);
        $this->bundlePrices = $bundlePrices;
        return $this;
    }
}
