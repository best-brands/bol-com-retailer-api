<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
