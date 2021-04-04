<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getName()
 * @method self setName(string $name)
 * @method null|string getReason()
 * @method self setReason(string $reason)
 */
final class Violation extends AModel
{
    /**
     * Describes the origin of the error, for instance a field or query parameter validation error.
     * @var string
     */
    protected ?string $name = null;

    /**
     * Detailed description of the validation error that caused the problem.
     * @var string
     */
    protected ?string $reason = null;
}
