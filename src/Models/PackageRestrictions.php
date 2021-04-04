<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getMaxWeight()
 * @method self setMaxWeight(string $maxWeight)
 * @method null|string getMaxDimensions()
 * @method self setMaxDimensions(string $maxDimensions)
 */
final class PackageRestrictions extends AModel
{
    /**
     * The weight of a package.
     * @var string
     */
    protected ?string $maxWeight = null;

    /**
     * The dimensions of a package.
     * @var string
     */
    protected ?string $maxDimensions = null;
}
