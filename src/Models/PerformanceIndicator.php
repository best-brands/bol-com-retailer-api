<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class PerformanceIndicator extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Indicator name.
	 * @var string
	 */
	private ?string $name = null;

	/**
	 * Interpretation of the data that applies to this measurement.
	 * @var string
	 */
	private ?string $type = null;

	/** Details of the indicator. */
	private ?Details $details = null;


	public function getName(): ?string
	{
		return $this->name;
	}


	public function setName(string $name)
	{
		$this->name = $name;
		return $this;
	}


	public function getType(): ?string
	{
		return $this->type;
	}


	public function setType(string $type)
	{
		$this->type = $type;
		return $this;
	}


	public function getDetails(): ?Details
	{
		return $this->details;
	}


	public function setDetails(Details $details)
	{
		$this->details = $details;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'name' => $this->getName(),
			'type' => $this->getType(),
			'details' => $this->getDetails(),
		);
	}
}
