<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class DeliveryWindowsForInboundShipments extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * An available timeslot to be reserved for inbound shipments.
	 * @var TimeSlot[]
	 */
	private array $timeSlots = [];


	public function getTimeSlots(): ?array
	{
		return $this->timeSlots;
	}


	public function setTimeSlots(array $timeSlots)
	{
		$this->_checkIfPureArray($timeSlots, \HarmSmits\BolComClient\Models\TimeSlot::class);
		$this->timeSlots = $timeSlots;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'timeSlots' => $this->_convertPureArray($this->getTimeSlots()),
		);
	}
}
