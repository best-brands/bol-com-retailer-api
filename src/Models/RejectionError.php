<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getCode()
 * @method self setCode(int $code)
 * @method null|string getMessage()
 * @method self setMessage(string $message)
 */
final class RejectionError extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The rejection error code.
	 * @var int
	 */
	protected ?int $code = null;

	/**
	 * The rejection error message explains why the value was rejected.
	 * @var string
	 */
	protected ?string $message = null;
}
