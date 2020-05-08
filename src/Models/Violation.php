<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
