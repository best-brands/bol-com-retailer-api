<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getRel()
 * @method self setRel(string $rel)
 * @method null|string getHref()
 * @method self setHref(string $href)
 * @method null|string getMethod()
 * @method self setMethod(string $method)
 */
final class Link extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var string */
	protected ?string $rel = null;

	/** @var string */
	protected ?string $href = null;

	/**
	 * HTTP method
	 * @var string
	 */
	protected ?string $method = null;
}
