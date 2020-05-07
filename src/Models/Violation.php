<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Violation extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Describes the origin of the error, for instance a field or query parameter
	 * validation error.
	 * @var string
	 */
	private ?string $name = null;

	/**
	 * Detailed description of the validation error that caused the problem.
	 * @var string
	 */
	private ?string $reason = null;


	public function getName(): ?string
	{
		return $this->name;
	}


	public function setName(string $name)
	{
		$this->name = $name;
		return $this;
	}


	public function getReason(): ?string
	{
		return $this->reason;
	}


	public function setReason(string $reason)
	{
		$this->reason = $reason;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'name' => $this->getName(),
			'reason' => $this->getReason(),
		);
	}
}
