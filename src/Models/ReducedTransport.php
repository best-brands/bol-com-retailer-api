<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getTransportId()
 * @method self setTransportId(int $transportId)
 */
final class ReducedTransport extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The transport id.
	 * @var int
	 */
	protected ?int $transportId = null;
}
