<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Transporter extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The transporter name.
	 * @var string
	 */
	private string $name;

	/**
	 * The transporter code.
	 * @var string
	 */
	private string $code;


	public function getName(): ?string
	{
		return $this->name;
	}


	public function setName(string $name)
	{
		$this->name = $name;
		return $this;
	}


	public function getCode(): ?string
	{
		return $this->code;
	}


	public function setCode(string $code)
	{
		$this->code = $code;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'name' => $this->getName(),
			'code' => $this->getCode(),
		);
	}
}
