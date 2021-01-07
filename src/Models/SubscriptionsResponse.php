<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method SubscriptionResponse[] getSubscriptions()
 */
final class SubscriptionsResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var SubscriptionResponse[] */
	protected array $subscriptions = [];


    /**
     * @param SubscriptionResponse[] $subscriptions
     *
     * @return $this
     */
	public function setSubscriptions(array $subscriptions): self
	{
		$this->_checkIfPureArray($subscriptions, \HarmSmits\BolComClient\Models\SubscriptionResponse::class);
		$this->subscriptions = $subscriptions;
		return $this;
	}
}
