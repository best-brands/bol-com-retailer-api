<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Norm extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Condition norm for this indicator.
	 * @var string
	 */
	private ?string $condition = null;

	/**
	 * Service norm for this indicator.
	 * @var int
	 */
	private ?int $value = null;


	public function getCondition(): ?string
	{
		return $this->condition;
	}


	public function setCondition(string $condition)
	{
		$this->condition = $condition;
		return $this;
	}


	public function getValue(): ?int
	{
		return $this->value;
	}


	public function setValue(int $value)
	{
		$this->value = $value;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'condition' => $this->getCondition(),
			'value' => $this->getValue(),
		);
	}
}
