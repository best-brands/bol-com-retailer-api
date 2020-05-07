<?php

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
