<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class NotPublishableReason extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Error code signalling that the offer is invalid.
	 * @var string
	 */
	private ?string $code = null;

	/**
	 * Error message describing the reason the offer is invalid.
	 * @var string
	 */
	private ?string $description = null;


	public function getCode(): ?string
	{
		return $this->code;
	}


	public function setCode(string $code)
	{
		$this->code = $code;
		return $this;
	}


	public function getDescription(): ?string
	{
		return $this->description;
	}


	public function setDescription(string $description)
	{
		$this->description = $description;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'code' => $this->getCode(),
			'description' => $this->getDescription(),
		);
	}
}
