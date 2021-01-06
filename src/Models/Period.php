<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getWeek()
 * @method self setWeek(string $week)
 * @method null|string getYear()
 * @method self setYear(string $year)
 */
final class Period extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * Week number in the ISO-8601 standard.
	 * @var string
	 */
	protected ?string $week = null;

	/**
	 * Year number in the ISO-8601 standard.
	 * @var string
	 */
	protected ?string $year = null;
}
