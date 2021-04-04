<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getSalutation()
 * @method null|string getFirstName()
 * @method self setFirstName(string $firstName)
 * @method null|string getSurname()
 * @method self setSurname(string $surname)
 * @method null|string getStreetName()
 * @method self setStreetName(string $streetName)
 * @method null|string getHouseNumber()
 * @method self setHouseNumber(string $houseNumber)
 * @method null|string getHouseNumberExtension()
 * @method self setHouseNumberExtension(string $houseNumberExtension)
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
 * @method null|string getCompany()
 * @method self setCompany(string $company)
 * @method null|string getVatNumber()
 * @method self setVatNumber(string $vatNumber)
 * @method null|string getKvkNumber()
 * @method self setKvkNumber(string $kvkNumber)
 * @method null|string getOrderReference()
 * @method self setOrderReference(string $orderReference)
 */
final class BillingDetails extends AModel
{
    const SALUTATION_MALE = 'MALE';
    const SALUTATION_FEMALE = 'FEMALE';
    const SALUTATION_UNKNOWN = 'UNKNOWN';

    /**
     * The salutation of the customer.
     * @var string
     */
    protected ?string $salutation = null;

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
    protected ?string $houseNumberExtension = null;

    /**
     * Additional information related to the address that helps in delivering the
     * package.
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
     * The company name.
     * @var string
     */
    protected ?string $company = null;

    /**
     * The Value Added Tax (VAT) / BTW number for business sellers situated in the
     * Netherlands.
     * @var string
     */
    protected ?string $vatNumber = null;

    /**
     * The Kamer van Koophandel (kvk) number for organizations situated in the
     * Netherlands or ondernemingsnummer for organizations situated in Belgium.
     * @var string
     */
    protected ?string $kvkNumber = null;

    /**
     * The order reference specified by the customer when ordering a product.
     * @var string
     */
    protected ?string $orderReference = null;

    public function setSalutation(string $salutation): self
    {
        $this->_checkEnumBounds($salutation, [
            "MALE",
            "FEMALE",
            "UNKNOWN",
        ]);
        $this->salutation = $salutation;
        return $this;
    }
}
