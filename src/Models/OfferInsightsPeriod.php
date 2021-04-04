<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|int getDay()
 * @method self setDay(int $day)
 * @method null|int getWeek()
 * @method self setWeek(int $week)
 * @method null|int getMonth()
 * @method self setMonth(int $month)
 * @method null|int getYear()
 * @method self setYear(int $year)
 */
final class OfferInsightsPeriod extends AModel
{
    /**
     * Day of the month.
     * @var int
     */
    protected ?int $day = null;

    /**
     * Week of the year.
     * @var int
     */
    protected ?int $week = null;

    /**
     * Month of the year.
     * @var int
     */
    protected ?int $month = null;

    /**
     * Year.
     * @var int
     */
    protected int $year;
}
