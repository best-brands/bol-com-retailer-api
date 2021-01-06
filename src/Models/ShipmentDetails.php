<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getPickUpPointName()
 * @method self setPickUpPointName(string $pickUpPointName)
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
 * @method null|string getDeliveryPhoneNumber()
 * @method self setDeliveryPhoneNumber(string $deliveryPhoneNumber)
 * @method null|string getLanguage()
 */
final class ShipmentDetails extends \HarmSmits\BolComClient\Models\AModel
{
	const SALUTATION_MALE = 'MALE';
	const SALUTATION_FEMALE = 'FEMALE';
	const SALUTATION_UNKNOWN = 'UNKNOWN';
	const LANGUAGE_nl = 'nl';
	const LANGUAGE_nl_BE = 'nl-BE';
	const LANGUAGE_fr = 'fr';
	const LANGUAGE_fr_BE = 'fr-BE';

	/**
	 * The name of Pick Up Point location this order needs to be shipped to.
	 * @var string
	 */
	protected ?string $pickUpPointName = null;

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
	 * The delivery phone number of the customer. Filled in case the order requires an
	 * appointment for delivering the goods.
	 * @var string
	 */
	protected ?string $deliveryPhoneNumber = null;

	/**
	 * The language of the customer in case of contact.
	 * @var string
	 */
	protected ?string $language = null;


	public function setSalutation(string $salutation): self
	{
		$this->_checkEnumBounds($salutation, [
			"MALE",
			"FEMALE",
			"UNKNOWN"
		]);
		$this->salutation = $salutation;
		return $this;
	}


	public function setLanguage(string $language): self
	{
		$this->_checkEnumBounds($language, [
			"nl",
			"nl-BE",
			"fr",
			"fr-BE"
		]);
		$this->language = $language;
		return $this;
	}
}
