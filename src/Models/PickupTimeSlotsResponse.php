<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method PickupTimeSlot[] getTimeSlots()
 */
final class PickupTimeSlotsResponse extends AModel
{
	/** @var PickupTimeSlot[] */
	protected array $timeSlots = [];

    /**
     * @param PickupTimeSlot[] $timeSlots
     *
     * @return $this
     */
	public function setTimeSlots(array $timeSlots): self
	{
		$this->_checkIfPureArray($timeSlots, PickupTimeSlot::class);
		$this->timeSlots = $timeSlots;
		return $this;
	}
}
