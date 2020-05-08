<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
