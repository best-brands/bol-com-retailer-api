<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getSscc()
 * @method self setSscc(string $sscc)
 */
final class UpdateLoadCarrier extends AModel
{
    /**
     * The Serial Shipping Container Code (SSCC) for this load carrier.
     * @var string
     */
    protected ?string $sscc = null;
}
