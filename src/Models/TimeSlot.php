<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class TimeSlot extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The timeslot start date and time in ISO 8601 format.
	 * @var string
	 */
	private string $start;

	/**
	 * The timeslot end date and time in ISO 8601 format.
	 * @var string
	 */
	private string $end;


	public function getStart(): ?string
	{
		return $this->start;
	}


	public function setStart(string $start)
	{
		$this->start = $start;
		return $this;
	}


	public function getEnd(): ?string
	{
		return $this->end;
	}


	public function setEnd(string $end)
	{
		$this->end = $end;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'start' => $this->getStart(),
			'end' => $this->getEnd(),
		);
	}
}
