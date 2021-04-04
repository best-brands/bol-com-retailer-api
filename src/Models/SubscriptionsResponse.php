<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method SubscriptionResponse[] getSubscriptions()
 */
final class SubscriptionsResponse extends AModel
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
        $this->_checkIfPureArray($subscriptions, SubscriptionResponse::class);
        $this->subscriptions = $subscriptions;
        return $this;
    }
}
