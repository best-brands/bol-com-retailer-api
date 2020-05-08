<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
