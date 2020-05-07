<?php

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
