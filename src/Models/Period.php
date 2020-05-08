<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
