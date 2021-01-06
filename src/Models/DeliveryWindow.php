<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getTimeSlots()
 */
final class DeliveryWindow extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * An available timeslot to be reserved for inbound shipments.
	 * @var TimeSlot[]
	 */
	protected array $timeSlots = [];


	public function setTimeSlots(array $timeSlots): self
	{
		$this->_checkIfPureArray($timeSlots, \HarmSmits\BolComClient\Models\TimeSlot::class);
		$this->timeSlots = $timeSlots;
		return $this;
	}
}
