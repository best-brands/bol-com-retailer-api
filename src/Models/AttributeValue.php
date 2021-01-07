<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method string getValue()
 * @method self setValue(string $value)
 * @method null|string getUnitId()
 * @method self setUnitId(string $unitId)
 */
final class AttributeValue extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The value of the attribute.
	 * @var string
	 */
	protected string $value;

	/**
	 * The unit identifier of the attribute.
	 * @var string
	 */
	protected ?string $unitId = null;
}
