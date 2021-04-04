<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getCountryCode()
 * @method self setCountryCode(string $countryCode)
 * @method null|float getValue()
 * @method self setValue(float $value)
 */
final class OfferInsightsCountry extends AModel
{
    /**
     * Countries in which this offer is currently on sale in the webshop, in ISO-3166-1
     * format.
     * @var string
     */
    protected string $countryCode;

    /**
     * The total value of offer insight.
     * @var float
     */
    protected float $value;
}
