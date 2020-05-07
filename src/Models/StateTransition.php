<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class StateTransition extends \HarmSmits\BolComClient\Objects\AObject
{
	const STATE_Draft = 'Draft';
	const STATE_PreAnnounced = 'PreAnnounced';
	const STATE_ArrivedAtWH = 'ArrivedAtWH';
	const STATE_Cancelled = 'Cancelled';

	/**
	 * The state that was transitioned into.
	 * @var string
	 */
	private string $state;

	/**
	 * The transition date and time in ISO 8601 format.
	 * @var string
	 */
	private ?string $stateDate = null;


	public function getState(): ?string
	{
		return $this->state;
	}


	public function setState(string $state)
	{
		$this->_checkEnumBounds($state, [
			"Draft",
			"PreAnnounced",
			"ArrivedAtWH",
			"Cancelled"
		]);
		$this->state = $state;
		return $this;
	}


	public function getStateDate(): ?string
	{
		return $this->stateDate;
	}


	public function setStateDate(string $stateDate)
	{
		$this->stateDate = $stateDate;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'state' => $this->getState(),
			'stateDate' => $this->getStateDate(),
		);
	}
}
