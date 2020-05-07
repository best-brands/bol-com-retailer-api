<?php

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
