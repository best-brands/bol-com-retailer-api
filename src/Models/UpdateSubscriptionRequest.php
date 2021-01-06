<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getResources()
 * @method self setResources(array $resources)
 * @method null|string getUrl()
 * @method self setUrl(string $url)
 */
final class UpdateSubscriptionRequest extends \HarmSmits\BolComClient\Models\AModel
{
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
