<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|DateTime getStartDateTime()
 * @method null|DateTime getEndDateTime()
 */
final class TimeSlot extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The timeslot start date and time in ISO 8601 format.
	 * @var DateTime
	 */
	protected DateTime $startDateTime;

	/**
	 * The timeslot end date and time in ISO 8601 format.
	 * @var DateTime
	 */
	protected DateTime $endDateTime;


	public function setStartDateTime($startDateTime): self
	{
		$startDateTime = $this->_parseDate($startDateTime);
		$this->startDateTime = $startDateTime;
		return $this;
	}


	public function setEndDateTime($endDateTime): self
	{
		$endDateTime = $this->_parseDate($endDateTime);
		$this->endDateTime = $endDateTime;
		return $this;
	}
}
