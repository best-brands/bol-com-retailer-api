<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getId()
 * @method self setId(string $id)
 * @method null|array getResources()
 * @method self setResources(array $resources)
 * @method null|string getUrl()
 * @method self setUrl(string $url)
 */
final class SubscriptionResponse extends AModel
{
    /**
     * A unique identifier for the subscription.
     * @var string
     */
    protected string $id;

    /**
     * Type of event.
     * @var array
     */
    protected array $resources = [];

    /**
     * URL to receive this WebHook notification.
     * @var string
     */
    protected string $url;
}
