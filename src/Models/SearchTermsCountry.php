<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getCountryCode()
 * @method self setCountryCode(string $countryCode)
 * @method null|int getValue()
 * @method self setValue(int $value)
 */
final class SearchTermsCountry extends AModel
{
    /**
     * Countries in which this offer is currently on sale in the webshop in ISO-3166-1
     * format.
     * @var string
     */
    protected string $countryCode;

    /**
     * The number of customer visits on the search page.
     * @var int
     */
    protected int $value;
}
