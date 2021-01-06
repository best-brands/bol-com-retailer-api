<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getDeliveryOptions()
 */
final class DeliveryOptionsResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var DeliveryOption[] */
	protected array $deliveryOptions = [];


	public function setDeliveryOptions(array $deliveryOptions): self
	{
		$this->_checkIfPureArray($deliveryOptions, \HarmSmits\BolComClient\Models\DeliveryOption::class);
		$this->deliveryOptions = $deliveryOptions;
		return $this;
	}
}
