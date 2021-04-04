<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|int getCode()
 * @method self setCode(int $code)
 * @method null|string getMessage()
 * @method self setMessage(string $message)
 */
final class RejectionError extends AModel
{
	/**
	 * The rejection error code.
	 * @var int
	 */
	protected int $code;

	/**
	 * The rejection error message explains why the value was rejected.
	 * @var string
	 */
	protected string $message;
}
