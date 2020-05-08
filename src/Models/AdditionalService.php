<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class AdditionalService extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * An additional service type that the customer selected when purchasing this order
	 * item.
	 * @var string
	 */
	private ?string $serviceType = null;


	public function getServiceType(): ?string
	{
		return $this->serviceType;
	}


	public function setServiceType(string $serviceType)
	{
		$this->serviceType = $serviceType;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'serviceType' => $this->getServiceType(),
		);
	}
}
