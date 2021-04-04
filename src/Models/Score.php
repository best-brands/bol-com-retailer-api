<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|bool getConforms()
 * @method self setConforms(bool $conforms)
 * @method null|int getNumerator()
 * @method self setNumerator(int $numerator)
 * @method null|int getDenominator()
 * @method self setDenominator(int $denominator)
 * @method null|float getValue()
 * @method self setValue(float $value)
 * @method null|float getDistanceToNorm()
 * @method self setDistanceToNorm(float $distanceToNorm)
 */
final class Score extends AModel
{
    /**
     * Indicates whether the score conforms to the bol.com service norm or not.
     * @var bool
     */
    protected bool $conforms;

    /**
     * The top part of the fraction (above the line). This usually is the smaller number compared to the denominator.
     * @var int
     */
    protected int $numerator;

    /**
     * The lower part of the fraction (below the line). This usually is the larger number compared to the the numerator.
     * @var int
     */
    protected int $denominator;

    /**
     * The score for this measurement (denominator divided by the numerator).
     * @var float
     */
    protected float $value;

    /**
     * The difference between the score and the bol.com service norm.
     * @var float
     */
    protected float $distanceToNorm;
}
