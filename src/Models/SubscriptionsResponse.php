<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getSubscriptions()
 */
final class SubscriptionsResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var SubscriptionResponse[] */
	protected array $subscriptions = [];


	public function setSubscriptions(array $subscriptions): self
	{
		$this->_checkIfPureArray($subscriptions, \HarmSmits\BolComClient\Models\SubscriptionResponse::class);
		$this->subscriptions = $subscriptions;
		return $this;
	}
}
