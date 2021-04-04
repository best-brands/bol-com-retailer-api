<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 */
final class ReducedReplenishmentLines extends AModel
{
    /**
     * The EAN number associated with this product.
     * @var string
     */
    protected string $ean;
}
