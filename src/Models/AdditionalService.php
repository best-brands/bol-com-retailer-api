<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getServiceType()
 * @method self setServiceType(string $serviceType)
 */
final class AdditionalService extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * An additional service type that the customer selected when purchasing this order
	 * item.
	 * @var string
	 */
	protected ?string $serviceType = null;
}
