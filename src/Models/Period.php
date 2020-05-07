<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Period extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Week number in the ISO-8601 standard.
	 * @var string
	 */
	private ?string $week = null;

	/**
	 * Year number in the ISO-8601 standard.
	 * @var string
	 */
	private ?string $year = null;


	public function getWeek(): ?string
	{
		return $this->week;
	}


	public function setWeek(string $week)
	{
		$this->week = $week;
		return $this;
	}


	public function getYear(): ?string
	{
		return $this->year;
	}


	public function setYear(string $year)
	{
		$this->year = $year;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'week' => $this->getWeek(),
			'year' => $this->getYear(),
		);
	}
}
