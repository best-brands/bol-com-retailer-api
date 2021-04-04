<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getCode()
 * @method self setCode(string $code)
 * @method null|string getDescription()
 * @method self setDescription(string $description)
 */
final class NotPublishableReason extends AModel
{
    /**
     * Error code signalling that the offer is invalid.
     * @var string
     */
    protected string $code;

    /**
     * Error message describing the reason the offer is invalid.
     * @var string
     */
    protected string $description;
}
