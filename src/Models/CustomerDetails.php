<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class CustomerDetails extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The name of Pick Up Point location this order needs to be shipped to.
	 * @var string
	 */
	private ?string $pickUpPointName = null;

	/**
	 * The salutation of the customer (01 = MALE, 02 = FEMALE, 03 = UNKNOWN)
	 * @var string
	 */
	private ?string $salutationCode = null;

	/**
	 * The first name of the customer.
	 * @var string
	 */
	private ?string $firstName = null;

	/**
	 * The surname of the customer.
	 * @var string
	 */
	private ?string $surname = null;

	/**
	 * The street name.
	 * @var string
	 */
	private ?string $streetName = null;

	/**
	 * The house number.
	 * @var string
	 */
	private ?string $houseNumber = null;

	/**
	 * The extension on the house number.
	 * @var string
	 */
	private ?string $houseNumberExtended = null;

	/**
	 * The supplement belonging to the address.
	 * @var string
	 */
	private ?string $addressSupplement = null;

	/**
	 * Additional information related to the address that helps in delivering the
	 * package.
	 * @var string
	 */
	private ?string $extraAddressInformation = null;

	/**
	 * The ZIP code.
	 * @var string
	 */
	private ?string $zipCode = null;

	/**
	 * The name of the city.
	 * @var string
	 */
	private ?string $city = null;

	/**
	 * The country code.
	 * @var string
	 */
	private ?string $countryCode = null;

	/**
	 * A scrambled email address that can be used to contact the customer.
	 * @var string
	 */
	private ?string $email = null;

	/**
	 * The company name.
	 * @var string
	 */
	private ?string $company = null;

	/**
	 * The VAT number.
	 * @var string
	 */
	private ?string $vatNumber = null;

	/**
	 * The chamber of commerce number of the account that placed the order.
	 * @var string
	 */
	private ?string $chamberOfCommerceNumber = null;

	/**
	 * The order reference specified by the customer when ordering a product.
	 * @var string
	 */
	private ?string $orderReference = null;

	/**
	 * The delivery phone number of the customer. Filled in case the order requires an
	 * appointment for delivering the goods.
	 * @var string
	 */
	private ?string $deliveryPhoneNumber = null;


	public function getPickUpPointName(): ?string
	{
		return $this->pickUpPointName;
	}


	public function setPickUpPointName(string $pickUpPointName)
	{
		$this->pickUpPointName = $pickUpPointName;
		return $this;
	}


	public function getSalutationCode(): ?string
	{
		return $this->salutationCode;
	}


	public function setSalutationCode(string $salutationCode)
	{
		$this->salutationCode = $salutationCode;
		return $this;
	}


	public function getFirstName(): ?string
	{
		return $this->firstName;
	}


	public function setFirstName(string $firstName)
	{
		$this->firstName = $firstName;
		return $this;
	}


	public function getSurname(): ?string
	{
		return $this->surname;
	}


	public function setSurname(string $surname)
	{
		$this->surname = $surname;
		return $this;
	}


	public function getStreetName(): ?string
	{
		return $this->streetName;
	}


	public function setStreetName(string $streetName)
	{
		$this->streetName = $streetName;
		return $this;
	}


	public function getHouseNumber(): ?string
	{
		return $this->houseNumber;
	}


	public function setHouseNumber(string $houseNumber)
	{
		$this->houseNumber = $houseNumber;
		return $this;
	}


	public function getHouseNumberExtended(): ?string
	{
		return $this->houseNumberExtended;
	}


	public function setHouseNumberExtended(string $houseNumberExtended)
	{
		$this->houseNumberExtended = $houseNumberExtended;
		return $this;
	}


	public function getAddressSupplement(): ?string
	{
		return $this->addressSupplement;
	}


	public function setAddressSupplement(string $addressSupplement)
	{
		$this->addressSupplement = $addressSupplement;
		return $this;
	}


	public function getExtraAddressInformation(): ?string
	{
		return $this->extraAddressInformation;
	}


	public function setExtraAddressInformation(string $extraAddressInformation)
	{
		$this->extraAddressInformation = $extraAddressInformation;
		return $this;
	}


	public function getZipCode(): ?string
	{
		return $this->zipCode;
	}


	public function setZipCode(string $zipCode)
	{
		$this->zipCode = $zipCode;
		return $this;
	}


	public function getCity(): ?string
	{
		return $this->city;
	}


	public function setCity(string $city)
	{
		$this->city = $city;
		return $this;
	}


	public function getCountryCode(): ?string
	{
		return $this->countryCode;
	}


	public function setCountryCode(string $countryCode)
	{
		$this->countryCode = $countryCode;
		return $this;
	}


	public function getEmail(): ?string
	{
		return $this->email;
	}


	public function setEmail(string $email)
	{
		$this->email = $email;
		return $this;
	}


	public function getCompany(): ?string
	{
		return $this->company;
	}


	public function setCompany(string $company)
	{
		$this->company = $company;
		return $this;
	}


	public function getVatNumber(): ?string
	{
		return $this->vatNumber;
	}


	public function setVatNumber(string $vatNumber)
	{
		$this->vatNumber = $vatNumber;
		return $this;
	}


	public function getChamberOfCommerceNumber(): ?string
	{
		return $this->chamberOfCommerceNumber;
	}


	public function setChamberOfCommerceNumber(string $chamberOfCommerceNumber)
	{
		$this->chamberOfCommerceNumber = $chamberOfCommerceNumber;
		return $this;
	}


	public function getOrderReference(): ?string
	{
		return $this->orderReference;
	}


	public function setOrderReference(string $orderReference)
	{
		$this->orderReference = $orderReference;
		return $this;
	}


	public function getDeliveryPhoneNumber(): ?string
	{
		return $this->deliveryPhoneNumber;
	}


	public function setDeliveryPhoneNumber(string $deliveryPhoneNumber)
	{
		$this->deliveryPhoneNumber = $deliveryPhoneNumber;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'pickUpPointName' => $this->getPickUpPointName(),
			'salutationCode' => $this->getSalutationCode(),
			'firstName' => $this->getFirstName(),
			'surname' => $this->getSurname(),
			'streetName' => $this->getStreetName(),
			'houseNumber' => $this->getHouseNumber(),
			'houseNumberExtended' => $this->getHouseNumberExtended(),
			'addressSupplement' => $this->getAddressSupplement(),
			'extraAddressInformation' => $this->getExtraAddressInformation(),
			'zipCode' => $this->getZipCode(),
			'city' => $this->getCity(),
			'countryCode' => $this->getCountryCode(),
			'email' => $this->getEmail(),
			'company' => $this->getCompany(),
			'vatNumber' => $this->getVatNumber(),
			'chamberOfCommerceNumber' => $this->getChamberOfCommerceNumber(),
			'orderReference' => $this->getOrderReference(),
			'deliveryPhoneNumber' => $this->getDeliveryPhoneNumber(),
		);
	}
}
