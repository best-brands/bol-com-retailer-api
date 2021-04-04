<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getDay()
 * @method self setDay(string $day)
 * @method null|string getWeek()
 * @method self setWeek(string $week)
 * @method null|string getMonth()
 * @method self setMonth(string $month)
 * @method null|string getYear()
 * @method self setYear(string $year)
 */
final class SearchTermsPeriod extends AModel
{
    /**
     * Day number in the ISO-8601 standard.
     * @var string
     */
    protected ?string $day = null;

    /**
     * Week number in the ISO-8601 standard.
     * @var string
     */
    protected ?string $week = null;

    /**
     * Month number in the ISO-8601 standard.
     * @var string
     */
    protected ?string $month = null;

    /**
     * Year number in the ISO-8601 standard.
     * @var string
     */
    protected ?string $year = null;
}
