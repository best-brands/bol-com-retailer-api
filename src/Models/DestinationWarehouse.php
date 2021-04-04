<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getStreetName()
 * @method self setStreetName(string $streetName)
 * @method null|string getHouseNumber()
 * @method self setHouseNumber(string $houseNumber)
 * @method null|string getHouseNumberExtension()
 * @method self setHouseNumberExtension(string $houseNumberExtension)
 * @method null|string getZipCode()
 * @method self setZipCode(string $zipCode)
 * @method null|string getCity()
 * @method self setCity(string $city)
 * @method null|string getCountryCode()
 * @method self setCountryCode(string $countryCode)
 * @method null|string getAttentionOf()
 * @method self setAttentionOf(string $attentionOf)
 */
final class DestinationWarehouse extends AModel
{
    /**
     * The street name of the pickup address.
     * @var string
     */
    protected string $streetName;

    /**
     * The house number of the pickup address.
     * @var string
     */
    protected string $houseNumber;

    /**
     * The extension of the house number.
     * @var string
     */
    protected string $houseNumberExtension;

    /**
     * The zip code in '1234AB' format for NL and '0000' for BE addresses.
     * @var string
     */
    protected string $zipCode;

    /**
     * The city of the pickup address.
     * @var string
     */
    protected string $city;

    /**
     * The ISO 3166-2 country code.
     * @var string
     */
    protected string $countryCode;

    /**
     * Name of the person responsible for this replenishment.
     * @var string
     */
    protected ?string $attentionOf = null;
}
