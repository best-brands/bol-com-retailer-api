<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getName()
 * @method self setName(string $name)
 * @method null|string getCode()
 * @method self setCode(string $code)
 */
final class Transporter extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The transporter name.
	 * @var string
	 */
	protected string $name;

	/**
	 * The transporter code.
	 * @var string
	 */
	protected string $code;
}
