<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getSalutationCode()
 * @method self setSalutationCode(string $salutationCode)
 * @method null|string getFirstName()
 * @method self setFirstName(string $firstName)
 * @method null|string getSurname()
 * @method self setSurname(string $surname)
 * @method null|string getStreetName()
 * @method self setStreetName(string $streetName)
 * @method null|string getHouseNumber()
 * @method self setHouseNumber(string $houseNumber)
 * @method null|string getHouseNumberExtended()
 * @method self setHouseNumberExtended(string $houseNumberExtended)
 * @method null|string getExtraAddressInformation()
 * @method self setExtraAddressInformation(string $extraAddressInformation)
 * @method null|string getZipCode()
 * @method self setZipCode(string $zipCode)
 * @method null|string getCity()
 * @method self setCity(string $city)
 * @method null|string getCountryCode()
 * @method self setCountryCode(string $countryCode)
 * @method null|string getEmail()
 * @method self setEmail(string $email)
 * @method null|string getDeliveryPhoneNumber()
 * @method self setDeliveryPhoneNumber(string $deliveryPhoneNumber)
 * @method null|string getCompany()
 * @method self setCompany(string $company)
 * @method null|string getVatNumber()
 * @method self setVatNumber(string $vatNumber)
 */
final class CustomerDetails extends AModel
{
    /**
     * The salutation of the customer.
     * @var string
     */
    protected ?string $salutationCode = null;

    /**
     * The first name of the customer.
     * @var string
     */
    protected ?string $firstName = null;

    /**
     * The surname of the customer.
     * @var string
     */
    protected ?string $surname = null;

    /**
     * The street name.
     * @var string
     */
    protected ?string $streetName = null;

    /**
     * The house number.
     * @var string
     */
    protected ?string $houseNumber = null;

    /**
     * The extension on the house number.
     * @var string
     */
    protected ?string $houseNumberExtended = null;

    /**
     * Additional information related to the address that helps in delivering the package.
     * @var string
     */
    protected ?string $extraAddressInformation = null;

    /**
     * The ZIP code in '1234AB' format for NL orders and '0000' format for BE orders.
     * @var string
     */
    protected ?string $zipCode = null;

    /**
     * The name of the city.
     * @var string
     */
    protected ?string $city = null;

    /**
     * The country code.
     * @var string
     */
    protected ?string $countryCode = null;

    /**
     * A scrambled email address that can be used to contact the customer.
     * @var string
     */
    protected ?string $email = null;

    /**
     * The delivery phone number of the customer. Filled in case the order requires an appointment for delivering the
     * goods.
     * @var string
     */
    protected ?string $deliveryPhoneNumber = null;

    /**
     * The company name.
     * @var string
     */
    protected ?string $company = null;

    /**
     * The Value Added Tax (VAT) / BTW number for business sellers situated in the Netherlands.
     * @var string
     */
    protected ?string $vatNumber = null;
}
