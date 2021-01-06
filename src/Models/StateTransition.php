<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getState()
 * @method null|DateTime getStateDateTime()
 */
final class StateTransition extends \HarmSmits\BolComClient\Models\AModel
{
	const STATE_DRAFT = 'DRAFT';
	const STATE_PREANNOUNCED = 'PREANNOUNCED';
	const STATE_ARRIVEDATWH = 'ARRIVEDATWH';
	const STATE_CANCELLED = 'CANCELLED';

	/**
	 * The state that was transitioned into.
	 * @var string
	 */
	protected string $state;

	/**
	 * The transition date and time in ISO 8601 format.
	 * @var DateTime
	 */
	protected ?DateTime $stateDateTime = null;


	public function setState(string $state): self
	{
		$this->_checkEnumBounds($state, [
			"DRAFT",
			"PREANNOUNCED",
			"ARRIVEDATWH",
			"CANCELLED"
		]);
		$this->state = $state;
		return $this;
	}


	public function setStateDateTime($stateDateTime): self
	{
		$stateDateTime = $this->_parseDate($stateDateTime);
		$this->stateDateTime = $stateDateTime;
		return $this;
	}
}
