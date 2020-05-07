<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class CountryCode extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Countries in which this offer is currently on sale in the webshop.
	 * @var string
	 */
	private ?string $countryCode = null;


	public function getCountryCode(): ?string
	{
		return $this->countryCode;
	}


	public function setCountryCode(string $countryCode)
	{
		$this->countryCode = $countryCode;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'countryCode' => $this->getCountryCode(),
		);
	}
}
