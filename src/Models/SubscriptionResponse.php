<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getId()
 * @method self setId(int $id)
 * @method null|array getResources()
 * @method self setResources(array $resources)
 * @method null|string getUrl()
 * @method self setUrl(string $url)
 */
final class SubscriptionResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * A unique identifier for the subscription
	 * @var int
	 */
	protected int $id;

	/**
	 * Type of event
	 * @var array
	 */
	protected array $resources = [];

	/**
	 * URL to receive this WebHook notification
	 * @var string
	 */
	protected string $url;
}
