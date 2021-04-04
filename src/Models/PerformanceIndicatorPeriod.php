<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getWeek()
 * @method self setWeek(string $week)
 * @method null|string getYear()
 * @method self setYear(string $year)
 */
final class PerformanceIndicatorPeriod extends AModel
{
    /**
     * Week number in the ISO-8601 standard.
     * @var string
     */
    protected string $week;

    /**
     * Year number in the ISO-8601 standard.
     * @var string
     */
    protected string $year;
}
